<?php

/**
 * 
 * Шаблонизатор
 */

class View
{
	protected $data = [];

	/**
	 * Назначает имя и значение (передача данных объекту)
	 */
	public function assign($name, $value)
	{
		$this->data[$name] = $value;
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