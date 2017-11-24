#!/usr/bin/env php
<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE                                               |
// +---------------------------------------------------------------------+
// | Copyright (c) 2017 - Code Inc. SAS - All Rights Reserved.           |
// | Visit https://www.codeinc.fr for more information about licensing.  |
// +---------------------------------------------------------------------+
// | NOTICE:  All information contained herein is, and remains the       |
// | property of Code Inc. SAS. The intellectual and technical concepts  |
// | contained herein are proprietary to Code Inc. SAS are protected by  |
// | trade secret or copyright law. Dissemination of this information or |
// | reproduction of this material  is strictly forbidden unless prior   |
// | written permission is obtained from Code Inc. SAS.                  |
// +---------------------------------------------------------------------+
//
// Author:   Joan Fabrégat <joan@codeinc.fr>
// Date:     24/11/2017
// Time:     16:57
// Project:  mrtg-scripts
//

/*
 * Cheking
 */
if (!isset($argv[1])) {
	die("Error: the network interface is missing as an argument\n");
}
if (preg_match('/^a-z0-9$/ui', $argv[1])) {
	die("Error: the network interface name \"".$argv[1]."\" is invalid\n");
}

/*
 * Reading
 */
function getNetworkInterfaceInfo(string $interface, string $entry):int {
	if (($bytes = file_get_contents('/sys/class/net/'.$interface.'/statistics/'.$entry)) === false) {
		die("Erorr: unable to access \"$entry\" for the interface \"$interface\"");
	}
	return (int)$bytes;
}
$rxStart = getNetworkInterfaceInfo($argv[1], "rx_bytes");
$txStart = getNetworkInterfaceInfo($argv[1], "tx_bytes");
sleep(10);
echo round((getNetworkInterfaceInfo($argv[1], "rx_bytes") - $rxStart) / 10)."\n"
	.round((getNetworkInterfaceInfo($argv[1], "tx_bytes") - $txStart) / 10)."\n";