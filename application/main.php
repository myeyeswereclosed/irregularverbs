<?php

/**
 *  Файл загрузки необходимых классов в зависимости от запроса пользователя
 *  Классы находятся в папке "classes"
 *  Параметры для создания экземпляров классов подгружаются из папки "config"
 */

/**
 * По методу запроса определяется требуемый валидатор данных запроса
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	$validator = new GetRequestValidator( $base_url, 
					 					  urldecode($_SERVER['REQUEST_URI']), 
										  $rules);

} else {
	$validator = new PostRequestValidator($_POST['search'],
										  $rules);
}

/**
 * В случае валидации создается маршрутизатор, подключается база данных, 
 * контроллер страниц подгружает нужную страницу отображения данных 
 */
if (!$validator->validate()) {
	header("Location:/");
} else {
	$router = new Router( $base_url, 
						  urldecode($_SERVER['REQUEST_URI']), 
						  $_SERVER['REQUEST_METHOD'],
						  $levels);
	$db_conn = new DbConnection($db_config['DB_HOST'],
								$db_config['DB_NAME'],
								$db_config['DB_USER'],
								$db_config['DB_PASSWORD'],
								$db_config['DB_TABLE']);

	if (!$db_conn)
		die('No connection to database');
	$controller_method = $router->get_controller_set()['method'];
	$controller_param  = $router->get_controller_set()['param'];

	PagesController::$controller_method($controller_param, $db_conn);
}

?>