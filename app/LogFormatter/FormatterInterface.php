<?php

namespace App\LogFormatter;

interface FormatterInterface
{
	public function format($message);
}