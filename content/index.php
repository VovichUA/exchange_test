<?php
require_once '../layout/head.php';
require_once '../js/main.js'
?>
<hr>
<div class="container">
    <input type="button" class="btn btn-success" value="Купить валюту" onclick="from_uah()">
    <input type="button" class="btn btn-success" value="Продать валюту" onclick="to_uah()">

    <div class="container from_uah" style="display: none">
        <form action="" method="post">
            <br>
            <input type="hidden" name="type_exchange" value="Покупка валюты">
            <label>
                <input type="number" step="0.01" class="form-control" name="ua_money">
            </label>
            
            <label>
                <select name="buy_exchange" id="" class="form-control">
                    <?php foreach ($curses as $curs) : ?>
                    
                        <?php if ($curs->ccy !== 'BTC') : ?>
                            <option value="<?=$curs->sale?>"><?=$curs->ccy?>(<?=$curs->sale?>)</option>
                        <?php endif; ?>
                    
                    <?php endforeach; ?>
                </select>
            </label>
            <input type="submit" class="btn btn-success" name="send" value="сохранить">
        </form>
    </div>

    <div class="container to_uah" style="display: none">
        <form action="" method="post">
            <br>
            <input type="hidden" name="type_exchange" value="Продажа валюты">
            <label>
                <input type="number" step="0.01" class="form-control" name="money">
            </label>

            <label>
                <select name="sale_exchange" id="" class="form-control">
                    <?php foreach ($curses as $curs) : ?>

                        <?php if ($curs->ccy !== 'BTC') : ?>
                            <option value="<?=$curs->buy?>"><?=$curs->ccy?>(<?=$curs->buy?>)</option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                </select>
            </label>
            <input type="submit" class="btn btn-success" name="send" value="сохранить">
        </form>

        <?php
        if (isset($_POST['type_exchange'])) {
            $nameOfValuta = '';
            if (isset($_POST['ua_money'])) {
                $result = round($_POST['ua_money']/$_POST['buy_exchange'],2);
                foreach ($curses as $curs) {
                    if ($_POST['buy_exchange'] == $curs->sale) {
                        $nameOfValuta = $curs->ccy;
                    }
                }
            } elseif (isset($_POST['money'])) {
                $result = round($_POST['money']*$_POST['sale_exchange'],2);
                foreach ($curses as $curs) {
                    if ($_POST['sale_exchange'] == $curs->buy) {
                        $nameOfValuta = $curs->ccy;
                    }
                }
            }
            $_POST['result'] = $result;
            $_POST['ccy'] = $nameOfValuta;
            // тут можно задать длину жизни кук
            setcookie('info_from_exchange['.time().']',serialize($_POST));
        }
        ?>
    </div>
    <div class="alert alert-success" role="alert">
        Результат посленего обмена : <?=$result?>
    </div>
</div>

</body>

</html>

