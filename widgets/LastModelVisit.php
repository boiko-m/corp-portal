<?php
    namespace app\widgets;

    use Yii;
    use yii\base\Widget;
    use yii\helpers\Html;
    use app\models\Profile;


    class LastModelVisit extends Widget
    {
        public $action = '';
        public $controller = '';
        public $id = '';

        public $time = 1000;
        public $return = false;
        public $count = false;

        public function init() {
            parent::init();
        }

        public function run() {
            $time_online = time() - 180;

            $profile = Profile::find()->where(['id' => Yii::$app->user->id])->one();

            if ($profile) {
                $profile->controller_visit = $this->controller;
                $profile->action_visit = $this->action;
                $profile->id_visit = $this->id;
                $profile->save();
            }
            

            if ($count) {
               $users = Profile::find()->where(['controller_visit' => $this->controller, 'action_visit' => $this->action, 'id_visit' => $this->id])->andWhere(['>','last_visit',$time_online])->count();    
           }

           if ($return) {
               $users = Profile::find()->where(['controller_visit' => $this->controller, 'action_visit' => $this->action, 'id_visit' => $this->id])->andWhere(['>','last_visit',$time_online])->all();  
           }

            return $users;
            
        }

        public function registerAssets()
        {

        }
    }
?>