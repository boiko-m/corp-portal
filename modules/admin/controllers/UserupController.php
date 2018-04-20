<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Odata;

/**
 * Default controller for the `admin` module
 */
class UserupController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
    	$odata = new Odata();

    	$data = $odata->get("Catalog_Сотрудники", array(
    		'top' => 500,
    		'select' => 'ФункциональноеПодразделение/Description, Description, Code, ДатаПриема, ПоловаяПринадлежность, Email, Подразделение/НаименованиеКраткое, ОфициальнаяДолжность/Description, ДатаРождения,Ref_Key',
    		'expand' => 'КорпоративнаяДолжность,ОфициальнаяСтруктура,ОфициальнаяДолжность,ТрудовойДоговор,ФункциональноеПодразделение,ЮридическоеЛицо,Подразделение',
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
	    	}

	    	$data[$i]['Категория'] = $data_cat['0']['Рейтинг']['Description'];

	    	$data[$i]['ДатаКатегории'] = date("d.m.Y", strtotime($data_cat['0']['Period']));
	    	$data[$i]['Логин'] = $login['0']['Description'];
	    	$data[$i]['Пароль1С'] = $login['0']['Пароль'];

    	}

    	

    	//  
    	// КорпоративнаяДолжность/ПрофильКандидата 
        return $this->render('index', array(
        	'data' => $data,
        	'odata' => $odata
        ));
    }
}
