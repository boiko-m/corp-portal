<?php

namespace app\controllers;

use app\models\BirthdaySearch;
use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use app\models\User;
use yii\data\ActiveDataProvider;
use yii\db\Query;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\helpers\Json;
use app\models\CropboxForm;
use \yii\web\UploadedFile;
use yii\helpers\Html;

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
        if(Yii::$app->request->get('param') == 'new'){
            $get = Yii::$app->request->get('param');
        }
        else{
            $get = null;
        }

        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $get);


            if(Yii::$app->request->get('param') == 'new'){
                 $dataProvider->setSort(['defaultOrder' => ['date_job' => SORT_DESC, ]]);
                 //$dataProvider->query->limit(15);
             }
             else{
                 $dataProvider->setSort(['defaultOrder' => ['last_name' => SORT_ASC]]);
             }


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





    public function actionBirthday()
    {
        return $this->render('birthday');
    }


    public function actionJson(){

        $data = Profile::find()->select(["CONCAT(first_name, ' ', last_name)
         AS title", 'id', 'birthday', 'branch AS description', 'position'])->asArray()->with('user')->all();

        $result = array();

        foreach ($data as $value) {
            if($value['user']['dismissed'] == 1){
                unset($value);
                continue;
            }
            unset($value['user']);
            $currentBirthday = date('Y') . '-' . substr($value['birthday'], 5);
            $value['start'] = $currentBirthday;
            $value['end'] = $currentBirthday;
            $value['url'] =  Url::to('/profiles/'.$value['id']);
            $value['description'] = $value['description'].', '. $value['position'];
            $result[] = $value;

        }

        $query = Json::encode( $result);


        return $query;

    }
    public function actionUpdate($id)
    {

        if($id != Yii::$app->user->id) {
            return $this->redirect(['view', 'id' => Yii::$app->user->id]);
        }
        $model = $this->findModel($id);

        if(Yii::$app->request->post() && $model->validate()) {
            $post = Yii::$app->request->post('Profile');
            $model->skype = $post['skype'];
            $model->phone = $post['phone1'] . ', ' . $post['phone2'];
            $model->phone_cabinet = $post['phone_cabinet'];
            $model->cabinet = $post['cabinet'];
            $model->about = $post['about'];
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }


        return $this->render('update', [

            'model' => $model,
        ]);
    }

    protected function isOwnProfile()
    {
        return Yii::$app->request->get('id') == Yii::$app->user->id;
    }

    /**
     * Uploads profile photo.
     * @return mixed
     */
    public function actionImage()
    {
        $model = new CropboxForm();
        $id = Yii::$app->user->id;
        $profile = Profile::find()->where(['id' => $id])->one();
        if ($model->load(Yii::$app->request->post()))
        {
            $model->image = UploadedFile::getInstance($model, 'image');
            $image = Image::getImagine()->open($model->image->tempName);
            $cropInfo = Json::decode($model->crop_info)[0];

            $newSizeThumb = new Box(intval($cropInfo['width'] / $cropInfo['ratio']), intval($cropInfo['height'] / $cropInfo['ratio']));
            $cropSizeThumb = new Box(400, 400);
            $cropPointThumb = new Point(intval($cropInfo['x'] / $cropInfo['ratio']), intval($cropInfo['y'] / $cropInfo['ratio']));
            $imageName = Yii::$app->user->id . '.' . $model->image->getExtension();
            $pathThumbImage = Yii::getAlias('@app/web/img/user')
                . '/thumbnail_'
                . $imageName;



            $isSaved = $image->crop($cropPointThumb, $newSizeThumb)
                ->resize($cropSizeThumb)
                ->save($pathThumbImage, ['quality' => 100]);
            if($isSaved) {
                $profile = Yii::$app->user->identity->profile;
                $profile->img = $imageName;
                $profile->save();
            }
            return $this->redirect(['view', 'id' => Yii::$app->user->id]);
        }

        return $this->render('upload-img', [
            'profile' => $profile,
            'form' => $model,
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
