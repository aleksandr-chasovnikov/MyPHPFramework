<?php

/**
 * 
 * Шаблонизатор
 */

class View
{
	protected $data = [];
	const PATH = __DIR__ . '/../views/';

	// Назначает имя и значение (передача данных объекту)
	public function assign($name, $value)
	{
		$this->data[$name] = $value;
	}

	// Подключает шаблон
	public function display($template)
	{
		// Преобразуем: $this->data['items'] ==> $items
		foreach ($this->data as $key => $val) {
			$$key = $val; // $items = $val;
		}

		include PATH . $template;
	}
}


class View
{
	protected $data = [];

	// Подключает шаблон
	public function display($name, $value, $template)
	{
		$this->data[$name] = $value;

		// Преобразуем: $this->data['$name'] ==> $name
		foreach ($this->data as $key => $val) {
			$key = $val; // $name = $val;
		}

		include ROOT . '/views/' . $template;
	}
}