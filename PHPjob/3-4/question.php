<link rel="stylesheet" href="style.css">

<?php
$name = filter_input(INPUT_POST, "name");

if (!$name) {
    echo "名前を入力してください";
    exit;
}

$answers1 = [80, 22, 20, 21];
$answers2 = ["PHP", "Python", "JAVA", "HTML"];
$answers3 = ["join", "selext", "insert", "update"];

$correctAnswer1 = $answers1[0];
$correctAnswer2 = $answers2[3];
$correctAnswer3 = $answers3[1];
?>

<p class="firstSentence">お疲れ様です<?php echo $name; ?>さん</p>
<form action="answer.php" method="POST">
<h2>①ネットワークのポート番号は何番？</h2>
<?php foreach ($answers1 as $answer) { ?>
    <input type="radio" name="answer1" value="<?php echo $answer; ?>">
    <?php echo $answer; ?>
<?php } ?>
<h2>②Webページを作成するための言語は？</h2>
<?php foreach ($answers2 as $answer) { ?>
    <input type="radio" name="answer2" value="<?php echo $answer; ?>">
    <?php echo $answer; ?>
<?php } ?>
<h2>③MySQLで情報を取得するためのコマンドは？</h2>
<?php foreach ($answers3 as $answer) { ?>
    <input type="radio" name="answer3" value="<?php echo $answer; ?>">
    <?php echo $answer; ?>
<?php } ?>
<br>
<input type="hidden" name="name" value="<?php echo $name; ?>" />
<input type="hidden" name="correctAnswer1" value="<?php echo $correctAnswer1; ?>" />
<input type="hidden" name="correctAnswer2" value="<?php echo $correctAnswer2; ?>" />
<input type="hidden" name="correctAnswer3" value="<?php echo $correctAnswer3; ?>" />
<input type="submit" value="回答する"; class="button2" />
</form>