<?php

/**
 * 
 * Шаблонизатор
 */

class View
{
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
	 * Подключаем шаблон
	 */
	public function display($template)
	{
		// Преобразуем: $this->data['items'] в $items
		foreach ($this->data as $key => $val) {
			$$key = $val; 
		}

		require_once ROOT . '/views/' . $template;
	}
}