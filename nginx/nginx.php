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
	die("Error: the NGinx status URL is missing as an argument");
}
if (!filter_var($argv[1], FILTER_VALIDATE_URL)) {
	die("Error: the NGinx status URL is invalid");
}

/*
 * Reading
 */
if (($status = file_get_contents($argv[1])) === false) {
	die("Error: unable to read the Nginx status from: ".$argv[1]."\n");
}

/*
 * Parsing
 */
if (preg_match("/Active connections:\\s+([0-9]+)/ui", $status, $matches)) {
	echo $matches[1]."\n";
}
else {
	die("Error: unable to parse the Nginx status\n");
}