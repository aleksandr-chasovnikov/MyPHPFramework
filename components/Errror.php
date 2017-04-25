<?php

class Error
{
	public function setError($message)
	{
		$_SESSION['error'] = (string)$message;
	}

	public function getError()
	{
		if(!empty($_SESSION['error'])) {
			$msg = $_SESSION['error'];
			unset($_SESSION['error']);
			return $msg;
		}
		return false;
	}
}