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
    		'top' => 2,
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
	    		'select' => "ДоступныеРоли, Description",
	    		'key' => array("Сотрудник_Key" => $data[$i]['Ref_Key']),
	    	));

	    	$data[$i]['Категория'] = $data_cat['0']['Рейтинг']['Description'];

	    	$data[$i]['ДатаКатегории'] = date("d.m.Y", strtotime($data_cat['0']['Period']));
	    	$data[$i]['Логин'] = $login['0']['Description'];

    	}

    	//  
    	// КорпоративнаяДолжность/ПрофильКандидата 
        return $this->render('index', array(
        	'data' => $data,
        	'odata' => $odata
        ));
    }
}
