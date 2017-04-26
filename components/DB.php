<?php

class DB
{
	private $dbh;
	private $className = 'stdClass';

    /**
     * Подключается к БД
     */
	public function __construct()
	{
		$this->dbh = new PDO('mysql:dbname=myphpframework;host=MyPHPFramework', 'root', '');
	}

    /**
     * Сохраняет имя класса
     */
	public function setClassName($className)
	{
		$this->className = $className;
	}

    /**
     * Выполняет запрос
     * @return array <p>Массив</p>
     */
	public function queryDB($sql, $params=[])
	{
		$sth = $this->dbh->prepare($sql);
		$sth->execute($params);

		return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
	}

    /**
     * Выполняет запрос
     * @return boolen TRUE
     */
	public function executeDB($sql, $params=[])
	{
		$sth = $this->dbh->prepare($sql);
		return $sth->execute($params);
	}

	/**
	 * 
	 */
	public function lastInsertById()
	{
		return $this->dbh->lastInsertId();
	}
}