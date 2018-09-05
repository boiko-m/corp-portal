<div class="row">
  <div class="col-xs-12 col-md-12">
    <ul class="nav nav-tabs nav-justified nav-project" style="margin: 20px;">
      <!-- <li class="nav-item">
        <a href="#spr1" class="nav-link" title="Дата проведения: 20.02.2018 - 20.03.2018" data-toggle="tab" aria-expanded="false">Спринт 1</a>
      </li> -->
      <li class="nav-item">
        <a href="#results" class="nav-link active" data-toggle="tab" aria-expanded="false">Цели и итоги</a>
      </li>
    </ul>

    <div class="tab-content" style="padding: 20px;">
      <!-- <div id="spr1" class="tab-pane show">
        <table class="table table-striped">
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
      </div> -->

      <div id="results" class="tab-pane show active objects-stage" style="padding: 0px 20px;">
        <h5>Цели этапа</h5>
        <div class="project-target pl-20">
         	<? foreach($objects as $key => $object) { ?>
                <div class="project-target-items" style="background: #f5f5f5;">
                    <div class="project-target-item">
                        <?= $object->description ?>
                    </div>

                    <!-- <div style="padding-left: 20px;">
                        <small>Цель скорректирована:
                            <b>Причина: </b>Перенос на следующий этап.
                        </small>
                    </div> -->

                    <? if (!$object->value == 0) : ?>
                        <div class="text-right">
                                <small>Решено <?= $object->factual_value ?>/<?= $object->value ?></small>
                        </div>

                        <div class="progress" style="height: 5px; margin: 0px; border: 1px solid #3ec39685;">
                            <div class="progress-bar progress-lg bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?= ($object->factual_value * 100) / $object->value ?>%;" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    <? endif; ?> 

                    <? if ($object->complete) : ?>
                        <div class="text-right">
                            <small>Цель достигнута!</small>
                        </div>
                    <? endif; ?>
                </div>
       		<? } ?>
       		<? if (count($objects) < 1): ?>
                <div class="text-center">
                    <i class="fa fa-question fa-4x" aria-hidden="true" title="На данный момент цели этапа отсутствуют" style="transform: rotate(180deg)"></i>
      			</div>
       		<? endif; ?>
        </div>

       	<? if ($stage->date_begin < time()) : ?>
            <br>
            <h5>Итоги этапа</h5>

            <div class="project-target pl-20">
                <? foreach($results as $key => $result) { ?>
                    <div class="project-target-items">
                        <div class="project-target-item">
                            <?= $result->description ?>
                        </div>
                    </div>
                <? } ?>

                <? if (count($results) < 1): ?>
                    <div class="text-center">
                        <i class="fa fa-question fa-4x" aria-hidden="true" title="На данный момент итоги этапа отсутствуют" style="transform: rotate(180deg)"></i>
                    </div>
                <? endif; ?>
            </div>
        <? endif; ?>

      </div>
    </div>
  </div>
</div>