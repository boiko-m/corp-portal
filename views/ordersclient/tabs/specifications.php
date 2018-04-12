<table class="table table-bordered table-responsive col-xs-12" style="text-align: center;">
   <thead>
    <tr>
        <th>#</th>
        <th>Товар</th>
        <th>Кол-во</th>
        <th>Цена</th>
        <th>Скидка</th>
        <th>Цена продажи</th>
        <th>Доход</th>
        <th>Рент. %</th>
    </tr>
    </thead>
    <tbody>
    <?php $items = $order['Основная']; 
    foreach ($items as $item): $i++?>
        <?php  $product = $odata->getOne("Catalog_Товары", $item['Товар_Key']); ?>
        <tr>
            <th scope="row"><?=$i?></th>
            <td><?=$product['Description'] ?><</td>
            <td><?=$item['Количество'] ?></td>
            <td><?=$item['Цена'] ?></td>
            <td><?=$item['Скидка'] ?></td>
            <td><?=$item['ЦенаПродажи'] ?></td>
            <td>-</td>
            <td>-</td>
        </tr>               
    <?php endforeach;$i=null; ?>                            
    </tbody>
</table>