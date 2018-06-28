<?php
/**
 * Created by PhpStorm.
 * User: okotchik
 * Date: 09.06.2018
 * Time: 16:16
 */

namespace app\controllers;

use app\models\Profile;
use app\models\ProfileMain;
use Yii;
use yii\data\Pagination;
use yii\web\Controller;



class ParsecsvController extends Controller
{
    public function actionIndex()
    {






        if (Yii::$app->request->get()) {
            $csvFile = file('../web/upload/coins.csv');

            $data = [];
            $data1 = [];
            foreach ($csvFile as $line) {
                $data[] = str_getcsv($line);
            }

            foreach ($data as $val) {
                $value = explode(';', $val[0]);

                $data1[$value[0]] = $value[1];

            }
            array_shift($data1);


            $profile = Profile::find()->select(['id', 'coins'])->asArray()->with('user')->all();




            foreach ($profile as $value) {
                foreach ($data1 as $item => $value1) {
                    if ($value['user']['username'] == $item) {
                        $model = Profile::findOne($value['id']);
                        // debug($model);
                        $model->coins = $value1;
                        $model->save();
                        break;
                    }
                }


            }
        }

        return $this->render('index', compact('profile', 'post'));

    }


}