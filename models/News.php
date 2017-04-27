<?php

namespace Application\Models;

use Application\Components\AbstractModel;

/**
 * Class NewsModel
 */
class News extends AbstractModel
{

	protected static $table = 'news';
	
	public $id;
	public $title;
	public $content;
}
