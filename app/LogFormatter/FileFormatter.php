<?php 

use src\FileFormatterInterface;

class FileFormatter implements FileFormatterInterface
{
	private $format = "[%s][%s] %s";
	
	public function format($message, $type, $timestamp){
		
		sprintf($this->format, date('Y-m-d H:i:s', $timestamp), $type, $message) . PHP_EOL;		
	}
}