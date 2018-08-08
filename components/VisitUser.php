<?php

namespace app\components;

use Yii;
use yii\helpers\Html;
use app\models\Profile;
use app\models\Visit;

class VisitUser  extends \yii\base\Component
{

        public $action = '';
        public $controller = '';
        public $id = '';

        public $time = 1000;
        public $one = false;
        public $user = false;
        public $save = true;


        public function _constructor () {

        }

        public function init() {
            parent::init();
        }

        public function reset() {
            $this->action = '';
            $this->controller = '';
            $this->id = '';

            $this->one = false;
            $this->user = false;
            $this->save = true;
            return $this;
        }

        public function get($array) {

            $this->reset();

            $id_user = Yii::$app->user->id;

            foreach ($array as $key => $value) { // кидаем в параметры
                $this->$key = $value;
            }
            if ($this->save) {
                $this->set();
            }

           if ($this->one) {
                $visits = Visit::find()->where([
                    'controller' => $this->controller,
                    'action' => $this->action,
                    'id_action' => $this->id,
                    'id_user' => $id_user
                ])->limit(1)->all();
           } else {
                if (!$this->user) {
                    $visits = count(Visit::find()->where([
                        'controller' => $this->controller,
                        'action' => $this->action,
                        'id_action' => $this->id
                    ])->all());
                } else {
                    $visits = Visit::find()->where([
                        'controller' => $this->controller,
                        'action' => $this->action,
                        'id_action' => $this->id
                    ])->with(['user.profile'])->all();
                }
           }

           return $visits;


        }

        public function set($array = null) {
            
            if ($array) {
                foreach ($array as $key => $value) { // кидаем в параметры
                    $this->$key = $value;
                }
            }

            if (isset($this->controller)) {

                $id_user = Yii::$app->user->id;

                $visit = Visit::find()->where([
                    'controller' => $this->controller,
                    'action' => $this->action,
                    'id_action' => $this->id,
                    'id_user' => $id_user
                ])->limit(1)->one();

                if (!isset($visit)) {
                    $visit = new Visit();
                    $visit->controller = $this->controller;
                    $visit->action = $this->action;
                    $visit->id_action = $this->id;
                    $visit->update_at = time();
                    $visit->count = 1;
                    $visit->id_user = $id_user;
                } else {
                    $visit->update_at = time();
                    $visit->count = $visit->count+1;
                }

                return ($visit->save()) ? true : false;

            } else {
                return 'Укажите контроллер!';
            }

        }


        public function getset($array) {

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


    
}

