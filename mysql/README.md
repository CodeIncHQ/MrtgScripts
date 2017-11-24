# MySQL / MariaDB monitoring script

The script is using [`PDO`](http://php.net/manual/fr/book.pdo.php) to monitor a MySQL or a MarieDB server. Two script are defined to monitor queries and bandwidth. Both the two scripts can take two optionnal arguments: a username and a password. 

## MRTG Configuration for queries monitoring
```
#----------------MySQL queries---------------
Target[mysql_queries]: `/etc/mrtg/mysql-queries.php user password`
Options[mysql_queries]: perminute,nopercent,integer,growright
MaxBytes[mysql_queries]: 200
AbsMax[mysql_queries]: 100000
Unscaled[mysql_queries]: dwmy
Title[mysql_queries]: MySQL queries
PageTop[mysql_queries]: <H1>MySQL queries</H1>
YLegend[mysql_queries]: # of queries per sec.
ShortLegend[mysql_queries]: q/s
Legend1[mysql_queries]: Queries per sec.
Legend2[mysql_queries]: Slow queries per sec.
Legend3[mysql_queries]: Max queries per sec.
Legend4[mysql_queries]: Max slow queries per sec.
LegendI[mysql_queries]: Queries per sec.:
LegendO[mysql_queries]: Slow queries per sec.:
#----------------end MySQL---------------
```

## MRTG Configuration for bandwidth monitoring
```
#----------------MySQL bandwidth---------------
Target[mysql_queries]: `/etc/mrtg/mysql-bandwidth.php user password`
Options[mysql_bandwidth]: perminute,nopercent,integer,growright
MaxBytes[mysql_bandwidth]: 200
AbsMax[mysql_bandwidth]: 100000
Unscaled[mysql_bandwidth]: dwmy
Title[mysql_bandwidth]: MySQL bandwidth
PageTop[mysql_bandwidth]: <H1>MySQL bandwidth</H1>
kilo[mysql_bandwidth]: 1024
YLegend[mysql_bandwidth]: Bytes per second
ShortLegend[mysql_bandwidth]: B/s
Legend1[mysql_bandwidth]: RX bytes per sec.
Legend2[mysql_bandwidth]: TX bytes per sec.
Legend3[mysql_bandwidth]: Max RX bytes per sec.
Legend4[mysql_bandwidth]: Max TX bytes per sec.
LegendI[mysql_bandwidth]: TX bytes:
LegendO[mysql_bandwidth]: RX bytes:
#----------------end MySQL---------------
```