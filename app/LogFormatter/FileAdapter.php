<?php

namespace  app\LogFormatter;

use src\Logger;

class FileAdapter extends Logger
{
	protected $filename;
	public function __construct($filename){
		
		$this->filename = $filename;
		
	}
	
	public function logInternal($message){
		
		file_put_contents($this->filename, $message);
		
	}
}