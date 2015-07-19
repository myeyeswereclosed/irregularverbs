<?php
/**
 * Класс проверки GET-запросов
 */
class GetRequestValidator implements Validator 
{	
	/**
	 * Путь к запрашиваемому URL относительно корневого URL (массив разделов) 
	*/
	private $path;


	/**
	 * Массив правил валидации
	 */
	private $rules;
	
	/**
	 * Передает свойства объекта
	 * 
	 * @param string $base_url : корневой URL
	 * @param string $url      : запрашиваемый URL
	 * @param array  $rules    : правила валидации запрашиваемых URL
	 */
	public function __construct($base_url, $url, $rules) 
	{
		$this->path = explode('/', $url);//str_replace($base_url, '', $url));
		$this->rules = $rules;	
	}

	/**
	 * Проверяет массив пути к запрашиваемому URL относительно корневого URL
	 * на соответствие правилу максимальной длины пути
	 *  
	 * @return boolean : соответствие правилу максимальной длины пути
	 */
	private function validatePaths() 
	{
		return (count($this->path) <= $this->rules['max_path_length']);
	}

	/**
	 * Проверяет массив пути на соответствие правилу допустимых символов
	 *  
	 * @return boolean : соответствие правилу допустимых символов 
	 */
	private function validateData() 
	{
		foreach ($this->path as $path) {
			if (preg_match($this->rules['pattern'], $path)) {
				return false;
			}	
		}
		return true;
	}

	/**
	 * Проверяет корректность запрашиваемого URL
	 * 
	 * @return boolean : соответствие URL правилам валидации
	 */
	public function validate() 
	{
		return ($this->validatePaths() &&
				$this->validateData());			
	}

}



?>