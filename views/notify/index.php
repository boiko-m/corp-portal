<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = Yii::t('modules/notifications', 'История уведомлений');

?>

<div class="row">
    <div class="col-md-12 container-fluid">
        <div class="card-box">
            <div class="row">
                <div class="col-md-6">
                    <h1>Уведомления</h1>
                </div>
                <div class="col-md-6">
                    <div class="buttons float-right mt-2">
                        <a class="btn btn-danger" href="<?= Url::toRoute(['/notify/delete-all']) ?>"><?= Yii::t('modules/notifications', 'Удалить все'); ?></a>
                        <a class="btn btn-secondary" href="<?= Url::toRoute(['/notify/read-all']) ?>"><?= Yii::t('modules/notifications', 'Прочитать все'); ?></a>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <?php if($notifications): ?>

                    <table class="table">
                    <?php foreach($notifications as $notif): ?>
                        <tr>
                            <td>
                                <a href="<?= $notif['url'] ? $notif['url'] : "javascript:void(0);" ?>">
                                    <?= Html::encode($notif['message']); ?>
                                </a>
                                - <?= $notif['timeago']; ?>
                                <?php if(!$notif['read']): ?> (Не прочитано) <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    Список уведомлений пуст
                <?php endif; ?>

            <?= LinkPager::widget(['pagination' => $pagination]); ?>
            </div>
        </div>
    </div>
</div>
