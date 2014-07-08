<?php

$folder_path = '/includes/juggernaut/';

$tiles = array(
	'grass',
	'rock',
	'sea'
);

$board_order = array();
$board_columns = 11;

for ($i=1; $i <= $board_columns; $i++)
{
	$midpoint = $i / $board_columns;

	if($midpoint < .5) {
		$board_rows = (($i + $board_columns) - $board_columns) + 6;
	}
	elseif($midpoint > .5) {
		$board_rows = ($board_columns + (1 - $i)) + 6;
	}
	
	for ($j=1; $j <= $board_rows; $j++)
	{
		$random_tile = rand(0, 2);
		$board_order[$i][] = $tiles[$random_tile];
	}
}

/***
****CAN BE USED TO STORE IN DB*****
$serialized_board_order = serialize($board_order);
$unserialized_board_order = unserialize($serialized_board_order);
*/
?>

<html>
<head>
	<link rel="stylesheet" href="<?= $folder_path; ?>css/board.css" type="text/css" media="all" />
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?= $folder_path; ?>js/board.js"></script>


</head>
<body>

	<div id="honeycomb" class="board">
		<?php for ($i=1; $i <= count($board_order);$i++) : ?>
			<div id="row-<?=$i;?>" class="row">

				<?php for ($j=1; $j < count($board_order[$i]);$j++) : ?>
					<img id="tile-<?=$i . '-' . $j?>" class="tiles <?=$board_order[$i][$j]?>" src="<?= $folder_path; ?>images/tile-set/hex/<?=$board_order[$i][$j]?>-hex-tile.png" />
				<?php endfor; ?>

			</div>
		<?php endfor; ?>
	</div>

</body>
</html>