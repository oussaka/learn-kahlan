# learn-kahlan

[![Build Status](https://travis-ci.org/sitrunlab/learn-kahlan.svg?branch=master)](https://travis-ci.org/sitrunlab/learn-kahlan)
[![Coverage Status](https://coveralls.io/repos/github/sitrunlab/learn-kahlan/badge.svg?branch=master)](https://coveralls.io/github/sitrunlab/learn-kahlan?branch=master)

Consume
-------

```bash
$ git clone https://github.com/sitrunlab/learn-kahlan.git
$ cd learn-kahlan
$ composer install
$ bin/kahlan --coverage=4
```

You will get the following output:

![run kahlan](asset/run-kahlan-command.png)

Get Html Report
---------------
```
$ npm install -g istanbul
$ ./bin/kahlan --istanbul="coverage.json"
$ istanbul report
```

or

```
$ brew install lcov
$ mkdir lcov
$ ./bin/kahlan --lcov="lcov/coverage.info"
$ cd lcov
$ genhtml coverage.info
```
