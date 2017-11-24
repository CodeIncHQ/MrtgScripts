# Nginx monitoring script

The NGinx status URL must be passed to the script as the first argument :
`nginx.php 'http://127.0.0.1/nginx_status'`

The status is read via an HTTP query to a [Nginx status page](http://nginx.org/en/docs/http/ngx_http_stub_status_module.html).

## MRTG Configuration
```
#---------Nginx-------------------
Target[nginx]: `/etc/mrtg/nginx.php 'http://127.0.0.1/nginx_status'`
Options[nginx]: nopercent,growright,gauge,noinfo,nobanner
MaxBytes[nginx]: 10000000
YLegend[nginx]: Active connections
ShortLegend[nginx]: Active connections
Legend1[nginx]: Active connections
LegendI[nginx]: Active connections:
Title[nginx]: Nginx
PageTop[nginx]: <h1>Nginx</h1>
WithPeak[nginx]:wmy
Legend3[nginx]: Max active connections
#--------end Nginx-----------------------------
```

## Nginx configuration

```
server {
	listen 127.0.0.1:80;
	location /nginx_status {
		stub_status on;
		allow 127.0.0.1;
		deny all;
	}
}
```