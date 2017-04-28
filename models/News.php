<?php

namespace Application\Models;

use Application\Components\AbstractModel;

/**
 * Class NewsModel
 */
class News extends AbstractModel
{

	protected static $table = 'news';
	
	/**
	 * @var integer
	 */
	public $id;
	
	/**
	 * @var string
	 */
	public $title;
	
	/**
	 * @var string
	 */
	public $content;

	public function __construct($id = false, $title = false, $content = false)
	{
		$this->data['id'] = $id;
		$this->data['title'] = $title;
		$this->data['content'] = $content;
	}

}
