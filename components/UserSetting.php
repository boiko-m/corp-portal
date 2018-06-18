<?php

namespace app\components;

use yii\base\BaseObject;
use Yii;
use app\models\SettingOptions;
use app\models\SettingValues;

class UserSetting extends BaseObject {
	public $bgnb;

	public function getUserSettings($bgnb) 
	{
		$this->bgnb = $bgnb;
	}
}

?>