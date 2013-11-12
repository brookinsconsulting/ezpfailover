<?php
/**
 * File containing the failover module configuration file, module.php
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @copyright Copyright (C) 2013 - 2014 Think Creative. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.1
 * @package ezpfailover
*/

// Define module name
$Module = array('name' => 'Failover Test');

// Define module view and parameters
$ViewList = array();

// Define 'report' module view parameters
$ViewList['test'] = array( 'script' => 'test.php',
                           'functions' => array( 'test' ),
                           'default_navigation_part' => 'ezfailovernavigationpart',
                           'post_actions' => array( 'Download', 'Generate' ),
                           'params' => array() );

// Define function parameters
$FunctionList = array();

// Define function 'test' parameters
$FunctionList['test'] = array();

?>