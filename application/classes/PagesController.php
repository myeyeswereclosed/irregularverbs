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
	private static function get_no_results() 
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
	public static function search_by_start($start, $conn) 
	{
		$verbs = $conn->get_by_start($start);
		
		if (empty($verbs)) {
			self::get_no_results();
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
	public static function search_by_level($level, $conn) 
	{
		$verbs = $conn->get_by_level($level);
		
		if (empty($verbs)) {
			self::get_no_results();
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
	public static function search_word($word, $conn) 
	{
		$verb = $conn->get_word($word);
		
		if (empty($verb)) {
			self::get_no_results();
			die();
		}
		return view('word', compact('verb'));
	}

}

?>