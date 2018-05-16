<?php

	namespace Publixe\Console;


/**
 * Publixe console writer interface
 *
 * @author	Pavex <pavex@ines.cz>
 */
	interface IWriter
	{

/**
 * @param string
 * @param int
 */
		public function writeMessage($message, $type);

	}