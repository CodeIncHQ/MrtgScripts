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
 * Checking
 */
if (!isset($argv[1])) {
	die("Error: the host name to ping is required as the first argument\n");
}

/*
 * Executing
 */
if (($exec = shell_exec('ping -c3 -q '.escapeshellarg($argv[1]).'|grep avg')) === null) {
	die("Error: unable to ping ".$argv[1]);
}

/*
 * Parsing
 */
if (preg_match('#min/avg/.+\\s+=\\s+([0-9.]+)/([0-9.]+)/.+#', $exec, $matches)) {
	list(, $min, $max) = $matches;
	echo "$max\n$min\n";
}
else {
	die("Error: unable to parse the ping result\n");
}