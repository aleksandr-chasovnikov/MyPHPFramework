<?php

/**
 * Class NewsModel
 */
class NewsModel extends AbstractModel
{

	protected static $table = 'news';
	
	public $id;
	public $title;
	public $content;
}
