<?php
/**
 * Подключает файлы представления данных 
 * 
 * @param  string $path : путь до файла
 * @param  array  $data : передаваемый в файл массив данных
 * 
 */
function view($path, $data = NULL) {
	if ($data) {
		extract($data);
	}
	$path = $path . ".view.php";
	include 'views/layout.php';
	return true;
}

/**
 * Подключает все файлы из папки
 * 
 * @param  string $dir : адрес(имя) папки
 * 
 * @return array : массив подключаемых файлов
 */
function require_from_dir($dir) {
	$files = scandir($dir, 1);
	$files = array_diff($files, array('.', '..'));
	foreach ($files as $file) {
		$inc[] =  'config/' . $file;
	}
	return $inc;
}

?>