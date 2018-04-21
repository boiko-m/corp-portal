<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CropboxForm;

/**
 * ProfilesController implements the CRUD actions for Profile model.
 */
class ProfilesController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex($letter = "")
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->setSort(['defaultOrder' => ['last_name' => SORT_ASC]]);
        $dataProvider->query->with('user');

        if(isset($letter) && mb_strlen($letter) == 1 && !is_numeric($letter)) {
            $dataProvider->query->andWhere(['like', 'last_name', $letter."%", false]);
        }

        $alphabetModels = Profile::find()->select(['last_name'])->all();


        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'alphabet' => $this->getAlphabet($alphabetModels),
            'searchModel' => $searchModel,
            'user' => $user
        ]);
    }

    /**
     * Uploads profile photo.
     * @return mixed
     */
    public function actionImage()
    {
        $form = new CropboxForm;
        return $this->render('upload-img', [
            'form' => $form,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
       $model = $this->findModel($id);
       $user = User::findIdentity($model->id);

        return $this->render('view', [
            'model' => $model,
            'user' => $user
        ]);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    private function getAlphabet($models) {
        $letters = [];
        foreach ($models as $index => $model) {
            $letters[] = mb_strtoupper(substr($model->last_name, 0, 2));
        }
        return array_unique($letters);
    }
}
