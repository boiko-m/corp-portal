<?php 
if ($messages) {
    //echo var_dump($messages);
    foreach ($messages as $message): ?>
        <div class=" nav-justified col-xs-3 container-fluid">
            От: <b><?=$message['Отправитель']['ФИО'] ?> , <?=$message['ДатаОтправления'] ?></b>  <br> Кому: <b><?=$message['ПолучателиТекст'] ?></b><br> <br> <?=$message['Текст'] ?>  <br>  <br> 
            <hr>
        </div>
    <?php endforeach;?>
    <?php if (count($messages) == $count_messages): ?>
        <div class="messages-next dropdown-item" style = "cursor: pointer;text-align: center;padding: 10px;background: #f3f3f3" onclick = "ajaxappend('messages', 'ref=<?=$ref?>&skip=<?=$skip?>', 'messages')">
            Подгрузить прошлые сообщения
        </div>
    <?php endif ?>

<?php
} else {
    echo "Сообщений не найдено";
}

?>
