ChartJs Widget
==============

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-chartjs-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-chartjs-widget/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-chartjs-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-chartjs-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-chartjs-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-chartjs-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-chartjs-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-chartjs-widget)
[![Total Downloads](https://img.shields.io/packagist/dt/2amigos/yii2-chartjs-widget.svg?style=flat-square)](https://packagist.org/packages/2amigos/yii2-chartjs-widget)

Renders a [ChartJs plugin](http://www.chartjs.org/docs/) widget

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/). This requires the 
composer-asset-plugin, which is also a dependency for yii2 – so if you have yii2 installed, you are most likely already 
set.


Either run

```
composer require 2amigos/yii2-chartjs-widget:~2.0
```
or add

```json
"2amigos/yii2-chartjs-widget" : "~2.0"
```

to the require section of your application's `composer.json` file.

Usage
-----
The following types are supported: 

- Line 
- Bar 
- Radar 
- Polar 
- Pie 
- Doughnut

The following example is using the `Line` type of chart. Please, check [ChartJs plugin](http://www.chartjs.org/docs/) 
documentation for the different types supported by the plugin.

```
use dosamigos\chartjs\ChartJs;

<?= ChartJs::widget([
    'type' => 'Line',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'fillColor' => "rgba(220,220,220,0.5)",
                'strokeColor' => "rgba(220,220,220,1)",
                'pointColor' => "rgba(220,220,220,1)",
                'pointStrokeColor' => "#fff",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'fillColor' => "rgba(151,187,205,0.5)",
                'strokeColor' => "rgba(151,187,205,1)",
                'pointColor' => "rgba(151,187,205,1)",
                'pointStrokeColor' => "#fff",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>
```

Further Information
-------------------
ChartJs has lots of configuration options. For further information, please check the
[ChartJs plugin](http://www.chartjs.org/docs/) website.

Contributing
------------

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

Credits
-------

- [Antonio Ramirez](https://github.com/tonydspaniard)
- [All Contributors](../../contributors)

License
-------

The BSD License (BSD). Please see [License File](LICENSE.md) for more information.

> [![2amigOS!](http://www.gravatar.com/avatar/55363394d72945ff7ed312556ec041e0.png)](http://www.2amigos.us)  
<i>Web development has never been so fun!</i>  
[www.2amigos.us](http://www.2amigos.us)
