<?php
/* @var $this yii\web\View */
use app\models\Broadcast;


$this->title = "Видео материал";

/*$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
$this->params['breadcrumbs'][] = $this->title;

?>



<style>
    .videos_link {
        transition: 0.3s;
    }
    .videos_link:hover {
        color: black !important;
    }
    .videos_link img {
        border-radius: 5px;
    }
</style>
<div class="row ">
    <div class="card-box col-12">
        <ul class="nav nav-tabs tabs-bordered">
            <li class="nav-item">
                <a href="#home" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    Трансляции компании
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="home">
                <div class="row">
                    <?php $lives = Broadcast::find()->limit(0)->orderby('id desc')->all(); ?>
                    <?php if (count($lives) == 0) : ?>
                        <h5 class="col-md-12 text-center">На данный момент не было ни одной трансляции</h5>
                    <? endif; ?>
                    <?php foreach ($lives as $video): ?>
                        <div class="col-xl-3 col-xs-12 videos_link" onclick="window.open('/broadcast/<?=$video->id ?>')" style="cursor: pointer; text-align: center;">
                            <div>
                                <img src="http://portal.lbr.ru/img/broadcast/<?= $video->complete ? 'not-live.png' : 'live.png'?>" alt="" width="<?= $video->complete ? '340' : '240'?>" height="180" style="padding: 60px;">
                            </div>
                            <div class="text-left" style="font-size: 10px">
                                <?= date('d.m.Y', $video->create_at) ?>
                            </div>
                            <div class="text-center" style="padding: 5px">
                                <?= $video->name ?>
                            </div>

                        </div>
                    <?php endforeach ?>

                </div>
            </div>
            <div class="tab-pane fade" id="allvideo">

            </div>
            <div class="tab-pane fade" id="forum">

            </div>
        </div>
    </div>
</div>

<?php if ($_GET['tab']): ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.tab-pane').removeClass('active');
            $('#<?=$_GET["tab"]?>').addClass('active show');
            $('.nav-link').removeClass('active');
            $('a[href="#<?=$_GET["tab"]?>"]').addClass('active');
            ajax('/video/<?=$_GET["tab"]?>', '', '<?=$_GET["tab"]?>');
        });
    </script>
<?php endif ?>
