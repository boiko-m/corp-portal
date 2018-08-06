<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->last_name . ' ' . $model->first_name;
    $this->params['breadcrumbs'][] = ['label' => 'Профили', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить данный профиль?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_1c',
            'first_name',
            'last_name',
            'middle_name',
            'birthday',
            'date_job',
            'sex',
            'skype',
            'phone1',
            'phone2',
            'branch',
            'position',
            'department',
            'cabinet',
            'phone_cabinet',
            'about:ntext',
            'category',
            'service',
            'sip',
            'img',
        ],
    ]) ?>

</div>
