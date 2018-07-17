<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;

    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => 'Назначения пользователей', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-view">

    <h1 class="crud-title"><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить назначение?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'id_project',
            'id_user',
            'id_project_user_group',
            'create_at',
        ],
    ]) ?>

</div>
