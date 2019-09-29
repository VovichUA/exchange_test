<?php
require_once '../layout/head.php';
$n = 5;
?>
<br>
<div class="container">
    <form action="" method="post">
        <label>
            <select name="countOfExchanges" class="form-control">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
            </select>
        </label>
        <input type="submit" name="filter" value="Показать последние запросы" class="btn btn-success">
    </form>
</div>
<pre>
    <?php
    if (isset($_POST['filter'])) {
        $n = $_POST['countOfExchanges'];
    }
    ?>
</pre>
<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">Дата</th>
        <th scope="col">Тип операции</th>
        <th scope="col">Валюта</th>
        <th scope="col">Курс</th>
        <th scope="col">Сумма</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach (array_reverse($_COOKIE['info_from_exchange'], true) as $key => $item) :
        $unserializeArray = unserialize($item);
    if ($i <= $n) :
    ?>

        <tr>
            <td><?= date('Y-m-d H:i',$key) ?></td>
            <td><?= $unserializeArray['type_exchange'] ?></td>
            <td><?= $unserializeArray['ccy'] ?></td>
            <?php if (isset($unserializeArray['buy_exchange'])) : ?>
                <td><?= $unserializeArray['buy_exchange'] ?></td>
            <?php elseif (isset($unserializeArray['sale_exchange'])) : ?>
                <td><?= $unserializeArray['sale_exchange'] ?></td>
            <?php endif; ?>
            <td><?= $unserializeArray['result'] ?></td>
        </tr>
        <?php
        $i++;
        endif;
        endforeach;
        ?>
    </tbody>
</table>