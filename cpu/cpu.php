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

// Copied from: https://stackoverflow.com/questions/13131003/get-cpu-percent-usage-in-php
$stat1 = file('/proc/stat');
sleep(1);
$stat2 = file('/proc/stat');
$info1 = explode(" ", preg_replace("!cpu +!", "", $stat1[0]));
$info2 = explode(" ", preg_replace("!cpu +!", "", $stat2[0]));
$dif = array();
$dif['user'] = $info2[0] - $info1[0];
$dif['nice'] = $info2[1] - $info1[1];
$dif['sys'] = $info2[2] - $info1[2];
$dif['idle'] = $info2[3] - $info1[3];
$total = array_sum($dif);
$cpu = array();
foreach($dif as $x=>$y) $cpu[$x] = round($y / $total * 100, 1);

echo $cpu['user']."\n";
echo ($cpu['user'] + $cpu['sys'])."\n";