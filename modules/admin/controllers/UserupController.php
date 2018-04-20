<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Odata;
use app\models\User;
use app\models\Profile;
/**
 * Default controller for the `admin` module
 */
class UserupController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */

    public function actionUpdate() {
    	$odata = new Odata();

    	$data = $odata->get("Catalog_Сотрудники", array(
    		'top' => 1,
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

    	foreach ($isset_users as $isset_user) {
    		if (isset($isset_user['username'])) {
    			$users[] = $isset_user['username'];
    		}
    	}
    	

    	foreach ($data as $up) {
    		if (!in_array($up['Логин'], $users)) {
    			$update[] = $up['Логин'];
    			// добавление в бд
    			$user = new User();
    			

				$user->username = $up['Логин'];
				$user->auth_key = $user->generateAuthKey();
				$user->email = $up['Email'];
				$user->status = 10;

				$user->created_at = time();
				$user->updated_at = time();

				$user->key_external = $up['Ref_Key'];
				$user->password_external = $up['Пароль1С'];

    			if ($user->save()) {
    				echo "Пользователь сохранен с id:" . $user->id;
    			} else {
    				echo "Ошибка";
    				exit;
    			}


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
    			$profile->email = $up['Email'];
    			$profile->phone1 = $up['Сотовые'];
    			$profile->branch = $up['Подразделение']['НаименованиеКраткое'];
    			$profile->position = $up['ОфициальнаяДолжность']['Description'];
    			$profile->department = $up['ФункциональноеПодразделение']['Description'];
    			$profile->phone_cabinet = $up['ГТС'];
    			$profile->category = $up['Категория'] . " от " . $up['ДатаКатегории'];
    			$profile->sip = $up['SIP'];

    			$profile->save();
    			
    		} else {
    			// echo "<div style = 'color:blue'>".$up['Логин']. " - добавлен </div>";
    		}
    	}

    	// КорпоративнаяДолжность/ПрофильКандидата 
        return $this->renderPartial('update', array(
        	'data' => $data,
        	'odata' => $odata
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
}
