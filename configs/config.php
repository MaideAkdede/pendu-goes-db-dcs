<?php
define('DB_PATH', $_SERVER['DOCUMENT_ROOT'] . '/data/words.sqlite');
define('PAGE_TITLE', 'Pendu Goes DB');
define("MAX_TRIALS", 8);
define("REPLACEMENT_CHAR", '*');

$data = [];
$view = './views/start.php';