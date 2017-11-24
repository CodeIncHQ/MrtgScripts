# Network monitoring script

The network interface named must to be passed to the script as the first argument :
`network.php eth0`

## MRTG Configuration
```
#----------------Network ETHO---------------
Target[net_eth0]: `/etc/mrtg/network.php eth0`;
Options[net_eth0]: dorelpercent, growright, nobanner, noinfo, transparent
MaxBytes[net_eth0]: 2000000
AbsMax[net_eth0]: 10000000
kilo[net_eth0]: 1024
YLegend[net_eth0]: Bytes per second
ShortLegend[net_eth0]: B/s
Legend1[net_eth0]: Incoming Traffic in Bytes per second
Legend2[net_eth0]: Outgoing Traffic in Bytes per second
LegendI[net_eth0]: In:
LegendO[net_eth0]: Out:
Title[net_eth0]: Network traffic on eth0
PageTop[net_eth0]: <H1>Network traffic on eth0</H1>
#----------------Network---------------
```