<?php

/* @var $this yii\web\View */

$this->title = 'Доступ к каталогам с сервера компании';
$this->params['breadcrumbs'][] = $this->title;
//echo "<pre>".print_r($users, true)."</pre>";

$script=<<<JS
$(document).ready(function(){
  $(".body-toggle").hide();
  $(".head-toggle").click(function(){
    $(this).next().slideToggle('slow');
  });
});
JS;
$this->registerJs($script);
?>

<div class="row">
  <div class="col-md-8 col-xs-8">
    <div class="row">
      <div class="col-md-12 col-xs-12 mb-2">
        <div class="card">
            <h6 class="card-header head-toggle  news-title">1.Bourgault Industries</h6>
            <div class="card-body body-toggle">
                <p class="card-text">Login as Guest </p>
                <a href="https://bourgault.sysonline.com/Default.aspx" target="_blank" class="btn waves-effect w-md btn-light doc" style="">Открыть</a>
            </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12 mb-2">
        <div class="card">
            <h6 class="card-header head-toggle news-title">2.Buhle</h6>
            <div class="card-body body-toggle">
                <p class="card-text">Login as Guest </p>
                <a href="https://serviceparts.buhlerindustries.com/Default.aspx" target="_blank" class="btn waves-effect w-md btn-light doc ">Открыть</a>
            </div>
          </div>

      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-xs-12 mb-2">
        <div class="card">
            <h6 class="card-header head-toggle  news-title">3.CASE+NewHolland.rdp</h6>
            <div class="card-body body-toggle ">
                    <p class="card-text">
                    Для Windows XPи Windows 7 </br>
                    Логин: CASE-OLD\case <br>
                    Пароль: 111111 <br> </P>
                <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/Case+NewHolland.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
            </div>
        </div>
    </div>
    </div>
    <div class="row">
      <div class="col-md-12 mb-2">
        <div class="card">
            <h6 class="card-header head-toggle news-title">4.Сase2015</h6>
            <div class="card-body body-toggle">
                    <p class="card-text">Логин: CNH2015-CATALOG\katalog  <br>
            				Пароль: Rfnfkju2015 <br> </P>
                <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/CNH2015.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>

            </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">5.CASE+NewHolland(online) и CASE+OtherBrands(online)</h6>
          <div class="card-body body-toggle">
              <p class="card-text">	Входить через chrome. Далее необходимо подождать, с экрана может пропасть окно входа на некоторое время. После чего, появится окно загрузки оболочки каталога. <br>
        				1. При открытии окна по ссылке запустить ЭКЗ. Открыть каталог как анонимный пользователь. <br>
        				2. Принять условия и соглашения пользования каталогом. <br>
        				3. При открытии каталога выбрать необходимого производителя. <br> </p>
              <a href="https://ngpc.cnh.com/Lp/es/ds?dealerhash=877D0F77-9657-42F5-846F-FDBC8E66B3FD" target="_blank" class="btn waves-effect w-md btn-light doc2">Открыть NewHolland</a>
              <a href="https://ngpc.cnh.com/Lp/es/ds?dealerhash=73D7A754-7C12-4011-A65B-63184C8452BC" target="_blank" class="btn waves-effect w-md btn-light doc2">Открыть OtherBrands</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">6.Сlaas.rdp</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: catalog-pxe\katalog <br>
      				Пароль: rfnfkju</p>
              <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/Claas.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">7. Cummins.rdp</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: catalog-pxe\katalog <br>
      				Пароль: rfnfkju</p>
              <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/Cummins.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">8. Foton</h6>
          <div class="card-body body-toggle">
              <p class="card-text"><?/*Запускается только через браузер Internet Explorer <br>*/?>
                      Код: D01356<br>
      				Username: D01356 <br>
      				Password: 123456 <br>
            </p>
              <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/foton1.pptx" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">9. Great Plains</h6>
          <div class="card-body body-toggle">

              <a href="http://greatplains-psw.arinet.com/scripts/EmpartISAPI.dll?MF&amp;app=GRP&amp;lang=EN&amp;TF=Empartweb&amp;loginID=cons_grp&amp;Loginpwd=guest" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">10. KUHN14</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Для Windows XP и Windows 7<br>
                  Логин: lbr\Ваш логин для входа в компьютер<br>
                  Пароль: Ваш пароль от входа в компьютер<br>
              </p>
              <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/KUHN.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">11. Lemken, Grimme, Kverneland, Rabe</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: lbr-zch<br>
                  Пароль: 13102015<br> </p>
              <a href="https://www.agroparts.com/agroparts/homepage" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">12. McCormick.rdp</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: catalog-pxe\katalog<br>
                  Пароль: rfnfkju<br></p>
              <a href="http://portal.lbr.ru/lbrgroup/photouser/katalog/McCormick.rdp" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">13. DIECI</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: LBR2017<br>
                  Пароль: 01022017<br></p>
              <a href="http://www.diecispareparts.com/dcs/Ordini/Login.aspx?CheckCookie=YES" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">14. Haulotte</h6>
          <div class="card-body body-toggle">
              <p class="card-text">Логин: Haulotte-Manuals<br>
                  Пароль: manuals<br></p>
              <a href="https://www.e-technical-information.com/_layouts/Haulotte.TechnicalExtranet.Authentication/HLGLoginPurple.aspx?ReturnUrl=%2f_layouts%2fAuthenticate.aspx%3fSource%3d%252F&amp;Source=%2F" target="_blank" class="btn waves-effect w-md btn-light doc">Открыть</a>
          </div>
        </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12 col-xs-12 mb-2">
      <div class="card">
          <h6 class="card-header head-toggle news-title">15. John Deere</h6>
          <div class="card-body body-toggle ">

              <a href="http://jdpc.deere.com/jdpc/servlet/com.deere.u90490.partscatalog.view.servlets.HomePageServlet_Alt?ui_lang_code=59" target="_blank" class="btn waves-effect w-md btn-light doc" >Открыть</a>
          </div>
        </div>
    </div>
  </div>
  </div>

  <div class="col-md-4 col-xs-4">
    <div class="row mb-3">
      <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-header news-title">
          Новая база каталогов!
        </div>
        <div class="card-body">
          <blockquote class="card-bodyquote">
          <p>Для доступа к базе каталогов запчастей вставьте в строку проводника:</p>
          <footer><cite title="Source Title">\\192.168.30.200\katalogi_zapchastey</cite>
          </footer>
          </blockquote>
        </div>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-12 col-xs-12">
      <div class="card">
        <div class="card-header news-title">
          Для каталогов с расширением RDP
        </div>
        <div class="card-body">
          <blockquote class="card-bodyquote">
          <p>Каталоги с расширением RDP скачайте на свой компьютер и пользуйтесь не заходя на учебный портал!</p>
          <footer><cite title="Source Title"></cite>
          </footer>
          </blockquote>
        </div>
        </div>
      </div>
    </div>

  </div>
</div>
