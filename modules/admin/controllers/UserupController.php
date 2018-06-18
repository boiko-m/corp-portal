<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Odata;
use app\models\Tdata;
use app\models\User;
use app\models\Profile;

ini_set('max_execution_time', 900);
/**
 * Default controller for the `admin` module
 */
class UserupController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionInsert() {
    	$odata = new Odata();

    	$data = $odata->get("Catalog_Сотрудники", array(
    		'top' => 30,
    		'select' => 'ФункциональноеПодразделение/Description, Description, Code, ДатаПриема, ПоловаяПринадлежность, Email, Подразделение/НаименованиеКраткое, ОфициальнаяДолжность/Description, ДатаРождения,Ref_Key',
    		'expand' => 'КорпоративнаяДолжность,ОфициальнаяДолжность,ФункциональноеПодразделение,Подразделение',
    		'orderby' => 'ДатаПриема desc'
    	));

    	
    	for ($i=0; $i < count($data); $i++) { 

    		$data_cat = $odata->get("InformationRegister_РейтингиСотрудников", array(
	    		'top' => 1,
	    		'select' => 'Period,Рейтинг/Description',
	    		'key' => array("Сотрудник_Key" => $data[$i]['Ref_Key']),
	    		'orderby' => 'Period desc',
	    		'expand' => 'Рейтинг'
	    	));

	    	$login = $odata->get("Catalog_Пользователи", array(
	    		'top' => 1,
	    		'select' => "ДоступныеРоли, Description, Пароль",
	    		'key' => array("Сотрудник_Key" => $data[$i]['Ref_Key']),
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
    	}

    	for ($i=0; $i < count($data); $i++) { 
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


    	
    	$isset_users = User::find()->select('username')->where(["dismissed" => null])->all();
        exit;
    	

	    foreach ($isset_users as $isset_user) {
    		if (isset($isset_user['username'])) {
    			$users[] = $isset_user['username'];
    		}
    	}
    	

    	foreach ($data as $up) {
    		if (!in_array($up['Логин'], $users)) {
    			
    			// добавление в бд
    			$max_id = User::find()->max('id');

    			$user = new User();
    			
    			$user->id = $max_id+1;
				$user->username = $up['Логин'];
				$user->auth_key = $user->generateAuthKey();
				$user->email = $up['Email'];
				$user->status = 10;

				$user->created_at = time();
				$user->updated_at = time();

				$user->key_external = $up['Ref_Key'];
				$user->password_external = $up['Пароль1С'];

    			$user->save();

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
    			$profile->position = $up['ОфициальнаяДолжность']['Description'];
    			$profile->department = $up['ФункциональноеПодразделение']['Description'];
    			$profile->phone_cabinet = $up['ГТС'];
    			$profile->category = $up['Категория'] . " от " . $up['ДатаКатегории'];
    			$profile->sip = $up['SIP'];

    			if ($profile->save()) {
    				$update[]['success'] = $up['Логин']. ";".$profile->id;
    			} else {
    				$update[]['error'] = $up['Логин'];
    			}
    			
    		} else {
    			// echo "<div style = 'color:blue'>".$up['Логин']. " - добавлен </div>";
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

        for ($p = 1; $p <= 13; $p++) {

            $client = $data->doc("Catalog_Сотрудники")->expand('КорпоративнаяДолжность,ОфициальнаяДолжность,ФункциональноеПодразделение,Подразделение')->select('ФункциональноеПодразделение/Description,Description,Code,ДатаПриема,ДатаУвольнения,ПоловаяПринадлежность,Email,ФИОЛат,Подразделение/НаименованиеКраткое,ОфициальнаяДолжность/Description,ДатаРождения,Ref_Key')->key('Parent_Key', '00000000-0000-0000-0000-000000000000')->orderby('ДатаПриема desc')->page($p, 50)->all();

            for ($i=0; $i < count($client); $i++) {
                $data_cat = $data->doc('InformationRegister_РейтингиСотрудников')->key('Сотрудник_Key', $client[$i]['Ref_Key'])->select('Рейтинг/Description')->expand('Рейтинг')->orderby('Period desc')->top(1)->all();

                $login = $data->doc('Catalog_Пользователи')->key("Сотрудник_Key", $client[$i]['Ref_Key'])->select('ДоступныеРоли,Description,Пароль')->top(1)->all();

                $phones = $data->doc('InformationRegister_ТелефонныеНомера')->cast(array('Сотрудник', $client[$i]['Ref_Key'], 'Catalog_Сотрудники'))->select('КодСтраны,КодОператора,НомерТелефона,ВидСвязи/Description')->expand('ВидСвязи')->all();

                foreach ($phones as $phone) {
                    if ($phone['ВидСвязи']['Description'] == "IP") {
                        $client[$i]['SIP'] .= $phone['ВидСвязи']['Description'];
                    }
                    // if ($phone['ВидСвязи']['Description'] == "ГТС") {
                    //     $client[$i]['ГТС'] .= $phone['ВидСвязи']['Description'];
                    // }
                    if ($phone['ВидСвязи']['Description'] == "Сотовая") {
                        $client[$i]['Сотовые'] .= $phone['КодСтраны'] . $phone['КодОператора'] . $phone['НомерТелефона'];
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
                } else {
                    $profile->skype = $up['Email'];
                    $user->password_external = $up['Пароль1С'];
                }

                $profile->phone = $up['Сотовые'];
                $profile->branch = $up['Подразделение']['НаименованиеКраткое'];
                $profile->position = $up['ОфициальнаяДолжность']['Description'];
                $profile->department = $up['ФункциональноеПодразделение']['Description'];
                $profile->category = $up['Категория'];

                // if ($up['ГТС'] != '') {
                //     $profile->phone_cabinet = $up['ГТС'];
                // }
                if ($up['SIP'] != '') {
                    $profile->sip = $up['SIP'];
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
