<?php
    use app\models\Broadcast;

    $this->title = "Трансляции";
    /*$this->params['breadcrumbs'][] = ['label' => 'Обучающий материал', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $faqtype->name, 'url' => "/training/type/" . $faqtype->id];*/
    $this->params['breadcrumbs'][] = $this->title;
?>



<style>
    .videos_link {
        transition: 0.3s;
        border-radius: 5px;
    }
    .videos_link:hover {
        color: black !important;
    }
</style>
<div class="row ">
    <div class="card-box col-12">
        <ul class="nav nav-tabs tabs-bordered">
            <li class="nav-item">
                <a href="#broadcasts" data-toggle="tab" aria-expanded="false" class="nav-link active">
                    Трансляции компании
                </a>
            </li>
            <li class="nav-item">
                <a href="#videos" data-toggle="tab" aria-expanded="false" class="nav-link">
                    Видео трансляций
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane fade active show" id="broadcasts">
                <div class="row">
                    <?php $broadcasts = Broadcast::find()->where(['complete' => false])->limit(4)->orderby('id desc')->all(); ?>
                    <?php if (count($broadcasts) == 0) : ?>
                        <h5 class="col-md-12 text-center">На данный момент нет трансляций</h5>
                    <? endif; ?>
                    <?php foreach ($broadcasts as $broadcast): ?>
                        <div class="col-xl-3 col-xs-12 videos_link" onclick="window.open('/broadcast/<?= $broadcast->id ?>')" style="cursor: pointer; text-align: center;">
                            <div>
                                <img src="http://portal.lbr.ru/img/broadcast/live.png" alt="" width="245" height="190" style="padding: 60px;">
                            </div>
                            <div class="text-left" style="font-size: 10px">
                                <?= date('d.m.Y', $broadcast->create_at) ?>
                            </div>
                            <div class="text-center" style="padding: 5px">
                                <?= $broadcast->name ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
            <div class="tab-pane fade" id="videos">
                <?php $videos = Broadcast::find()->where(['complete' => true])->limit(4)->orderby('id desc')->all(); ?>
                <?php if (count($videos) == 0) : ?>
                        <h5 class="col-md-12 text-center">Трансляций еще не было</h5>
                    <? endif; ?>
                    <?php foreach ($videos as $video): ?>
                        <div class="col-xl-3 col-xs-12 videos_link" onclick="window.open('/broadcast/<?= $video->id ?>')" style="cursor: pointer; text-align: center;">
                            <div>
                                <img src="http://portal.lbr.ru/img/broadcast/not-live.png" alt="" width="325" height="180" style="padding: 60px;">
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
