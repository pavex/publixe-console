<?php

	namespace Publixe\Console;
	use Publixe\Console;


/**
 * Console standard file writer.
 *
 * @author	Pavex <pavex@ines.cz>
 */
	class Fileout implements IWriter
	{


/** @param string */
		private $filename;





/**
 * @param string
 */
		public function __construct($filename)
		{
			$this -> filename = $filename;
		}





/**
 * @param string
 * @param int
 */
		public function writeMessage($message, $type)
		{
			$f = fopen($this -> filename, 'a+');
			$s = sprintf("%s\t %s\n", date("Y-m-d H:i:s"), $message);
			fputs($f, $s);
			fclose($f);
		}





	}

?>