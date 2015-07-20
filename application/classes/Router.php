<?php

/**
 * По методу запроса страницы определяет
 * метод и параметры поиска данных, передаваемые 
 * в контроллер страниц 
 */
class Router 
{

	private $request_method;
	private $params;
	private $levels;

	private $url;

	public function __construct($base_url, $url, $request_method, $levels) {
		$this->url = explode('/', str_replace($base_url, '', $url));
		$this->params = explode('/', str_replace($base_url, '', $url));
		$this->request_method = $request_method;
		$this->levels = $levels;
	}

	/**
	 * Определяет метод и параметры поиска
	 * 
	 * @return array : массив метода и параметра поиска
	 */
	public function getControllerSet() 
	{
		if ($this->request_method == 'POST') {
			$controller_set['method'] = 'searchByStart';
			$controller_set['param'] = $_POST['search'];
		} else {
			switch (count($this->params)) {
				case 2:	
					if (strlen($this->params[1]) <= 1) {
						$controller_set['method'] = 'searchByStart';
					} elseif (in_array($this->params[1], $this->levels)) {
						$controller_set['method'] = 'searchByLevel';
					} else {
						$controller_set['method'] = 'searchWord';	
					} 
					break;
				default:
					$controller_set['method'] = 'searchWord';
					$controller_set['param'] = $this->params[1];
					break;
			}
			$controller_set['param'] = $this->params[1];
		}
		return $controller_set;
	}
}

?>