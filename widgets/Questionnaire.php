<?php
    namespace app\widgets;

    use Yii;
    use yii\base\Widget;
    use yii\helpers\Html;
    use yii\helpers\ArrayHelper;
    use app\assets\AppAsset;
    use app\assets\QuestionnaireAsset;
    use app\models\Questionnaire as QuestionnaireModel;
    use app\models\Answers as AnswersModel;

    class Questionnaire extends Widget
    {
        public $question;
        private $questions;

        public function init() {
            $this->registerAssets();
            parent::init();
        }

        public function run() {
            if (isset($this->question)) {
                $this->questions = QuestionnaireModel::find()->all();
            } else {
                $this->questions = QuestionnaireModel::findOne($this->question);
            }
            return $this->render('questionnaire/question', [
                'questions' => $this->questions,
            ]);
        }

        /**
        * Register assets.
        */
        public function registerAssets()
        {
            AppAsset::register($this->getView());
            QuestionnaireAsset::register($this->getView());
        }
    }
?>