<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Odata;
use app\models\Tdata;
use app\models\User;
use app\models\Profile;
use app\models\ProfilePosition;

ini_set('max_execution_time', 4200);
ini_set('max_allowed_packet', 524288000);
/**
 * Default controller for the `admin` module
 */
class UserupController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionPosition() {
        $odata = new Tdata();
        $data = $odata->doc('Catalog_КорпоративныеДолжности')->top(500)->select('Description,Code')->where('DeletionMark eq false')->all();


        foreach ($data as $user) {
            $position = ProfilePosition::find()->where(['code' => $user['Code']])->one();
            if (!isset($position)) {
               $position = new ProfilePosition();
               $position->name = $user['Description'];
               $position->code = $user['Code'];
               if ($position->save()) {
                   $posisitionAdd[] = $position->name;
               }
            }
        }

        return $this->renderPartial('position', array(
            'positions' => $posisitionAdd
        ));
    }

    public function actionInsert() {
        $isset_users = User::find()->select('username')->where(["dismissed" => null])->all();
        $max_id = User::find()->max('id');
        

        foreach ($isset_users as $isset_user) {
            if (isset($isset_user['username']) and $isset_user['username'] != "0") {
                $users[] = $isset_user['username'];
            }
        }


    	$odata = new Odata();

        $tdata = new Tdata();

        if (Yii::$app->request->get('dogovor')) {
            $data = $tdata->doc('Catalog_Сотрудники')->key('Parent_Key', '9ffae14d-4d43-11e5-8bed-005056a36ce0')->select('ФункциональноеПодразделение/Description, Description, Code, ДатаПриема, ПоловаяПринадлежность, Email, Подразделение/НаименованиеКраткое, КорпоративнаяДолжность/Description, ДатаРождения,Ref_Key')->expand('КорпоративнаяДолжность,КорпоративнаяДолжность,ФункциональноеПодразделение,Подразделение')->orderby('ДатаПриема desc')->top(10)->all();
        } else {
            $data = $odata->get("Catalog_Сотрудники", array(
                'whereone' => "DeletionMark eq false and Parent_Key eq guid'00000000-0000-0000-0000-000000000000' and ДатаУвольнения eq datetime'0001-01-01T00:00:00'",
                'select' => 'ФункциональноеПодразделение/Description, Description, Code, ДатаПриема, ПоловаяПринадлежность, Email, Подразделение/НаименованиеКраткое, КорпоративнаяДолжность/Description, ДатаРождения,Ref_Key',
                'expand' => 'КорпоративнаяДолжность,КорпоративнаяДолжность,ФункциональноеПодразделение,Подразделение',
                'orderby' => 'ДатаПриема desc'
            ));

        }

       
    	for ($i=0; $i < count($data); $i++) {
            $login = $odata->get("Catalog_Пользователи", array(
                'top' => 1,
                'select' => "ДоступныеРоли, Description, Пароль",
                'key' => array("Сотрудник_Key" => $data[$i]['Ref_Key']),
            ));

            if (!in_array($login[0]['Description'], $users) && isset($login[0]['Description'])) {
        		$data_cat = $odata->get("InformationRegister_РейтингиСотрудников", array(
    	    		'top' => 1,
    	    		'select' => 'Period,Рейтинг/Description',
    	    		'key' => array("Сотрудник_Key" => $data[$i]['Ref_Key']),
    	    		'orderby' => 'Period desc',
    	    		'expand' => 'Рейтинг'
    	    	));

    	    	


    	    	$phones = $odata->get("InformationRegister_ТелефонныеНомера", array(
    				'select' => 'КодСтраны,КодОператора,НомерТелефона,ВидСвязи/Description',
    	    		'where' => array('Сотрудник', 'ef4e8ed6-622a-11e3-9d51-005056c00008', 'Catalog_Сотрудники'),
    	    		'expand' => 'ВидСвязи'
    	    	));



    	    	foreach ($phones as $phone) {
    	    		if ($phone['ВидСвязи']['Description'] == "Сотовая") {
    	    			$data[$i]['Сотовые'] .= $phone['КодСтраны'] . $phone['КодОператора'] . $phone['НомерТелефона']. ";";
    	    		}
    	    		if ($phone['ВидСвязи']['Description'] == "IP") {
    	    			$data[$i]['SIP'] .= $phone['ВидСвязи']['Description'];
    	    		}
    	    		if ($phone['ВидСвязи']['Description'] == "ГТС") {
    	    			$data[$i]['ГТС'] .= $phone['ВидСвязи']['Description'];
    	    		}
    	    	}

    	    	$data[$i]['Категория'] = $data_cat['0']['Рейтинг']['Description'];

    	    	$data[$i]['ДатаКатегории'] = date("d.m.Y", strtotime($data_cat['0']['Period']));
    	    	$data[$i]['Логин'] = $login['0']['Description'];
    	    	$data[$i]['Пароль1С'] = $login['0']['Пароль'];
        	

        		if ($data[$i]['ПоловаяПринадлежность'] == "Мальчик") {
        			$data[$i]['ПоловаяПринадлежность'] = 1;
        		} else {
        			$data[$i]['ПоловаяПринадлежность'] = 2;
        		}
        		$data[$i]['ДатаРождения'] = date("Y-m-d", strtotime($data[$i]['ДатаРождения']));
        		$data[$i]['ДатаПриема'] = date("Y-m-d", strtotime($data[$i]['ДатаПриема']));
        		$name = explode(" ", $data[$i]['Description']);
        		$data[$i]['Имя'] = $name[1];
        		$data[$i]['Фамилия'] = $name[0];
        		$data[$i]['Отчество'] = $name[2];
            
            }
        }


        



	    
        

    	foreach ($data as $up) {
    		if (!in_array($up['Логин'], $users) && isset($up['Логин'])) {
                //echo "<pre>".print_r($up, true)."</pre>";
                $up['Email'] = ($up['Email']) ? $up['Email'] : $up['Логин'] . "@lbr.ru";
    			// добавление в бд
    			

    			$user = new User();
                $user->generateAuthKey();

                $max_id++;


    			$user->id = $max_id;
				$user->username = $up['Логин'];
				$user->auth_key = $user->getAuthKey();
				$user->email = $up['Email'];
				$user->status = 10;

				$user->created_at = time();
				$user->updated_at = time();

				$user->key_external = $up['Ref_Key'];
				$user->password_external = $up['Пароль1С'];

    			$profile = new Profile();

    			$profile->id = $user->id;
    			$profile->id_1c = $up['Code'];
    			$profile->first_name = $up['Имя'];
    			$profile->last_name = $up['Фамилия'];
    			$profile->middle_name = $up['Отчество'];
    			$profile->birthday = $up['ДатаРождения'];
    			$profile->date_job = $up['ДатаПриема'];
    			$profile->sex = $up['ПоловаяПринадлежность'];
    			$profile->skype = $up['Email'];
    			$profile->phone1 = $up['Сотовые'];
    			$profile->branch = $up['Подразделение']['НаименованиеКраткое'];
    			$profile->position = $up['КорпоративнаяДолжность']['Description'];
    			$profile->department = $up['ФункциональноеПодразделение']['Description'];
    			$profile->phone_cabinet = $up['ГТС'];
    			$profile->category = $up['Категория'] . " от " . $up['ДатаКатегории'];
    			$profile->sip = (int)$up['SIP'];
                $profile->coins = 6;


                
                if ($user->validate()) {
        			if ($user->save() && $profile->save()) {
        				$update[]['success'] = $up['Логин']. ";".$profile->id;
        			} else {
        				$update[]['error'] = $up['Логин'];
        			}
                }
        	}
        }

    	// КорпоративнаяДолжность/ПрофильКандидата
        return $this->renderPartial('update', array(
        	'update' => $update
        ));
    }
    public function actionIndex()
    {

    	// КорпоративнаяДолжность/ПрофильКандидата
        return $this->render('index', array(
        	'data' => $data,
        	'odata' => $odata
        ));
    }

    public function actionUpdate() {

    }

     public function actionReplace() {

        $data = new Tdata();

        $dismissed = $data->doc('Catalog_Пользователи')->select('Description,Parent_Key')->all();
        $employees = User::find()->select('username')->all();
        $pp = ProfilePosition::find()->asArray()->select('id,code,name')->all();


        for ($i = 0; $i < count($employees); $i++) {
            for ($j = 0; $j <= count($dismissed); $j++) {
                if ($employees[$i]['username'] == $dismissed[$j]['Description'] && $dismissed[$j]['Parent_Key'] != '00000000-0000-0000-0000-000000000000') {
                    $user_delete = User::find()->where(['username' => $employees[$i]['username']])->one();
                    $user_delete->dismissed = 1;
                    $user_delete->save();

                    $profile_delete = Profile::find()->where(['id' => $user_delete->id])->one();

                    if ($profile_delete) {
                        $profile_delete->dismissed = 1;
                        $profile_delete->dismissed_at = time();
                        $profile_delete->save();
                    }
                    

                    break;
                }
            }
        }

        for ($p = 1; $p <= 13; $p++) {
            $client = $data->doc("Catalog_Сотрудники")->expand('КорпоративнаяДолжность,ФункциональноеПодразделение,Подразделение')->select('ФункциональноеПодразделение/Description,Description,Code,ДатаПриема,ДатаУвольнения,ПоловаяПринадлежность,Email,ФИОЛат,Подразделение/НаименованиеКраткое,КорпоративнаяДолжность/Description,КорпоративнаяДолжность/Code,ДатаРождения,Ref_Key')->key('Parent_Key', '00000000-0000-0000-0000-000000000000')->orderby('ДатаПриема desc')->page($p, 50)->all();
            
            for ($i=0; $i < count($client); $i++) {
                $data_cat = $data->doc('InformationRegister_РейтингиСотрудников')->key('Сотрудник_Key', $client[$i]['Ref_Key'])->select('Рейтинг/Description')->expand('Рейтинг')->orderby('Period desc')->top(1)->all();

                $login = $data->doc('Catalog_Пользователи')->key("Сотрудник_Key", $client[$i]['Ref_Key'])->select('ДоступныеРоли,Description,Пароль')->top(1)->all();

                $phones = $data->doc('InformationRegister_ТелефонныеНомера')->cast(array('Сотрудник', $client[$i]['Ref_Key'], 'Catalog_Сотрудники'))->where("ДатаОкончания eq datetime'0001-01-01T00:00:00' and НеОтображатьТелефон eq false")/*->select('КодСтраны,КодОператора,НомерТелефона,ВидСвязи')*/->expand('ВидСвязи')->top(20)->all();              
                foreach ($phones as $phone) {
                    if ($phone['ВидСвязи']['Description'] == "IP") {
                        $client[$i]['SIP'] .= $phone['ВидСвязи']['Description'];
                    }
                    // if ($phone['ВидСвязи']['Description'] == "ГТС") {
                    //     $client[$i]['ГТС'] .= $phone['ВидСвязи']['Description'];
                    // }
                    if ($phone['ВидСвязи']['Description'] == "Сотовая") {
                        $client[$i]['Сотовые'] .= ($client[$i]['Сотовые']) ? ";".$phone['КодСтраны'] . $phone['КодОператора'] . $phone['НомерТелефона'] : $phone['КодСтраны'] . $phone['КодОператора'] . $phone['НомерТелефона'];
                    }
                }

                $client[$i]['Категория'] = $data_cat['0']['Рейтинг']['Description'];
                $client[$i]['Логин'] = $login['0']['Description'];
                $client[$i]['Пароль1С'] = $login['0']['Пароль'];
            }

            for ($i=0; $i < count($client); $i++) {
                if ($client[$i]['ПоловаяПринадлежность'] == "Мальчик") {
                    $client[$i]['ПоловаяПринадлежность'] = 1;
                } else {
                    $client[$i]['ПоловаяПринадлежность'] = 2;
                }
                $client[$i]['ДатаРождения'] = date("Y-m-d", strtotime($client[$i]['ДатаРождения']));
                $client[$i]['ДатаПриема'] = date("Y-m-d", strtotime($client[$i]['ДатаПриема']));
                $name = explode(" ", $client[$i]['Description']);
                $client[$i]['Имя'] = $name[1];
                $client[$i]['Фамилия'] = $name[0];
                $client[$i]['Отчество'] = $name[2];
            }

            foreach ($client as $key => $up) {
                if ($up['Фамилия'] == 'Стажеры')
                    continue;

                $profile = Profile::find()->where(['id_1c' => ("\r\n" . $up['Code'])])->one();

                if ($profile == null)
                    $profile = Profile::find()->where(['id_1c' => ($up['Code'])])->one();

                if ($profile == null)
                    continue;

                $user = User::find()->where(['id' => $profile->id])->one();

                $profile->first_name = $up['Имя'];
                $profile->last_name = $up['Фамилия'];
                $profile->middle_name = $up['Отчество'];
                $profile->birthday = $up['ДатаРождения'];
                $profile->date_job = $up['ДатаПриема'];
                $profile->sex = $up['ПоловаяПринадлежность'];

                if ($up['Email'] == '' && $up['Логин'] != '') {
                    $profile->skype = $up['Логин'] . '@lbr.ru';
                    $user->email = $up['Логин'] . '@lbr.ru';
                    $user->password_external = $up['Пароль1С'];
                }
                if ($profile->skype == '') {
                    $profile->skype = $up['Email'];
                    $user->email = $up['Email'];
                    $user->password_external = $up['Пароль1С'];
                }

                $profile->phone = $up['Сотовые'];
                $profile->branch = $up['Подразделение']['НаименованиеКраткое'];
                $profile->position = $up['КорпоративнаяДолжность']['Description'];

                foreach ($pp as $pos) {
                    if ($pos['code'] == $up['КорпоративнаяДолжность']['Code']) { $profile_position = $pos; }
                }
                
                $profile->id_profile_position = $profile_position['id'];
                $profile->department = $up['ФункциональноеПодразделение']['Description'];
                $profile->category = $up['Категория'];
                $user->password_external = $up['Пароль1С'];
                $user->key_external = $up['Ref_Key'];

                // if ($up['ГТС'] != '') {
                //     $profile->phone_cabinet = $up['ГТС'];
                // }
                if ($up['SIP'] != '') {
                    $profile->sip = (int)$up['SIP'];
                }

                if (!$profile->validate()) {
                    // echo "<pre>".print_r($profile->errors, true)."</pre>";
                    echo "no save:" . $profile->last_name . " <br>";
                }
                $profile->save();
                $user->save();
            }
        }

        return $this->renderPartial('update', array(
            'update' => $update
        ));
     }

    protected function generateEmail($lat_name) {
        return strtolower(substr($lat_name, strpos($lat_name, " ") + 1) . '@lbr.ru');
    }

    protected function getUser($id) {
        return User::find()->where(['id' => $id])->one();
    }


}
