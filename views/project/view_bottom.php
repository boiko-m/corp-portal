﻿<div class="row">
  <div class="col-xs-12 col-md-12">
    <h5 style="padding-left: 10px;">
      <span style="font-size: 16px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt earum, reprehenderit sequi qui recusandae rem labore numquam, deserunt soluta quo?</span>
    </h5>

    <ul class="nav nav-tabs nav-justified nav-project" style="margin: 20px;">
      <li class="nav-item">
        <a href="#spr1" class="nav-link active" title="Дата проведения: 20.02.2018 - 20.03.2018" data-toggle="tab" aria-expanded="false">Спринт 1
          <? if (Yii::$app->user->can('Scrum-master')): ?>
            <i href="#delete-sprint" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a" class="fa fa-minus delete-element" aria-hidden="true" title="Удалить спринт" style="float: right;"></i>
          <? endif; ?>
        </a>
      </li>
      <li class="nav-item">
        <a href="#results" class="nav-link" data-toggle="tab" aria-expanded="false">Цели и итоги</a>
      </li>
      <? if (Yii::$app->user->can('Scrum-master')): ?>
        <li class="nav-item col-xs-3 col-md-3">
          <a href="#add-sprite" data-animation="fadein" data-plugin="custommodal" data-overlaySpeed="10" data-overlayColor="#36404a" class="nav-link" title="Добавить этап"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </li>
      <? endif; ?>
    </ul>

    <div class="tab-content" style="padding: 20px;">
      <div id="spr1" class="tab-pane show active">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt earum, reprehenderit sequi qui recusandae rem labore numquam, deserunt soluta quo?</p>
        <table class="table project-table table-striped">
          <thead>
            <th>Задача</th>
            <th style="text-align: center;">План.</th>
            <th>Факт.</th>
            <th>%</th>
            <th>Исполнитель</th>
          </thead>
          <tbody>
            <tr>
              <td>
                <a href=""><i class="dripicons-document-edit"></i></a>
                <small><a href="" class="card-link">Разобраться, как конкуренты предлагают зпч, сразу с доставкой или после</a></small>
              </td>
              <td>3</td>
              <td>1</td>
              <td>33</td>
              <td><a href="" class="card-link">Гавриленко А.С.</a></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="results" class="tab-pane show" style="padding: 0px 20px;">
        <h5>Цели этапа</h5>
        <div class="project-target" style="padding-left: 20px;">
          <div class="project-target-items" style="background: #f5f5f5;">
            <div class="project-target-item">
              Составить индивидуальный план рекламы (ИПР) для 30 клиентов. Выбираем 3-4 филиала, на них взять по несколько клиентов, на ком тренируемся составлять ИПР - ставим по клиенту товарные цели на базе потенциала, чем занимается клиент. Определяем, что можем предложить, в какой срок, по каким каналам связи.
            </div>
            <div style="padding-left: 20px;">
              <small>Цель скорректирована:
                <b>Причина: </b>Перенос на следующий этап.
              </small>
            </div>
            <div class="text-right">
                <small>Решено 5/30</small>
            </div>
            <div class="progress" style="height: 5px; margin: 0px; border: 1px solid #3ec39685;">
              <div class="progress-bar progress-lg bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>

          <div class="project-target-items">
            <div class="project-target-item">
              Посадочная страница для клиента - персонализировать данные для клиента. При переходе по ссылке клиент попадает на страницу с предложениями специально для него.
            </div>
            <div style="padding-left: 20px;">
              <small>Цель скорректирована:
                <b>Причина: </b>Перенос на следующий этап.
              </small>
            </div>
          </div>

          <div class="project-target-items success-border">
            <div class="project-target-item">
              Сформировать стандартный перечень должностей и их роли.
            </div>
            <div class="text-right">
              <small>Цель достигнута!</small>
            </div>
          </div>
        </div>

        <br><br>
        <h5>Итоги этапа</h5>

        <div class="project-target" style="padding-left: 20px;">
          <div class="project-target-items">
            <div class="project-target-item">
              Разобрались с проблемой и выработали план действий на примере 3-х клиентов.
            </div>
          </div>
          <br>
        </div>

      </div>
    </div>
  </div>
</div>


<!-- ---------- Models ----------- -->

<div id="add-sprite" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Закрыть</span>
  </button>
  <h4 class="custom-modal-title">Создание спринта</h4>
  <div class="custom-modal-text">
    <form id="add-sprite-form">
      <div class="form-group">
        <label for="spriteDescription">Описание</label>
        <textarea class="form-control" id="spriteDescription" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="spriteBegin">Дата начало спринта</label>
        <input type="date" class="form-control" id="spriteBegin">
      </div>
      <div class="form-group">
        <label for="spriteEnd">Дата окончания спринта</label>
        <input type="date" class="form-control" id="spriteEnd">
      </div>
      <button type="submit" class="btn btn-secondary crate-dialog-group-button">Создать спринт</button>
    </form>
  </div>
</div>

<div id="delete-sprint" class="modal-demo">
  <button type="button" class="close" onclick="Custombox.close();">
    <span>&times;</span><span class="sr-only">Закрыть</span>
  </button>
  <h4 class="custom-modal-title">Создание спринта</h4>
  <div class="custom-modal-text">
    <i class="fa fa-exclamation-triangle fa-4x"></i>
    <p>Вы действительно хотите удалить данный спринт?</p>
    <div class="center">
      <button type="button" class="btn btn-danger button-successful-clear" onclick="Custombox.close();">Да, удалить</button>
      <button type="button" class="btn btn-success button-successful-clear" onclick="Custombox.close();">Отмена</button>
    </div>
  </div>
</div>