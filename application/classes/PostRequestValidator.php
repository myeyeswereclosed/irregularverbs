<?php
/**
 * Класс проверки POST-запросов
 */
class PostRequestValidator implements Validator 
{
	/**
	 * Строка из формы поиска
	 * Массив правил валидации 
	 * 
	 * @var string
	 * @var array
	 */
	private $data;
	private $rules;
	
	/**
	 * Передает свойства
	 * 
	 * @param string $data : строка поиска
	 * @param array $rules : массив правил
	 */
	public function __construct($data, $rules) 
	{
		$this->data  = $data;
		$this->rules = $rules;
	}

	/**
	 * Проверяет строку поиска на соответствие правилу допустимых символов
	 * 
	 * @return boolean : соответствие правилу допустимых символов
	 */
	public function validate() 
	{
		if (preg_match($this->rules['pattern'], $this->data)) {
			return false;
		}
		return true;
	}
}

?>