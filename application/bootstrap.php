<?php

/**
 * Подключение необходимых вспомогательных функций, конфигурационных файлов и классов
 */
require 'helpers.php';
foreach ($incs = require_from_dir(__DIR__ . '/config' ) as $inc) {
	require $inc;
}
require 'autoload.php';
require 'main.php';

?>

