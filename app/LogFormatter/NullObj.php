<?php

namespace app\LogFormatter;

class NullObj implements FormatterInterface
{
	public function format($message){
		
		return $message;
		
	}
}