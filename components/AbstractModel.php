<?php

/**
 * 
 * @abstract class AbstractModel
 * 
 */
abstract class AbstractModel
{  
	// имя сущности
	static protected $table;

	// Массив полей и их значений
	protected $data = [];


    /**
     * @param $key
     * @param $value
     */
	public function __set($key, $value)
	{
		$this->data[$key] = $value;
	}


    /**
     * @param $key
     */
	public function __get($key)
	{
		$this->data[$key];
	}


    /**
     * Задает возможность проверки данных,
     * полученных через __set()
     * @param $key
     * @return boolean
     */
	public function __isset($key)
	{
		return isset($this->data[$key]);
	}


	/** 
	 * @static Выборка множества записей
     * @return array[object]
	 */
	public static function findAll()
	{
		$db = new DB();
		$db->setClassName( get_called_class() );
		$sql = 'SELECT * FROM ' . static::$table;

		$result =  $db->queryDB($sql);
		if ( !empty($result) ) {
			return $result;
		}
		return false;
	}


	/**
	 * Выборка одной записи по id
     * @param integer $id <p>id записи</p>
     * @return array[object]
	 */
	public static function findOneById($id)
	{
		$db = new DB();
		$db->setClassName( get_called_class() );
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';

		$result = $db->queryDB($sql, [':id' => $id] );
		if ( !empty($result) ) {
			return $result[0];
		}
		return false;
	}


	/**
	 * Выборка одной записи по имени поля
	 * @param mixed $column
	 * @param mixed $value
     * @return array[object]
	 */
	public static function findOneByColumn($column, $value)
	{
		$db = new DB();
		$db->setClassName( get_called_class() );
		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' =:value';
		$result = $db->queryDB($sql, [':value' => $value]);
		print_r($result);die;
		// if (empty($result)) {
		// 	throw new ModelException('Ничего не найдено...');
		// }

		// return $result[0];
	}


	/**
	 * Используется вместо методов insert(), update()
	 */
	public function save()
	{
		if (!isset($this->id)) {
			$this->insert();
		} else {
			$this->update();
		}
	}


	/**
	 * @todo реализовать проверку вывода
	 */
	public function insert()
	{
		$values = [];
		foreach ($this->data as $key => $val) {
			$values[':' .  $key] = $val;
		}

		$values_str = implode(', ', array_keys($values));
		$keys_str = implode(', ', array_keys($this->data));

		$sql = 'INSERT INTO ' . static::$table . '(' . $keys_str . ') 
				VALUES (' . $values_str . ')';

		$db = new DB();
		$result = $db->executeDB($sql, $values);

		// Получим id, созданной записи
			$this->id = $db->lastInsertById();
	}


	/**
	 * 
	 */
	protected function update()
	{
		$cols = [];
		$data = [];

		foreach ($this->data as $key => $value) {
			$data[':' . $key] = $value;
			if ('id' == $key) {
				continue;
			}
			$cols[] = $key . '= :' . $key;
		}

		$data[':id'] = $this->id;
		$sql = 'UPDATE ' . static::$table 
				. ' SET ' . implode(', ', $cols) 
				. ' WHERE id = :id';

		$db = new DB();
		$result = $db->executeDB($sql, $data);
	}


	/**
	 * 
	 */
	protected function delete()
	{
		$db = new DB();

		$sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
		$result = $db->executeDB($sql, [':id' => $this->id]);
	}

	/**
	 * @todo Задание свойств объектам
	 */
	public function fill($data = [])
	{

	}
}