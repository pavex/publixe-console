<?php

	namespace Publixe\Console;
	use Publixe\Console;
	use \Exception;


/**
 * Console standard output writer.
 *
 * @author	Pavex
 */
	class Stdout extends AbstractWriter
	{

/** @var Array */
		private static $types = [
			Console::MESSAGE_TYPE_LOG => '',
			Console::MESSAGE_TYPE_INFO => '',
			Console::MESSAGE_TYPE_NOTICE => 'Notice',
			Console::MESSAGE_TYPE_WARNING => 'Warning',
			Console::MESSAGE_TYPE_ERROR => 'Error',
		];





/**
 * @param string Profiler name
 * @param array
 */
		public function __construct(array $config = [])
		{
		}





/**
 * @param string
 * @param int
 */
		public function writeMessage($message, $type)
		{
			$message_type = self::$types[$type];
			printf("Stdout> %s%s\n", $message_type ? sprintf("%s: ", $message_type) : '', $message);
		}





	}

?>