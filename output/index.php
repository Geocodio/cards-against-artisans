<?php
if (isset($_GET['white']) && isset($_GET['black'])) {
	$whiteCardTitles = file(__DIR__ . '/../src/white.txt');
	$blackCardTitles = file(__DIR__ . '/../src/black.txt');

	file_put_contents('votes', trim($blackCardTitles[intval($_GET['black']) - 1] ?? '?') . ' => ' . trim($whiteCardTitles[intval($_GET['white']) - 1] ?? '?') . PHP_EOL, FILE_APPEND);
	header('location: /');
	exit;
}
?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-8 bg-orange-100">
<?php
$cards = glob('png/cards/*.png');
$cards = array_filter($cards, fn ($name) => str_contains($name, 'FRONT'));
$whiteCards = array_values(array_filter($cards, fn ($name) => str_contains($name, 'white')));
$blackCards = array_values(array_filter($cards, fn ($name) => str_contains($name, 'black')));
$selectedBlackCard = $blackCards[mt_rand(0, count($blackCards) - 1)];
$selectedBlackCardNumber = (int)filter_var($selectedBlackCard, FILTER_SANITIZE_NUMBER_INT);

echo '<img class="w-96 mx-auto" src="'. $selectedBlackCard .'">';
?>
<a class="block my-8 text-center text-red-500 hover:underline" href="index.php?white=-&black=<?php echo $selectedBlackCardNumber; ?>">None of the white cards work with this one</a>
<?php
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