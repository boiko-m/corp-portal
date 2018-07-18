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
                'attribute' => 'id_project',
                'value' => function($model) {
                    return (Projects::findOne($model->id_project))->name;
                },
            ],
            [
                'attribute' => 'id_user',
                'value' => function($model) {
                    return (Profile::findOne($model->id_user))->name;
                },
            ],
            [
                'attribute' => 'id_project_user_group',
                'value' => function($model) {
                    return (ProjectUserGroup::findOne($model->id_project_user_group))->name;
                },
            ],
            [
                'attribute' => 'create_at',
                'value' => function($model) {
                    return date('d.m.Y', $model->create_at);
                },
            ],
        ],
    ]) ?>

</div>
