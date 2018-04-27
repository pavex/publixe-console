<?php

	namespace Publixe\Console;

	
/**
 * Publixe console writer interface
 *
 * @author	Pavex
 */
	interface IWriter
	{

/**
 * @param array
 */
		public function __construct(array $config = []);


/**
 * @param string
 * @param int
 * @param mixed|NULL
 */
		public function writeMessage($message, $type);

	}