# Preset 1

This preset uses 1000 concurrent users request, each user requested maximum of 2 on `http://localhost/api/` and `http://localhost/api/test` for a simulated interval of 20 seconds.

Here is my benchmarking command :

```
hey -c 1000 -q 2 -z 20s http://localhost/api/ http://localhost/api/test
```

## Startup Commands

> Note: Please change your current directory to `/path/to/this-repo` before running the load test.

### Nginx + PHP Native

Using 1 main and 2 worker process of Nginx webserver, and 2 process of PHP Native :

##### powershell
```powershell
start "" nginx -c "%cd%/server/nginx.conf" -p "%cd%/server" -g "daemon off;" &
cd src/backend-native &
start "" php -S 127.0.0.1:8080 index.php > nul 2>&1 &
start "" php -S 127.0.0.1:8081 index.php > nul 2>&1

```

##### bash
```bash
nginx -c "$PWD/server/nginx.conf" -p "$PWD/server" -g "daemon off;" &
cd src/backend-native
php -S 127.0.0.1:8080 index.php > /dev/null 2>&1 &
php -S 127.0.0.1:8081 index.php > /dev/null 2>&1
```

### Nginx + ReactPHP

Using 1 main and 2 worker process of Nginx webserver, and 2 process of ReactPHP :

##### powershell
```powershell
start "" nginx -c "%cd%/server/nginx.conf" -p "%cd%/server" -g "daemon off;" &
cd src/backend &
start "" php index.php 8080 &
start "" php index.php 8081

```

##### bash
```bash
nginx -c "$PWD/server/nginx.conf" -p "$PWD/server" -g "daemon off;" &
cd src/backend
php index.php 8080 &
php index.php 8081
```

### NodeJS + ExpressJS

Using NodeJS runtime and ExpressJS library :

##### powershell
```powershell
cd src/backend-nodejs &
npm install &
start "" node server.js

```

##### bash
```bash
cd src/backend-nodejs
npm install & node server.js
```