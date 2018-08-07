<?php

namespace app\components;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use app\models\Profile;


class LastModelVisit  extends \yii\base\Component
{

        public $action = '';
        public $controller = '';
        public $id = '';

        public $time = 1000;
        public $return = false;

        public function _constructor () {

        }

        public function init() {
            parent::init();
        }


        public function set($array) {

            foreach ($array as $key => $value) { // кидаем в параметры
                $this->$key = $value;
            }

            $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

            if ($profile) {
                $profile->controller_visit = $this->controller;
                $profile->action_visit = $this->action;
                $profile->id_visit = $this->id;
                $profile->save();
            }            
            return true;

        }

        public function get($array) {
            $time_online = time() - 180;


            foreach ($array as $key => $value) { // кидаем в параметры
                $this->$key = $value;
            }

            $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

            if ($profile) {
                $profile->controller_visit = $this->controller;
                $profile->action_visit = $this->action;
                $profile->id_visit = $this->id;
                $profile->save();
            }
            

            if (!$this->return) {
               $users = Profile::find()->where(['controller_visit' => $this->controller, 'action_visit' => $this->action, 'id_visit' => $this->id])->andWhere(['>','last_visit',$time_online])->count();    
           }

           if ($this->return) {
               $users = Profile::find()->where(['controller_visit' => $this->controller, 'action_visit' => $this->action, 'id_visit' => $this->id])->andWhere(['>','last_visit',$time_online])->orderby('last_visit desc')->all();  
           }

           return $users;
        }

    
}

