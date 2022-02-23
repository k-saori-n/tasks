<link rel="stylesheet" href="style.css">

<?php 
$name = $_POST['name'];

$answer1 = filter_input(INPUT_POST, "answer1");
$answer2 = filter_input(INPUT_POST, "answer2");
$answer3 = filter_input(INPUT_POST, "answer3");

$correctAnswer1 = $_POST['correctAnswer1'];
$correctAnswer2 = $_POST['correctAnswer2'];
$correctAnswer3 = $_POST['correctAnswer3'];

function check ($answer, $correctAnswer) {
    if (!$answer) {
        echo "回答が選択されていません";
    } else if ($answer === $correctAnswer) {
        echo "正解！";
    } else {
        echo "残念...";
    }
}
?>

<p class="firstSentence"><?php echo $name; ?>さんの結果は・・・？</p>
<p>①の答え</p>
<?php echo check($answer1, $correctAnswer1); ?>
<p>②の答え</p>
<?php echo check($answer2, $correctAnswer2); ?>
<p>③の答え</p>
<?php echo check($answer3, $correctAnswer3); ?>