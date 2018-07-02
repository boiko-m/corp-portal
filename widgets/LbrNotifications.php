<?php

namespace app\widgets;

use Yii;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Json;
use yii\db\Query;
use app\assets\LbrNotificationsAsset;

class LbrNotifications extends \webzop\notifications\widgets\Notifications
{
    public $iconOptions = [
        'class' => 'nav-link dropdown-toggle arrow-none waves-light waves-effect',
        'data-toggle' => 'dropdown',
        'href' => 'javascript:void(0);',
        'role' => 'button'
    ];

    public $bodyOptions = [
        'class' => 'dropdown-menu dropdown-menu-right dropdown-lg',
    ];

    public $options = [
        'class' => 'dropdown lbr-notifications notification-list',
    ];

    /*public function init()
    {
        parent::init();

        if(!isset($this->bodyOptions['id'])){
            $this->bodyOptions['id'] = $this->getId();
        }
    }*/

    protected function renderNavbarItem()
    {
        $count = self::getCountUnseen();

        $html = Html::beginTag('li', $this->options);
        // Notification icon
        $html .= Html::beginTag('a', $this->iconOptions);
        $html .= Html::tag('i', '', [
            'class' => 'fi-bell noti-icon',
        ]);
        $html .= Html::tag('span', $count, [
            'class' => 'badge badge-danger badge-pill noti-icon-badge notifications-count',
            'data-count' => $count,
            'style' => !$count ? 'display: none;' : ''
        ]);
        $html .= Html::endTag('a');
        // Notification body
        $html .= Html::beginTag('div', $this->bodyOptions);
        $html .= Html::beginTag('div', ['class' => 'dropdown-item noti-title']);
        $html .= '<h6 class="m-0"> <span class="float-right read-all"><a href="javascript:void(0);" class="text-dark"><small>Очистить</small></a> </span> Уведомления </h6>';
        $html .= Html::endTag('div');

        $html .= Html::beginTag('div', [
            'class' => 'slimscroll notifications-list',
            'style' => 'max-height: 190px; height: 175px;'
        ]);

        $html .= Html::tag('div', Html::tag('span', Yii::t('modules/notifications', 'Список уведомлений пуст')), ['class' => 'empty-row', 'style' => 'display: none;']);
        $html .= Html::tag('div', "", ['class' => 'notify-ajax']);
        // content
        $html .= Html::endTag('div');

        $html .= Html::beginTag('a', [
            'class' => 'dropdown-item text-center text-primary notify-item notify-all',
            'href' => '/notify',
            //'href' => '#',
            'target' => '_blank'
        ]);
        $html .= 'История';
        $html .= Html::endTag('a');

        $html .= Html::endTag('div');

        $html .= Html::endTag('li');
        return $html;
    }

    public function registerAssets()
    {
        $this->clientOptions = array_merge([
            'id' => $this->options['id'],
            'url' => Url::to(['/notify/list']),
            'urlAll' => Url::to(['/notify/all']),
            'urlToast' => Url::to(['/notify/toast']),
            'countUrl' => Url::to(['/notify/count']),
            'readUrl' => Url::to(['/notify/read']),
            'readAllUrl' => Url::to(['/notify/read-all']),
            'xhrTimeout' => Html::encode($this->xhrTimeout),
            //'pollInterval' => Html::encode($this->pollInterval),
        ], $this->clientOptions);

        $js = 'Notifications(' . Json::encode($this->clientOptions) . ');';
        $view = $this->getView();

        LbrNotificationsAsset::register($view);

        $view->registerJs($js);
    }
}
