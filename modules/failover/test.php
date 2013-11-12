<?php
/**
 * File containing the failover/test module view.
 *
 * @copyright Copyright (C) 1999 - 2014 Brookins Consulting. All rights reserved.
 * @copyright Copyright (C) 2013 - 2014 Think Creative. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2 (or later)
 * @version 0.0.1
 * @package ezpfailover
 */

/**
 * Default module parameters
 */
$module = $Params["Module"];

/**
 * Default ini variables
 */

// Access ini variables
$ini = eZINI::instance();
$iniFailover = eZINI::instance( 'ezpfailover.ini' );

// Failover ip addresses variables
$productionIPAddresses = $iniFailover->variable( 'eZpFailover', 'ProductionIPAddresses' );

/**
 * Test for production server usage
 */
$ipAddressTest = 0;

foreach( $productionIPAddresses as $ip )
{
    // echo $ip .'<hr />';
    if ( $ip != $_SERVER['SERVER_ADDR'] )
    {
        $ipAddressTest = 1;
    }
    elseif ( $ip == $_SERVER['SERVER_ADDR'] )
    {
        $ipAddressTest = 0;
    }
}

/**
 * Test for admin user usage
 */
$currentUser = eZUser::currentUser();
$currentUserGroups = $currentUser->groups();

$userAdminTest = 0;

foreach( $currentUserGroups as $group )
{
    // echo $group .'<hr />';
    if ( $group != 4 )
    {
        $userAdminTest = 0;
    }
    elseif ( $group == 4 )
    {
        $userAdminTest = 1;
    }
}

/**
 * Test for failover conditions
 */
if ( $ipAddressTest == 1 && $userAdminTest == 1 )
{
    $testResult = 1;
}
else
{
    $testResult = 0;
}

/**
 * Default template include
 */

// run template and return result
$Result = array();
$Result['content'] = $testResult;
$Result['path'] = '';
$Result['pagelayout'] = '';
return $Result;

?>