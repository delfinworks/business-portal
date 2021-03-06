<?php
/**
 * @version $Id: kunena.php 4642 2011-03-15 19:13:54Z mahagr $
 * Kunena System Plugin
 * @package Kunena
 *
 * @Copyright (C) 2008 - 2011 www.kunena.org All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

jimport ('joomla.version');

class plgSystemKunena extends JPlugin {

	function __construct(& $subject, $config) {
		// Check if Kunena API exists
		$kunena_api = JPATH_ADMINISTRATOR . '/components/com_kunena/api.php';
		if (! is_file ( $kunena_api ))
			return false;

		jimport ( 'joomla.application.component.helper' );
		// Check if Kunena component is installed/enabled
		if (! JComponentHelper::isEnabled ( 'com_kunena', true )) {
			return false;
		}

		// Load Kunena API
		require_once ($kunena_api);

		// Fix Joomla 1.5 bug
		$version = new JVersion();
		if (JFactory::getApplication()->isAdmin() && $version->RELEASE == '1.5') {
			JFactory::getLanguage()->load('com_kunena.menu', JPATH_ADMINISTRATOR);
		}

		parent::__construct ( $subject, $config );
	}

	/*
	public function onUserAfterSave($user, $isnew, $success, $msg) {
		//Don't continue if the user wasn't stored succesfully
		if (! $success) {
			return false;
		}
		if (! $isnew) {
			return true;
		}
		// Set the db function
		$db = JFactory::getDBO ();
		$db->setQuery ( "INSERT INTO #__kunena_users (userid) VALUES ('" . intval($user ['id']) . "')" );
		$db->query ();
	}
	public function onAfterStoreUser($user, $isnew, $success, $msg) {
		$this->onUserAfterSave($user, $isnew, $success, $msg);
	}
	*/
}
