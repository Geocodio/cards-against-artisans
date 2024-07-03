<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-8 bg-orange-100">
<?php
if (isset($_GET['white']) && isset($_GET['black'])) {
	file_put_contents('votes', $_GET['black'] . ' => ' . $_GET['white'] . PHP_EOL, FILE_APPEND);
}

$cards = glob('png/cards/*.png');
$cards = array_filter($cards, fn ($name) => str_contains($name, 'FRONT'));
$whiteCards = array_values(array_filter($cards, fn ($name) => str_contains($name, 'white')));
$blackCards = array_values(array_filter($cards, fn ($name) => str_contains($name, 'black')));
$selectedBlackCard = $blackCards[mt_rand(0, count($blackCards) - 1)];
$selectedBlackCardNumber = (int)filter_var($selectedBlackCard, FILTER_SANITIZE_NUMBER_INT);

echo '<img class="w-96 mx-auto" src="'. $selectedBlackCard .'"><br />';

$whiteCardIndexes = [];
while (count($whiteCardIndexes) < 5) {
	$whiteCardIndexes[] = mt_rand(0, count($whiteCards) - 1);
	$whiteCardIndexes = array_unique($whiteCardIndexes);
}

echo '<div class="grid grid-cols-5 gap-4">';
foreach ($whiteCardIndexes as $index) {
	echo '<a href="index.php?white='. (int)filter_var($whiteCards[$index], FILTER_SANITIZE_NUMBER_INT) .'&black='. $selectedBlackCardNumber .'"><img class="" src="'. $whiteCards[$index] .'"></a>';
}
echo '</div>';
?>
</body>
</html>