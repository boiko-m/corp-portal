<?php
  use yii\helpers\Html;
  $this->title = 'Админ-панель';
?>

<div class="row">
  <div class="col-md-12">
    <div class="card-box">
      <div class="table-responsive wrap-relative">
        <div class="preloader"></div>

        <div style="text-align: center">
          Добро пожаловать в админ-панель. Вам открыт доступ к разделам левого меню в соответствии с вашим уровнем доступа
        </div>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class=" col-xs-12 col-md-3">
    <div class="card-box">
      <div class="table-responsive wrap-relative">
        <div class="preloader"></div>

        <div style="text-align: left">
            Ваш уровень доступа: <?php $i = 0;
            foreach (Yii::$app->authManager->getRolesByUser(Yii::$app->user->getId()) as $item => $value) {
              if ($i == 0 || $i == 1) {
                  $i++; 
                  continue;
              }
              echo '<br><span style="font-weight: bold">' . $value->name . ' - ' . $value->description . '</span>';
            }?>
            
        </div>
      </div>
    </div>
  </div>
</div>

