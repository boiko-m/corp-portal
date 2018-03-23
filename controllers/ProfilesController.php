<?php

namespace app\controllers;

use Yii;
use app\models\Profile;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionIndex($letter = "а")
    {
        $query = Profile::find()->orderBy('last_name');
        $query = $query->with('user');
        if(mb_strlen($letter) == 1 && !is_numeric($letter)) {
            $query = $query->where(['like', 'last_name', $letter."%", false]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $alphabetModels = Profile::find()->select(['last_name'])->all();
        return $this->render('index', [
            'dataProvider' => $dataProvider,
            'alphabet' => $this->getAlphabet($alphabetModels)
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
        return $this->render('view', [
            'model' => $this->findModel($id),
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
