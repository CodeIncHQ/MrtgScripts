#!/usr/bin/env php
<?php

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