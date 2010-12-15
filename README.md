Blue Elephant
=============
 Blue Elephant aims to be a simple no *BS* straight forward MVC like web
framework. Emphasis on _MVC like_ as we purposefully omit the M in MVC from
this framework to get out of the way of developers.

How's  performance?
------------------
 Blue Elephant is designed to be used by high performance web servers
leveraging FastCGI (typically via php-fpm) to scale extremely well. Everything
is 'lazily loaded' by default, meaning classes are not loaded until the	very
last minute they're needed and only what is used will be loaded. The
framework also has a very lightweight foot print, which is critical for
speed and memory overhead in most scripting languages. These three simple
principals combined make up a vicious recipe for creating high performance
php web	applications.

Benchmarks are available here: [benchmark](https://github.com/JosephMoniz/BlueElephant/blob/master/docs/benchmark.md "Benchmark")

NOTE: that bench mark was compiled using the phpmark kit available here: [phpmark](http://code.google.com/p/phpmark/ "phpmark")

Why no model system?
--------------------
 We're not against model systems. We find them outstanding for niche purposes.
However, we find them annoying and counterproductive when used as blanket
paradigms. So instead we simply leave it up to the end developer whether to use
models are not and how to go about it.
