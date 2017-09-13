<?php

if (file_exists(dirname(__FILE__) . '/SSI.php') && !defined('SMF'))
	require_once(dirname(__FILE__) . '/SSI.php');
elseif (!defined('SMF'))
	exit('<b>Error:</b> Cannot install - please verify you put this in the same place as SMF\'s index.php.');

$hooks = array(
  'integrate_pre_include' => '$sourcedir/PastebinViewer.php'
);

$call = (!empty($context['uninstalling'])) ? 'remove_integration_function' : 'add_integration_function';

foreach ($hooks as $hook => $function)
	$call($hook, $function);
