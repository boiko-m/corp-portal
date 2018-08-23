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

        $login = (Yii::$app->user->identity->username == "gavrilenko") ? 'kuzmin_a' : Yii::$app->user->identity->username;

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
        $http = new HttpService();

        $plans = $http->get('GetPlan')->params([
                'ClientId' => base64_decode($code) 
            ])->all();

        for ($i=0; $i < count($plans); $i++) { 
            $plans[$i]['ДатаОкончанияПлан'] = strtotime($plans[$i]['ДатаОкончанияПлан']);
        }

        return $this->render('plan', [
            'plans' => $plans
        ]);
    }

    

}
