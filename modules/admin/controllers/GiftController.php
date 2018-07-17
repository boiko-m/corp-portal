<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Gift;
use app\models\GiftSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\CropboxForm;
use app\models\Profile;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\helpers\Json;
use \yii\web\UploadedFile;


/**
 * GiftController implements the CRUD actions for Gift model.
 */
class GiftController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Gift models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GiftSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Gift model.
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
     * Creates a new Gift model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gift();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model1 = new CropboxForm();
        if (Yii::$app->request->isAjax && $model1->load(Yii::$app->request->post())) {   
            $model1->image = UploadedFile::getInstance($model1, 'image');
            $image = Image::getImagine()->open($model1->image->tempName);
            $cropInfo = Json::decode($model1->crop_info)[0];

            $newSizeThumb = new Box(intval($cropInfo['width'] / $cropInfo['ratio']), intval($cropInfo['height'] / $cropInfo['ratio']));
            $cropSizeThumb = new Box(400, 400);
            $cropPointThumb = new Point(intval($cropInfo['x'] / $cropInfo['ratio']), intval($cropInfo['y'] / $cropInfo['ratio']));
            $imageName ='/gift_'. time() . '.' . $model1->image->getExtension();
            $pathThumbImage = Yii::getAlias('@app/web/img/gift') . $imageName;

            $isSaved = $image->crop($cropPointThumb, $newSizeThumb)
                ->resize($cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);

            if($isSaved) {
               // return $this->renderAjax('create', compact('imageName', 'model'));
                return  '/img/gift'.$imageName;
            }
        }
        
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Gift model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Gift model.
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
     * Finds the Gift model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gift the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gift::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionFormimg(){
        $model = new CropboxForm();

            return $this->renderAjax('upload-img', [
                'form' => $model,
            ]);
    }



}
