<?php

namespace App\LogFormatter;

use Src\NullObj;

abstract class Logger
{
	public function getFormatter(){
	
		if($this->formatter === NULL){
			$this->formatter = new NullObj();
		}
		
		return $this->formatter;
		
	}	
	
	public function setFormatter(FormatterInterface $formatter){
		
		$this->formatter = $formatter;
		
	}
	
	public function log($level, $message){
		
		$this->getFormatter()->format($level, $message, date());
		
		$this->logInternal($log);
	}
	
	protected abstract function logInternal();
	
	
}