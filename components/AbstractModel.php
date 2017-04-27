<?php

namespace Application\Components;

/** 
 * @abstract class AbstractModel 
 */
abstract class AbstractModel
{
	static protected $table;

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
		$db = new \DB();
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
		$db = new \DB();
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
		$db = new \DB();
		$db->setClassName( get_called_class() );

		$sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . ' =:value';

		$result = $db->queryDB($sql, [':value' => $value]);

		return $result[0];
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
	protected function insert()
	{
		$values = [];

		foreach ($this->data as $key => $val) {
			$values[':' .  $key] = $val;
		}

		$values_str = implode(', ', array_keys($values));
		$keys_str = implode(', ', array_keys($this->data));

		$sql = 'INSERT INTO ' . static::$table . '(' . $keys_str . ') 
				VALUES (' . $values_str . ')';

		$db = new \DB();
		$result = $db->executeDB($sql, $values);
		$this->id = $db->lastInsertById();
	}


	/**
	 * Метод редактирования записей
	 * @param array
	 */
	protected function update()
	{
		$keys = [];
		$value = [];

		foreach ($this->data as $k => $v) {
			$value[':' . $k] = $v;

			if ('id' == $k) {
				continue;
			}
			$keys[] = $k . '=:' . $k;
		}

		// $value[':id'] = $this->id;
		$sql = 'UPDATE ' . static::$table 
				. ' SET ' . implode(', ', $keys) 
				. ' WHERE id = :id';

		$db = new \DB();
		$result = $db->executeDB($sql, $value);
	}


	/**
	 * Метод удаления записей
	 */
	protected function delete()
	{
		$db = new \DB();

		$sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
		$result = $db->executeDB($sql, [':id' => $this->id]);
	}
}