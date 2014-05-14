<?php namespace Craft;

/**
 * Datalist by John D Wells
 *
 * @author     	John D Wells <http://johndwells.com>
 * @package    	Datalist
 * @since		Craft 2.0
 * @copyright 	Copyright (c) 2014, John D Wells
 * @license 	http://opensource.org/licenses/mit-license.php MIT License
 * @link       	https://github.com/johndwells/craft.datalist
 */

/**
 * 
 */
class DatalistPlugin extends BasePlugin
{

	/**
	 * @return String
	 */
	public function getName()
	{
		return 'Datalist';
	}

	/**
	 * @return String
	 */
	public function getVersion()
	{
		return '0.0.1';
	}

	/**
	 * @return String
	 */
	public function getDeveloper()
	{
		return 'John D Wells';
	}

	/**
	 * @return String
	 */
	public function getDeveloperUrl()
	{
		return 'http://johndwells.com';
	}

	/**
	 * @return Bool
	 */
	public function hasCpSection()
	{
		return false;
	}

	/**
	 * Logging any messages to Craft.
	 * 
	 * @param String $msg
	 * @param String $level
	 * @param Bool $force
	 * @return Void
	 */
	public static function log($msg, $level = LogLevel::Info, $force = false)
	{
		if(version_compare('2.0', craft()->getVersion(), '<'))
		{
			Craft::log($msg, $level, $force);
		}
		else
		{
			parent::log($msg, $level, $force);
		}
	}
}