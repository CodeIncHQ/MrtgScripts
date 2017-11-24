#!/usr/bin/env php
<?php
//
// +---------------------------------------------------------------------+
// | CODE INC. SOURCE CODE - CONFIDENTIAL                                |
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
// Time:     18:47
// Project:  mrtg-scripts
//

/*
 * Connecting
 */
$PDO = new PDO("mysql:host=localhost", $argv[1] ?? null, $argv[2] ?? null);
$q = $PDO->prepare("SHOW GLOBAL STATUS LIKE ?;");

/*
 * Counting
 */
$q->execute(['Queries']);
$c0Val = (int)$q->fetchColumn(1);
$q->execute(['Slow_queries']);
$c1Val = (int)$q->fetchColumn(1);

sleep(10);

$q->execute(['Queries']);
echo round(((int)$q->fetchColumn(1) - $c0Val) / 10)."\n";
$q->execute(['Slow_queries']);
echo round(((int)$q->fetchColumn(1) - $c1Val) / 10)."\n";