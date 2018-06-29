<?php

namespace app\controllers;

use app\models\BirthdaySearch;
use app\models\Gift;
use app\models\GiftType;
use app\models\GiftUser;
use Yii;
use app\models\Profile;
use app\models\ProfileSearch;
use app\models\User;
use app\models\SettingOptions;
use app\models\SettingValues;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
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
use app\notifications\GiftNotification;

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

    public function actionUpdateSettingNbBg()
    {
        if (Yii::$app->setting->isValue('navbar-background-color')) {
            Yii::$app->setting->setValue('navbar-background-color', Yii::$app->request->get('hat-color'));
        } else {
            Yii::$app->setting->newValue('navbar-background-color', Yii::$app->request->get('hat-color'));
        }
    }

    public function actionUpdateSettingSideBar()
    {
        if (Yii::$app->setting->isValue('sidebar-user-toggle')) {
            Yii::$app->setting->setValue('sidebar-user-toggle', Yii::$app->request->get('toggle-side-bar'));
        } else {
            Yii::$app->setting->newValue('sidebar-user-toggle', Yii::$app->request->get('toggle-side-bar'));
        }
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
        //подарки
       /* $allGift = Gift::find()->with('giftType')->asArray()->all();
        debug($allGift);*/


          $profile = Profile::find()->select(['id', 'coins'])->where(['id' => $id])->one();
         $model = $this->findModel($id);
        $user = User::findIdentity($model->id);
        $gift3 = GiftUser::find()->where(['id_user_to' => $id])->asArray()->with('gift', 'userFrom', 'userFrom.profile')
            ->orderBy(['id' => SORT_DESC //Need this line to be fixed
            ])->limit(3)->all();


        if(Yii::$app->request->post()){
            $post = Yii::$app->request->post('GiftUser');
           $user_id = Yii::$app->user->id;
            $profile = Profile::find()->where(['id' => $user_id])->one();
            $coins = (string)$profile->coins - (string)$post['costCoin'];
            $profile->coins = intval($coins);
            $profile->save();

            $gift_user = new GiftUser();
           // debug($post);
            $gift_user->id_gift = intval($post['id_gift']);
            $gift_user->id_user_from = $user_id;
            $gift_user->message = $post['message'];
            $gift_user->id_user_to = intval($id);
            $gift_user->anonim = 0;
            $gift_user->date = time();
            $gift_user->save();
            GiftNotification::create(GiftNotification::GIFT_NOTIFY, ['userId' => $id])->send();
            return $this->refresh();

        }

        return $this->render('view', [
            'id' => $id,
            'profile' => $profile,
            'gift' => $gift,
            'model' => $model,
            'user' => $user,
            'gift3' => $gift3,

        ]);
    }
public function actionModal(){
    if(Yii::$app->request->isAjax) {
        $curentId = Yii::$app->request->post();
        $id = Yii::$app->user->id;
        $profile = Profile::find()->select(['id', 'coins'])->where(['id' => $id])->one();
        $allGift = Gift::find()->joinWith('giftType')->where(['gift_type.visible' => 1, 'gift.visible' => 1])->asArray()->orderBy('id_gift_type asc, sum_coin asc, ')->all();
        $model = new GiftUser();
        $giftType = GiftType::find()->asArray()->all();
        $a = $this->renderAjax('modal/modal', compact('allGift', 'pages', 'model', 'profile', 'curentId', 'giftType'));
        $b = $this->renderAjax('modal/footer', compact('models', 'pages'));
        $c[0] = $a;
        $c[1] = $b;

        return Json::encode($c);
    }
}

    public function actionGiftmodal()
    {
        if(Yii::$app->request->isAjax) {
            $id = Yii::$app->request->post('data');
            $gift = GiftUser::find()->where(['id_user_to' => $id])->asArray()->orderBy('id DESC')->with('gift', 'userFrom', 'userFrom.profile')->all();

            $count = count($gift);
            $a[0] = $this->renderAjax('giftmodal/head', compact('count'));
          $a[1] = $this->renderAjax('giftmodal/smallmodal', compact('gift'));

            return Json::encode($a);
        }
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
