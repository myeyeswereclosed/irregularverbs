<?php
/**
 * Подключает страницы отображения данных
 * в зависимости от выполняемого метода
 */
abstract class PagesController 
{ 
	/**
	 * Подключает страницу отображения данных 
	 * 
	 * @return callable : функция подключения страницы отображения данных
	 */
	private static function getNoResults() 
	{
		$status = 'Ничего не найдено';
		return view('empty', compact('status'));	
	}

	/**
	 * Ищет слово по его началу
	 * 
	 * @param  string $start : начальная буква (буквы) слова
	 * @param  object $conn : объект подключения к БД
	 * 
	 * @return callable : функция подключения страницы отображения данных
	 */
	public static function searchByStart($start, $conn) 
	{
		$verbs = $conn->getByStart($start);
		
		if (empty($verbs)) {
			self::getNoResults();
			die();
		}

		return !empty($start) ? 
				view('single', compact('verbs')) : 
				view('index', compact('verbs'));
	}

	/**
	 * Ищет слово по уровню знаний, к которому относится слово
	 * 
	 * @param  string $level : уровень знаний
	 * @param  object $conn : объект подключения к БД
	 * 
	 * @return callable : функция подключения страницы отображения данных
	 */
	public static function searchByLevel($level, $conn) 
	{
		$verbs = $conn->getByLevel($level);
		
		if (empty($verbs)) {
			self::getNoResults();
			die();
		}
		return view('level', compact('verbs'));
	}

	/**
	 * Ищет слово целиком (GET-запрос)
	 * 
	 * @param  string $word : слово
	 * @param  object $conn : объект подключения к БД
	 * 
	 * @return callable : функция подключения страницы отображения данных
	 */
	public static function searchWord($word, $conn) 
	{
		$verb = $conn->getWord($word);
		
		if (empty($verb)) {
			self::getNoResults();
			die();
		}
		return view('word', compact('verb'));
	}

}

?>