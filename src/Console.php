<?php

	namespace Publixe;
	use Publixe\Console\IWriter;
	use Publixe\Console\Stdout;
	use Publixe\Console\Fileout;


/**
 * Console controller.
 *
 * @author	Pavex <pavex@ines.cz>
 */
	class Console
	{

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

/** @var Array<Publixe\Console\IWriter>*/
		private static $writers = [];





/**
 * Attach writer service
 * @param Publixe\Console\IWriter
 */
		public static function attachWriter(IWriter $writer)
		{
			self::$writers[] = $writer;
		}





/**
 * Enable stdout
 * @param string
 */
		public static function enable()
		{
			$writer = new Stdout();
			self::attachWriter($writer);
		}





/**
 * Set console output into specific file
 * @param string
 */
		public static function setFilename($filename)
		{
			$writer = new Fileout($filename);
			self::attachWriter($writer);
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