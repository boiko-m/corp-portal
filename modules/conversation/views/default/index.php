<?php
    use yii\helpers\Html;
    use app\assets\ImAsset;
    use app\assets\AppAsset;
    AppAsset::register($this);
    ImAsset::register($this);
    $this->title = 'Диалоги';
?>

<div class="card card-static">
    <div class="row">
        <div class="col-md-3 list-user-panel">
            <div class="list-user-header">
                <i class="fa fa-search im-icon im-icon-search-list-user"></i>
                <input type="text" name="" class="im-user-input-search" placeholder="Поиск">
                <i class="fa fa-plus im-icon im-icon-plus" href="#add-modal" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a"></i>
            </div>
            <div class="im-list-user-field" id="slimmcroll-1">
                <ul class="im-list-user-messages"></ul>
            </div>
            <div class="list-user-footer">
                <div class="dropup">
                    <i class="fa fa-cog im-icon im-icon-setting" href="#setting-modal" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a"></i>
                </div>
            </div>
        </div>

        <div class="col-md-9 dialog-panel">
            <div class="im-dialog-header">
                <i class="fa fa-arrow-left im-icon im-icon-arrow"></i>
                <a target="_blank">
                    <img src="" class="im-dialog-header-image (img-thumbnail rounded)">
                    <span class="im-dialog-panel-name"></span>
                </a>
                <div class="btn-group im-dialog-options">
                    <i class="fa fa-ellipsis-h im-icon im-icon-ellipsis" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                    <ul class="dropdown-menu im-dialog-options-list">
                        <li class="im-dialog-option-item" href="#attachment-modal" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a"><span>Вложения диалога</span></li>
                        <li class="im-dialog-option-item" href="#clear-modal" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a"><span>Очистить историю</span></li>
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
                    <textarea name="" class="im-dialog-message-input" placeholder="Введите сообщение..."></textarea>
                    <i class="fa fa-arrow-right im-icon im-icon-paper" title="Отправить сообщение"></i>
                    <!-- <i class="fa fa-microphone im-icon im-icon-microphone" title="Голосовое сообщение"></i> -->
                </div>
                <div class="row im-dialog-footer-attachments"></div>
            </div>
        </div>
        <div class="im-dialog-preview">
            <div class="im-dialog-preview-main">
                <i class="fa fa-envelope im-icon im-icon-envelope"></i>
                <p class="im-dialog-preview-text">Выберите диалог и начните общаться</p>
            </div>
        </div>
    </div>
</div>


<!-- --------------------- Models ------------------- -->

<div id="add-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Закрыть</span>
    </button>
    <h4 class="custom-modal-title">Создание группы</h4>
    <div class="custom-modal-text">
        <p>Выберите нескольких сотрудников и создайте беседу</p>
        <div class="row">
            <div class="col-lg-12">
                <input type="text" class="search-create-group" name="">
                <div class="card-box text-left">
                    <div class="inbox-widget slimscroll">
                        <p class="info-create-group text-center">Здесь будут отображаться результаты поиска</p>
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary crate-dialog-group-button">Создать беседу</button>
    </div>
</div>

<div id="attachment-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Закрыть</span>
    </button>
    <h4 class="custom-modal-title">Список вложений</h4>
    <div class="custom-modal-text">
        <ul class="attachment-dialog-list"></ul>
    </div>
</div>

<div id="clear-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Закрыть</span>
    </button>
    <h4 class="custom-modal-title">Очистка истории</h4>
    <div class="custom-modal-text">
        <i class="fa fa-exclamation-triangle fa-4x"></i>
        <p>Вы действительно хотите удалить историю диалога?</p>
        <div class="center">
            <button type="button" class="btn btn-danger button-successful-clear" onclick="Custombox.close();">Очистка</button>
            <button type="button" class="btn btn-success button-successful-clear" onclick="Custombox.close();">Отмена</button>
        </div>
    </div>
</div>

<div id="setting-modal" class="modal-demo">
    <button type="button" class="close" onclick="Custombox.close();">
        <span>&times;</span><span class="sr-only">Закрыть</span>
    </button>
    <h4 class="custom-modal-title">Настройки диалогов</h4>
    <div class="custom-modal-text">
        <p>Вы можете выбрать несколько настроек одновременно и они применяются автоматически</p>
        <ul class="setting-dialog-list text-left">
            <li class="setting-dialog-item">
                <input type="checkbox" name="" value="">Отображать только мобильную версию
            </li>
            <li class="setting-dialog-item">
                <input type="checkbox" name="" value="">Сортировать список диалогов по имени
            </li>
            <li class="setting-dialog-item">
                <input type="checkbox" name="" value="">Открывать группы первыми
            </li>
        </ul>
    </div>
</div>