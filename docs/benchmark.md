Benchmark
========

Average Requests per Second
===========================

![apache](http://chart.apis.google.com/chart?chxl=0:|BlueElephant|CakePHP|CodeIgniter|Symfony|Yii|Zend&chxr=0,0,6|1,0,2000&chxt=x,y&chbh=24,1,42&chs=760x300&cht=bvg&chco=000000,4D89F9&chd=s:VBGCED,qFeGYP&chdl=without+APC|With+APC&chma=|0,5&chtt=PHP+Framework+Benchmark+W/+Apache)
![nginx](http://chart.apis.google.com/chart?chxl=0:|BlueElephant|CakePHP|CodeIgniter|Symfony|Yii|Zend&chxr=0,0,6|1,0,2000&chxt=x,y&chbh=24,1,42&chs=760x300&cht=bvg&chco=000000,4D89F9&chd=s:TBGBFE,vHhKdR&chdl=Without+APC|With+APC&chtt=PHP+Framework+Benchmark+W%2F+Nginx)

The Raw Results
===============

Apache Without APC
==================

Run #1
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    679.03 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    37.64 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    198.46 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    44.08 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    138.13 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    144.13 [#/sec] (mean)

Run #2
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    631.20 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    37.33 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    198.03 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    78.86 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    138.91 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    81.11 [#/sec] (mean)

Run #3
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    729.09 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    37.59 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    192.23 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    44.64 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    140.25 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    81.79 [#/sec] (mean)


Apache With APC
===============

Run #1
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    1338.74 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    139.07 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    965.02 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    181.72 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    791.61 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    537.56 [#/sec] (mean)


Run #2
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    1461.63 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    219.50 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    968.15 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    186.31 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    799.53 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    465.39 [#/sec] (mean)

Run #3
------

    Document Path:          /phpmark/blueelephant/
    Requests per second:    1370.70 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    125.57 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    1021.56 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    185.39 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    788.77 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    473.31 [#/sec] (mean)


Nginx with PHP-FPM without APC
==============================

Run #1
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    615.85 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    39.56 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    210.97 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    41.83 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    147.88 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    145.03 [#/sec] (mean)

Run #2
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    611.15 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    76.59 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    202.46 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    41.73 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    147.64 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    81.69 [#/sec] (mean)

Run #3
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    615.27 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    39.70 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    208.89 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    42.60 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    194.76 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    144.34 [#/sec] (mean)


Nginx with PHP-FPM with APC
===========================

Run #1
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    1485.92 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    234.51 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    1108.16 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    326.80 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    921.83 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    526.70 [#/sec] (mean)

Run #2
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    1631.58 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    233.95 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    1022.64 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    321.26 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    960.97 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    554.75 [#/sec] (mean)

Run #3
------

    Document Path:          /phpmark/blueelephant/sys/dispatcher.php
    Requests per second:    1495.36 [#/sec] (mean)
    Document Path:          /phpmark/cakephp-1.3.4/app/webroot/index.php/benchmark
    Requests per second:    230.05 [#/sec] (mean)
    Document Path:          /phpmark/codeigniter-1.7.2/index.php
    Requests per second:    1157.95 [#/sec] (mean)
    Document Path:          /phpmark/symfony-1.4.8/web/index.php
    Requests per second:    310.59 [#/sec] (mean)
    Document Path:          /phpmark/yii-1.1.4/index.php
    Requests per second:    1013.12 [#/sec] (mean)
    Document Path:          /phpmark/zend-1.10.8/index.php
    Requests per second:    564.28 [#/sec] (mean)


Notes
=====

* Interesting point of contention with Nginx
   + On my first run with Nginx with PHP-FPM and APC i noticed that nginx itself
     was the point of contention, this only happend with the Blue Elephant
     framework which may be evidence that the framework is going faster then 
     nginx can handle. More controls need to be added to see whats really going
     on here. I'm going to look into it imediately.
   + After increasing the number on Nginx worker threads to 4 (1 / core) Nginx
     was no longer acting a the resource intensive process. The results in the
     nginx with php-fpm and apc were obtained with the 4 worker thread
     configuration.
   + I still find it very interesting that this only happened with the
     Elephant framework. One possible solution i can think of is the additional
     IO were doing in the Blue Elephant framework (mostly to show off). I'll run
     an isolated test to see if this is the case.
   + Ok I'm afraid I've fallen down the rabit hole on this one. So i commented
     out the two lines in the Blue Elephant dispatcher that add the layout
     parsing hooks to the system, more or less the same benchmark stats were
     acheived but then Nginx became the CPU intensive process again and this
     would only happen when testing the Blue Elephant framework. Is it
     possible that Blue Elephant is really faster then the web server?
