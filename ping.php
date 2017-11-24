#!/usr/bin/env php
<?php

/*
 * Checking
 */
if (!isset($argv[1])) {
	die("Error: missing server's address as an argument\n");
}

/*
 * Executing
 */
if (($exec = shell_exec('ping  -c3 -q '.escapeshellarg($argv[1]).'|grep avg')) === null) {
	die("Error: unable to ping ".$argv[1]);
}

/*
 * Parsing
 */
if (preg_match('#min/avg/max/stddev\\s+=\\s+([0-9.]+)/([0-9.]+)/[0-9.]+/[0-9.]+#', $exec, $matches)) {
	list(, $min, $max) = $matches;
	echo "$max\n$min\n";
}
else {
	die("Error: unable to parse the ping result\n");
}