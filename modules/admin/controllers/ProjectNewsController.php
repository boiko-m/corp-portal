<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Projects;
use app\models\ProjectNews;
use app\models\ProjectNewsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\FileHelper;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;

/**
 * ProjectNewsController implements the CRUD actions for ProjectNews model.
 */
class ProjectNewsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ProjectNews models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectNewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectNews model.
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
     * Creates a new ProjectNews model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProjectNews();

        if ($model->load(Yii::$app->request->post())) {
            $model->image = \yii\web\UploadedFile::getInstance($model, 'image');
            $model->id_project = (Projects::find()->where(['id' => $id])->one())->id;
            $model->save();

            try {
                // open image
                $image = Image::getImagine()->open($model->image->tempName);
                // rendering information about crop of ONE option 
                $cropInfo = Json::decode($model->crop_info)[0];
                $cropInfo['dWidth'] = (int)$cropInfo['dWidth']; //new width image
                $cropInfo['dHeight'] = (int)$cropInfo['dHeight']; //new height image
                $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
                $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y

                //delete old images
                $oldImages = FileHelper::findFiles(Yii::getAlias('@app/web/img/project-news'), [
                    'only' => [
                        $model->id . '.*',
                        'thumb_' . $model->id . '.*',
                    ], 
                ]);
                for ($i = 0; $i != count($oldImages); $i++) {
                    @unlink($oldImages[$i]);
                }

                //saving thumbnail
                $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
                $cropSizeThumb = new Box(200, 200); //frame size of crop
                $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);
                $pathThumbImage = Yii::getAlias('@app/web/img/project-news/');
                $nameImage .= 'thumb_' . $model->id . '.' . $model->image->getExtension();
                $pathThumbImage .= $nameImage;

                $image->resize($newSizeThumb)
                    ->crop($cropPointThumb, $cropSizeThumb)
                    ->save($pathThumbImage, ['quality' => 100]);

                $model->avatar = $nameImage;
                $model->save();
            } catch (\Exception $exception) { }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing ProjectNews model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $project = $model->id_project;

        if ($model->load(Yii::$app->request->post())) {
            $model->id_project = $project;
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProjectNews model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectNews model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProjectNews the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProjectNews::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
