<?php

$file = fopen('names.txt', 'r') or die("where's the names?\n");

// lazy but it seems more efficient
$lines = (int)shell_exec('wc -l < names.txt');
$target_line = rand() % $lines;
$current_line = 0;

do {
	$line = fgets($file);

} while (++$current_line < $target_line);

$html = <<< FUCC
<!doctype html>
<html>
	<head>
		<title>fantasy name generator</title>
	</head>
	<body>
		<h1>Your fantasy name is... <b>
			%s
		</b></h1>
	</body>
</html>

FUCC;

printf($html, trim($line));


