<?php
 $numbers = $_GET['numbers'];

 function pickNumber ($numbers) {
    try {
        if ($numbers == null) {
            throw new Exception('数字が入力されていません');
        } else if (preg_match('/^[0-9]+$/', $numbers)) {
            $strNumber = strlen($numbers);
            $number = intval(substr($numbers, mt_rand(0, $strNumber - 1), 1));
            echo date("Y/m/d", time()).'の運勢は<br>';
            echo "選ばれた数字は{$number}<br>";
            return $number;
        } else {
            throw new Exception('整数を入力してください（半角数字）');
        }
    } catch (Exception $e) {
        echo $e -> getMessage();
        exit;
    }
 }

 function fortuneTelling ($number) {
     try {
        if ($number === 0) {
            $luck = "凶";
        } else if ($number >= 1 && $number <= 3) {
            $luck = "小吉";
        } else if ($number >= 4 && $number <= 6) {
            $luck = "中吉";
        } else if ($number === 7 || $number === 8) {
            $luck = "吉";
        } else if ($number === 9) {
            $luck = "大吉";
        } else {
            throw new Exception('エラー');
        }
        return $luck;
    } catch (Exception $e) {
        echo $e -> getMessage();
        exit;
    }
 }
?>

<p>
<?php echo fortuneTelling(pickNumber($numbers)); ?>
</p>
