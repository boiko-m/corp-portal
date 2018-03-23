<?php
namespace app\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;

class Alphabet extends Widget
{
    public $letters = [];
    public $options = [];
    public $actionLink = "";
    public $tag = "div";

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $links = [];
        foreach ($this->letters as $index => $letter) {
            $options = [];
            if(Yii::$app->request->get('letter') == $letter) {
                $options['class'] = 'active';
            }
            $links[] = Html::a($letter, [$this->actionLink, 'letter' => $letter], $options);
        }
        return Html::tag($this->tag, implode("\t\n", $links), $this->options);
    }
}
