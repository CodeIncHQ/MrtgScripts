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
if (($exec = shell_exec("top -b -n 1")) === null) {
	die("Error: unable to execute \"top\"\n");
}

/*
 * Parsing
 */
if (preg_match("/Cpu\\(s\\):\\s+([0-9.]+) us,\\s+([0-9.]+) sy/ui", $exec, $matches)) {
	list(, $user, $system) = $matches;
}
else {
	die("Error: unable to parse the CPU infos\n");
}


echo $user."\n";
echo ($user + $system)."\n";