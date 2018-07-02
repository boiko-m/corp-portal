<?php
    use yii\helpers\Html;
    /* @var $this yii\web\View */
    $this->title = 'Диалоги';
?>

<div class="row">
    <div class="col md-12">
        <div class="card card-static">
            <div class="row">
                <div class="col-md-3 list-user-panel">
                    <div class="list-user-header">
                        <i class="fa fa-search im-icon im-icon-search-list-user"></i>
                        <input type="text" name="" class="im-user-input-search" placeholder="Поиск">
                        <i class="fa fa-plus im-icon im-icon-plus"></i>
                    </div>
                    <div class="im-list-user-field" id="slimmcroll-1">
                        <ul class="im-list-user-messages"></ul>
                    </div>
                    <div class="list-user-footer">
                        <div class="dropup">
                            <i class="fa fa-cog im-icon im-icon-setting" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <ul class="dropdown-menu im-dialog-options-list" aria-labelledby="dropdownMenu3">
                                <li class="im-dialog-option-item"><input type="checkbox" name=""><span>Включить настройки</span></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 dialog-panel">
                    <div class="im-dialog-header">
                        <i class="fa fa-arrow-left im-icon im-icon-arrow"></i>
                        <a>
                            <img src="http://portal.lbr.ru/img/user/thumbnail_1513319153.jpg" class="im-dialog-header-image (img-thumbnail rounded)">
                            <span class="im-dialog-panel-name"></span>
                        </a>
                        <div class="btn-group im-dialog-options">
                            <i class="fa fa-ellipsis-h im-icon im-icon-ellipsis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <ul class="dropdown-menu im-dialog-options-list">
                                <li class="im-dialog-option-item"><span>Вложения диалога</span></li>
                                <li class="im-dialog-option-item"><span>Очистить историю</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="im-dialog-field" id="slimmcroll-2">
                        <ul class="im-dialog-list-messages"></ul>
                    </div>
                    <div class="im-dialog-drop-zone">
                        <div class="upload-drop-zone" id="drop-zone">
                            Просто перетащите файл сюда
                        </div>
                    </div>
                    <div class="im-dialog-footer">
                        <div class="im-dialog-footer-grid">
                            <div class="dropup">
                                <i class="fa fa-paperclip im-icon im-icon-paperclip" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                                <ul class="dropdown-menu im-dialog-options-list" aria-labelledby="dropdownMenu2">
                                    <li class="im-dialog-option-item"><span>Фотография</span></li>
                                    <li class="im-dialog-option-item"><span>Документ</span></li>
                                </ul>
                            </div>
                            <input type="text" name="" class="im-dialog-message-input" placeholder="Введите сообщение...">
                            <i class="fa fa-arrow-right im-icon im-icon-paper" title="Отправить сообщение"></i>
                            <!-- <i class="fa fa-microphone im-icon im-icon-microphone" title="Голосовое сообщение"></i> -->
                        </div>
                        <div class="row im-dialog-footer-attachments"></div>
                    </div>
                </div>
                <div class="im-dialog-preview">
                    <div class="im-dialog-preview-main">
                        <i class="fa fa-envelope im-icon im-icon-envelope"></i>
                        <p class="im-dialog-preview-text">Выберите диалог и начните переписываться</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
