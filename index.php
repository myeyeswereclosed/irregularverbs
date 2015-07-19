<?php

/*$data = array(
    array('id' => 1, 'pid' => 0, 'name' => '1'),
    array('id' => 2, 'pid' => 1, 'name' => '1.1'),
    array('id' => 3, 'pid' => 2, 'name' => '1.1.1'),
    array('id' => 4, 'pid' => 0, 'name' => '2'),
    array('id' => 5, 'pid' => 0, 'name' => '3'),
    array('id' => 6, 'pid' => 5, 'name' => '3.1'),
    array('id' => 7, 'pid' => 5, 'name' => '3.2'),
);

function rec_tree($array, $pid = 0) {
	$arr = array();
	foreach ($array as $row) {
		if ($pid == (int)$row['pid']) {
			$arr[$row['id']] = $row; 
			$arr[$row['id']][] = rec_tree($array, (int)$row['id']);
		}			
	}
	return count($arr) ? $arr : null;
}




echo "<pre>";
print_r($data);
print_r(rec_tree($data));
echo "</pre>";*/

//ini_set('display_errors', 1);
require_once 'application/bootstrap.php'; 

?>