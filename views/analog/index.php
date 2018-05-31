<?php

/* @var $this yii\web\View */

$this->title = 'Презентация компании ЛБР';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";
?>


<?php 

$json = '
{
 "items": [
  [
   {
    "value": "Наименование товара"
   },
    {
    "value": "Цель использования для наименование"
   },
   {
    "value": "Haulotte 32.10 (Олот, Франция) погрузчик телескопический с вилами для паллет, 84 л.с"
   },
   {
    "value": "Haulotte 40.10 (Олот, Франция) погрузчик телескопический с вилами для паллет, 95 л.с"
   }
  ],
  [
   {
    "value": "Изображение"
   },
   {
    "value": "",
    "params": {
     "image": "MNS0092584/UPR-00620240_Haulotte.jpg"
    }
   },
   {
    "value": "",
    "params": {
     "image": "MNS0092586/UPR-00620244_Haulotte.jpg",
     "info": "Равным образом укрепление и развитие структуры позволяет выполнять важные задания по разработке соответствующий условий активизации. Задача организации, в особенности же укрепление и развитие структуры требуют от нас анализа существенных финансовых и административных условий."
    }
   }
  ],
  [
   {
    "value": "Расположение индикатора момента нагрузки стрелы",
    "params": {
     
     "info": "Равным образом укрепление и развитие структуры позволяет выполнять важные задания по разработке соответствующий условий активизации. Задача организации, в особенности же укрепление и развитие структуры требуют от нас анализа существенных финансовых и административных условий!"
    }
   },
   {
    "value": "на уровне глаз, на стойке кабины"
   },
   {
    "value": "на уровне глаз, на стойке кабины"
   }
  ],
  [
   {
    "value": "Высота подъема, м"
   },
   {
    "value": "10"
   },
   {
    "value": "10"
   }
  ],
  [
   {
    "value": "Масса, кг"
   },
   {
    "value": "7 950"
   },
   {
    "value": "8 740"
   }
  ],
  [
   {
    "value": "Гарантия на товар, мес."
   },
   {
    "value": "24"
   },
   {
    "value": "24"
   }
  ],
  [
   {
    "value": "Трансмисиия"
   },
   {
    "value": "гидростатическая"
   },
   {
    "value": "гидростатическая"
   }
  ],
  [
   {
    "value": "Форма кабины и углы обзора"
   },
   {
    "value": "Яйцевидная, угол обзором 360 град. ширина 94 см"
   },
   {
    "value": "test",
    "params": {
     
     "video":"https://youtu.be/GEgP04blOZU",
     "video_start":"60",
     "video_stop":"120"
    }
   }
  ]
 ]
}
';



class Analog
{
  public $items;
  public $value;
  public $attr;
  public $result;
  public $image;
  public $class;
  public $link;
  public $attr_link;
  function __construct($items)
  {
    $this->items = $items;
    foreach ($items as $item) {
        foreach ($item as $line) {
          $this->result .= "<tr>";
          foreach ($line as $cell) {
            $this->image = null;
            $this->value = $cell['value'];
            $this->attr = null;
            $this->attr_link = null;
            if ($cell['params']) {
              $this->params($cell['params']);
            } else {
              $this->params = null;
            }
            $this->result .= "<td style = ". $this->style." class = '".$this->class."' ".$this->attr.">".$this->value.$this->image."</td>";
          }
          $this->result .= "</tr>";
        }
    }
  }
  public function params($params) {
    foreach ($params as $key => $param) {
      $this->$key($param);
    }
  }
  public function image ($img) {
    $this->image = "<img src='http://api.lbr.ru/images/analog/".$img."' alt=''>";
    $this->style .= ";padding:0px;";
  }
  public function colspan ($colspan) {
    $this->attr .= " colspan = '0'";
  }
  public function info($info) {
    //$this->attr .= " title = '".$info."'";
    $this->class = "info_block";
    $this->value = " ".$this->value." <div class = 'info_block_hidden'>".$info."</div>";
  }
  public function video ($link) {
    $this->link = str_replace(array("https://youtu.be/", "https://www.youtube.com/watch?v="), "", $link);
    $this->attr_link = "?fs=1";
    $this->value = "<iframe class='ytplayer' width='640' height='360' src='http://www.youtube.com/embed/".$this->link."?".$this->attr_link."' frameborder='0' allowfullscreen></iframe>";
  }
  public function video_start($attr) {
    $this->attr_link .= "&start=".$attr;
    $this->value = "<iframe class='ytplayer' src='http://www.youtube.com/embed/".$this->link."?".$this->attr_link."' frameborder='0' allowfullscreen></iframe>";
  }
  public function video_stop($attr) {
    $this->attr_link .= "&end=".$attr;
    $this->value = "<iframe class='ytplayer' src='http://www.youtube.com/embed/".$this->link."?".$this->attr_link."' frameborder='0' allowfullscreen></iframe>";
  }
  public function result() {
    return $this->result;
  }


} 


 ?>


<table class="analog-table" border="1" bordercolor = "#cccccc">
  <tr>
    <td>Характеристика:</td>
    <td>Выгоды:</td>
  </tr>
  <?php 
    $request = Yii::$app->request;
    if (!$request->post('json')) {
      $items = $json;
    } else {
      $items = $request->post('json');
    }
    $items = json_decode($items, true);
    $analog = new Analog($items);
    echo $analog->result();
  ?>
</table>






<style>
  * {
      font-family: 'Open Sans',Arial,Helvetica,Verdana,sans-serif!important;
    }
  .analog-table {
    width: 100%;
      background-color: #fff;
      border-collapse: collapse;
      empty-cells: show;
      font-size: 15px;
  }
  .analog-table td[colspan] {
    background: #f3f3f3;
  }
  .analog-table td:first-child {
      padding: 8px 5px;
      font-weight: bold;
      width: 20%;
      text-align: left;
      background: #f6f6f69e;
  }
  .analog-table td:first-child:hover {
    background: white;
  }
  .analog-table td {
    text-align: center;
    max-width: 150px;
    padding: 7px;
  }
  .analog-table tr td:nth-child(2) {
    color: #007aa5;
    text-align: left;
  }
  .analog-table img {
    width: 100%;
  }
  .info_block_hidden {
    color: #555555;
    font-size: 11px;
    text-align: justify;
    padding: 5px 5px; 
    border: 1px solid #dfdfdf;
    border-radius: 2px;
    margin:5px 0px;
    font-weight: normal;
    background: #f5f5f5
  }
  /* .info_block_hidden {
    transition: 0.4s;
    display: none;
    position: absolute;
    background: white;
    padding: 20px 5px;
    width: 600px;
    margin-left: 17%;
    margin-top: -18px;
    border: 1px solid #cccccc;
    font-size: 13px;
    font-weight: normal;
    border-radius: 5px;
  } */
</style>
