<?php

namespace app\controllers;
use Yii;

use app\components\HttpService;
use yii\data\ArrayDataProvider;



class ClientController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $http = new HttpService([
            'error' => true
        ]);

        $user_access = array('gavrilenko', 'dushin');

        $login = (in_array(Yii::$app->user->identity->username, $user_access) OR Yii::$app->user->can("viewAdminPanel")) ? 'kuzmin_a' : Yii::$app->user->identity->username;

        if (!Yii::$app->cache->get($login)) {
            $clients = $http->get('GetClients')->params([
                'UserName' => $login 
            ])->all();
            Yii::$app->cache->set($login, $clients, 300);
        } else {
            $clients = Yii::$app->cache->get($login);
        }

        $filteredresultData = array_filter($clients, function ($item) {
              $mailfilter = Yii::$app->request->getQueryParam('name', '');
              if (strlen($mailfilter) > 0) {
                  if (mb_stripos($item['Наименование'], $mailfilter) or mb_stripos($item['Наименование'], $mailfilter) === 0) {
                      return true;
                  } else {
                      return false;
                  }
              } else {
                  return true;
              }
          });

        if ($clients) {
            $provider = new ArrayDataProvider([
                'allModels' => $filteredresultData,
                'pagination' => [
                    'pageSize' => 15,
                ],
            ]);
        }

        return $this->render('index', [
            'clients' => $provider
        ]);

        /*return $this->render('index', [
            'clients' => $http->get('GetPlan')->params([
                'ClientId' => 'UPR-000883'
            ])->all(),
        ]);*/
    }

    public function actionPlan($code) {

        $id = md5(base64_decode($code));

        if (!Yii::$app->cache->get(($id))) {
            $http = new HttpService();

            $plans = $http->get('GetPlan')->params([
                'ClientId' => base64_decode($code) 
            ])->all();

            for ($i=0; $i < count($plans); $i++) { 
                $plans[$i]['ДатаОкончанияПлан'] = strtotime($plans[$i]['ДатаОкончанияПлан']);
            }

            Yii::$app->cache->set($id, $plans, 600);

        } else $plans = Yii::$app->cache->get(($id));


        
        foreach ($plans as $plan) {
            
            $contact = explode(' ', $plan['КонтактноеЛицо']);
            $in = ($contact[1]) ? " " . mb_strcut($contact[1], 0, 2, "UTF-8") . ". " . mb_strcut($contact[2], 0, 2, "UTF-8") . "." : '';
            $plan['КонтактноеЛицо'] = $contact[0] . $in;

            $count_tasks = count($tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']]);
            $tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']][$count_tasks]['Название'] = $plan['Задача'];
            $tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']][$count_tasks]['Этап'] = $plan['Этап'];
            $tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']][$count_tasks]['НомерЗаказа'] = $plan['НомерЗаказа'];
            $tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']][$count_tasks]['НомерПоручения'] = $plan['НомерПоручения'];
            $tasks[$plan['ДатаОкончанияПлан']][$plan['Действие']][$plan['КонтактноеЛицо']][$count_tasks]['ИсполнительФИО'] = $plan['ИсполнительФИО'];
        }

        return $this->render('plan', [
            'plans' => $plans,
            'tasks' => $tasks
        ]);
    }

    

}
