<?php

namespace  App\LogFormatter;

class FileAdapter extends Logger
{
	protected $filename;
	public function __construct($filename)
	{
		$this->filename = $filename;
	}
	
	/**
	 *
	 * logging text to file
	 * {@inheritDoc}
	 * @see \App\LogFormatter\Logger::logInternal()
	 */
	public function logInternal(string $message)
	{
		file_put_contents($this->filename, $message);
	}
}