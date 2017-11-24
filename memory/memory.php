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
 * Executing
 */
if (($exec = shell_exec('free -b')) === null) {
	die("Error: unable to access main memory informations\n");
}

/*
 * Parsing
 */
if (preg_match("/Mem:\\s+\\d+\\s+(\\d+)\\s+(\\d+)\\s+\\d+\\s+\\d+\\s+\\d+/ui", $exec, $matches)) {
	list(, $used, $free) = $matches;
	echo "$used\n$free\n";
}
else {
	die("Error: unable to parse main memory informations\n");
}