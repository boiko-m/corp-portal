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
        public $countQuestion = [];
        public $title = 'Опросы';
        public $col_size = 12;
        public $width = '290';
        private $questions;

        public function init() {
            $this->registerAssets();
            parent::init();
        }

        public function run() {
            if (isset($this->countQuestion)) {
                $this->questions = QuestionnaireModel::find()->all();
            } else {
                $this->questions = QuestionnaireModel::findOne($this->countQuestion);
            }
            return $this->render('questionnaire/question', [
                'questions' => $this->questions,
                'title' => $this->title,
                'col_size' => $this->col_size,
                'width' => $this->width,
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