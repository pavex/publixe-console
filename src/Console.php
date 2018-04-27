<?php

	namespace Publixe;
	use Publixe\Container;


/**
 * Console controller.
 *
 * @author	Pavex
 */
	class Console
	{


// Abstract writer
		const ABSTRACT_WRITER_CLASSNAME = 'Publixe\Console\AbstractWriter';

// Message types
		const MESSAGE_TYPE_LOG = 1;
		const MESSAGE_TYPE_INFO = 2;
		const MESSAGE_TYPE_NOTICE = 2;
		const MESSAGE_TYPE_WARNING = 3;
		const MESSAGE_TYPE_ERROR = 4;


/**
 * @var array
 */
		private static $message_type_pattern = [
			self::MESSAGE_TYPE_LOG => "%s\n",
			self::MESSAGE_TYPE_INFO => "%s\n",
			self::MESSAGE_TYPE_NOTICE => "Notice: %s\n",
			self::MESSAGE_TYPE_WARNING => "Warning: %s\n",
			self::MESSAGE_TYPE_ERROR => "Error: %s\n"
		];

/** @var array */
		private static $writers = [];





/**
 * @param string
 */
		public static function addWriter($name)
		{
			$container = Container::getContainer();
			if ($container -> has($name, self::ABSTRACT_WRITER_CLASSNAME)) {
				self::$writers[] = $container -> get($name);
			}
		}





/**
 * @return boolean
 */
		public static function hasWriter()
		{
			return !empty(self::$writter);
		}





/**
 * @param string
 * @param int  Message type
 */
		private static function writeMessage($message, $type)
		{
			foreach (self::$writers as $writer) {
				$writer -> writeMessage($message, $type);
			}
		}





/**
 * @param string
 */
		public static function log($message)
		{
			self::writeMessage($message, self::MESSAGE_TYPE_LOG);
		}





/**
 * @param string
 */
		public static function info($message)
		{
			self::writeMessage($message, self::MESSAGE_TYPE_INFO);
		}





/**
 * @param string
 */
		public static function notice($message)
		{
			self::writeMessage($message, self::MESSAGE_TYPE_NOTICE);
		}





/**
 * @param string
 */
		public static function warning($message)
		{
			self::writeMessage($message, self::MESSAGE_TYPE_WARNING);
		}





/**
 * @param string
 */
		public static function error($message)
		{
			self::writeMessage($message, self::MESSAGE_TYPE_ERROR);
		}





/**
 * Print message into CLI only
 * @param string
 */
		public static function cli($message, $type = self::MESSAGE_TYPE_LOG)
		{
			if (php_sapi_name() == "cli") {
				printf(self::$message_type_pattern[$type], $message);
			}
		}





	}

?>