<?php
/**
 * Класс подключения и работы с базой данных
 */
class DbConnection
{

	private $db_host;
	private $db_name;
	public $db_user;
	private $db_password;
	private $db_table;
	private $db_conn;
	
	public function __construct($host, $dbname, $user, $password, $table) 
	{ 
		$this->db_host 	   = $host;
		$this->db_name 	   = $dbname;
		$this->db_user 	   = $user;
		$this->db_password = $password;
		$this->db_table    = $table;
		try {
			$connect_string = 'mysql:host=' . $this->db_host . 
							  ';dbname=' . $this->db_name .
							  ';charset=utf8'; 				  
			$this->db_conn = new PDO($connect_string, 
									  $this->db_user,
								      $this->db_password);
			$this->db_conn->setAttribute(PDO::ATTR_ERRMODE, 
								PDO::ERRMODE_EXCEPTION);
			} catch(Exception $e) {
				return $e->getMessage();
		}
	}
	/**
	 * Отдает данные (слова) по начальным буквам
	 * 
	 * @param  string $start : начало слова
	 * 
	 * @return array : массив слов, начинающихся со $start
	 */
	public function getByStart($start) 
	{
		$start .= '%';
		
		try {
			$result = $this->db_conn->query("SELECT * FROM $this->db_table 
											 WHERE inf LIKE '$start'
											 ORDER BY inf");

			return $result->rowCount() > 0 ? $result->fetchAll(PDO::FETCH_ASSOC) : false;
		} catch (Exception $e) {
			return $e->getMessage();
		}		
	}

	/**
	 * Отдает данные (слова) по уровню знаний 
	 * 
	 * @param  string $level : уровень знаний
	 * 
	 * @return array : массив слов, соответствующих $level
	 */
	public function getByLevel($level) 
	{
		try {
			$result = $this->db_conn->query("SELECT *						
											 FROM $this->db_table 
											 WHERE level = '$level'										
											 ORDER BY inf");

			return $result->rowCount() > 0 ? $result->fetchAll(PDO::FETCH_ASSOC) : false;
		} catch (Exception $e) {
			return $e->getMessage();
		}		
	}

	/**
	 * Отдает введенное пользователем слово в трех формах с переводом
	 * 
	 * @param  string $word : слово
	 * 
	 * @return array : ряд из таблицы БД, соответствующий слову 
	 */
	public function getWord($word) 
	{
		try {
			$result = $this->db_conn->query("SELECT * FROM $this->db_table 
											  WHERE inf = '$word'
											  ORDER BY inf");
			return $result->rowCount() > 0 ? $result->fetch(PDO::FETCH_ASSOC) : false;
		} catch (Exception $e) {
			return $e->getMessage();
		}		
	}
}	

?>