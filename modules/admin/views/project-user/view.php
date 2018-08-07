<?php
    use yii\helpers\Html;
    use yii\widgets\DetailView;
    use app\models\ProjectUserGroup;
    use app\models\Profile;
    use app\models\Projects;

    $this->title = (Projects::findOne($model->id_project))->name . ' - ' . (Profile::findOne($model->id_user))->name;
    $this->params['breadcrumbs'][] = ['label' => 'Назначения пользователей', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-user-view">

    <!-- <h1 class="crud-title"><?= Html::encode($this->title) ?></h1> -->

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
            [
                'attribute' => 'project.name',
                'label' => 'Проект',
            ],
            [
                'attribute' => 'profile.name',
                'label' => 'Участник',
            ],
            'projectUserGroup.name',
            [
                'attribute' => 'create_at',
                'format' => ['date', 'php:d.m.Y'],
            ],
        ],
    ]) ?>

</div>
