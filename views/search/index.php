
<div class="no-result">
    <?php
    if(empty($profile)){
        echo "Результатов не найдено";
    }
    else{
    ?>
</div>


<?php foreach ($profile as $value) {
    $branch = $value['branch'] . ', ' . $value['department'];
    $name = $value['first_name'] . ' ' . $value['last_name'];


    ?>


    <div class="all">


        <div id="one">
            <?= \yii\helpers\Html::a(\yii\helpers\Html::img($value->getImage(),
                ['alt' => '', 'align' => "center", 'class' => "center-img", 'style' => 'width: 76px;border-radius: 5px;  ']), '/profiles/' . $value['id']); ?></div>


        <div id="two" style="padding: -5px 0 0 0">
        <span>
                       <?= \yii\helpers\Html::a($name, '/profiles/' . $value['id']) ?>
                    </span>


        <br>

        <span title="<?= $value['position'] ?>" class="branch">
                        <?php

                        echo mb_strimwidth($value['position'], 0, 45, '...');
                        ?>
                    </span>

        <br>

        <?php if (($value['user']['email']) != '') {

            ?>
            <span>
                        <?= $value['user']['email']; ?>
                    </span>
            <br>
        <?php }
        ?>

        <span title="<?= $branch ?>" class="branch">
                        <?php

                        echo mb_strimwidth($branch, 0, 45, '...');
                        ?>
                    </span>
    </div>

    <div id="three" align="center" style="padding: 10px 0 0 0">
        <?php if (!empty($value['cabinet'])) { ?>
            <span title="№ кабинета" style="padding:  0 0 0 5px" >
                Каб.
                <?=' ' . $value['cabinet']; ?>
            </span>
            <br>
        <?php } ?>
        <?php if (!empty($value['phone_cabinet']) && $value['phone_cabinet'] != '-') { ?>
            <span title="Рабочий телефон" >
                Тел.
                <?=' ' . $value['phone_cabinet']; ?>
            </span>
        <?php } ?>
    </div>

    <div id="four" align="left" style="padding: 10px 0 0 0">    <?php
        $onePhone = explode(",", $value['phone']);
        echo "<a href=tel:" . $onePhone[0] . '>' . $onePhone[0] . '</a><br>';
        echo "<a href=tel:" . $onePhone[1] . '>' . $onePhone[1] . '</a><br>';
        ?>

    </div>

    <div id="five" style="padding: 10px 0 0 0">
        <?php if ($value['skype'] != ''){ ?>
            <a href="skype:<?= $value['skype']; ?>"><i class="fa fa-skype"></i></a>

            <?php } ?>
    </div>
    </div>

    <hr>
<?php }?><div style="margin: 10px"><?=\yii\helpers\Html::a('Открыть все результаты', \yii\helpers\Url::to('/search/view/'), ['class' => 'btn  waves-effect w-md btn-light',
        'data' => [
        'method' => 'get',
        'params' => [
            'ProfileSearch' =>  $post,
        ],
    ],])?></div><?
}?>





