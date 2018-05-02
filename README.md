ChartJs Widget
==============

[![Latest Version](https://img.shields.io/github/tag/2amigos/yii2-chartjs-widget.svg?style=flat-square&label=release)](https://github.com/2amigos/yii2-chartjs-widget/tags)
[![Software License](https://img.shields.io/badge/license-BSD-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/2amigos/yii2-chartjs-widget/master.svg?style=flat-square)](https://travis-ci.org/2amigos/yii2-chartjs-widget)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/2amigos/yii2-chartjs-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-chartjs-widget/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/2amigos/yii2-chartjs-widget.svg?style=flat-square)](https://scrutinizer-ci.com/g/2amigos/yii2-chartjs-widget)
[![Total Downloads](https://poser.pugx.org/2amigos/yii2-chartjs-widget/downloads)](https://packagist.org/packages/2amigos/yii2-chartjs-widget) 
[![StyleCI](https://styleci.io/repos/16515084/shield?branch=master)](https://styleci.io/repos/16515084)

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
- Bubble 
- Scatter 
- Area 
- Mixed

The following example is using the `Line` type of chart. Please, check [ChartJs plugin](http://www.chartjs.org/docs/) 
documentation for the different types supported by the plugin.

```
use dosamigos\chartjs\ChartJs;

<?= ChartJs::widget([
    'type' => 'line',
    'options' => [
        'height' => 400,
        'width' => 400
    ],
    'data' => [
        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
        'datasets' => [
            [
                'label' => "My First dataset",
                'backgroundColor' => "rgba(179,181,198,0.2)",
                'borderColor' => "rgba(179,181,198,1)",
                'pointBackgroundColor' => "rgba(179,181,198,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(179,181,198,1)",
                'data' => [65, 59, 90, 81, 56, 55, 40]
            ],
            [
                'label' => "My Second dataset",
                'backgroundColor' => "rgba(255,99,132,0.2)",
                'borderColor' => "rgba(255,99,132,1)",
                'pointBackgroundColor' => "rgba(255,99,132,1)",
                'pointBorderColor' => "#fff",
                'pointHoverBackgroundColor' => "#fff",
                'pointHoverBorderColor' => "rgba(255,99,132,1)",
                'data' => [28, 48, 40, 19, 96, 27, 100]
            ]
        ]
    ]
]);
?>
```
Plugins usage example (displaying percentages on the Pie Chart):
```
echo ChartJs::widget([
    'type' => 'pie',
    'id' => 'structurePie',
    'options' => [
        'height' => 200,
        'width' => 400,
    ],
    'data' => [
        'radius' =>  "90%",
        'labels' => ['Label 1', 'Label 2', 'Label 3'], // Your labels
        'datasets' => [
            [
                'data' => ['35.6', '17.5', '46.9'], // Your dataset
                'label' => '',
                'backgroundColor' => [
                        '#ADC3FF',
                        '#FF9A9A',
                    'rgba(190, 124, 145, 0.8)'
                ],
                'borderColor' =>  [
                        '#fff',
                        '#fff',
                        '#fff'
                ],
                'borderWidth' => 1,
                'hoverBorderColor'=>["#999","#999","#999"],                
            ]
        ]
    ],
    'clientOptions' => [
        'legend' => [
            'display' => false,
            'position' => 'bottom',
            'labels' => [
                'fontSize' => 14,
                'fontColor' => "#425062",
            ]
        ],
        'tooltips' => [
            'enabled' => true,
            'intersect' => true
        ],
        'hover' => [
            'mode' => false
        ],
        'maintainAspectRatio' => false,

    ],
    'plugins' =>
        new \yii\web\JsExpression('
        [{
            afterDatasetsDraw: function(chart, easing) {
                var ctx = chart.ctx;
                chart.data.datasets.forEach(function (dataset, i) {
                    var meta = chart.getDatasetMeta(i);
                    if (!meta.hidden) {
                        meta.data.forEach(function(element, index) {
                            // Draw the text in black, with the specified font
                            ctx.fillStyle = 'rgb(0, 0, 0)';

                            var fontSize = 16;
                            var fontStyle = 'normal';
                            var fontFamily = 'Helvetica';
                            ctx.font = Chart.helpers.fontString(fontSize, fontStyle, fontFamily);

                            // Just naively convert to string for now
                            var dataString = dataset.data[index].toString()+'%';

                            // Make sure alignment settings are correct
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'middle';

                            var padding = 5;
                            var position = element.tooltipPosition();
                            ctx.fillText(dataString, position.x, position.y - (fontSize / 2) - padding);
                        });
                    }
                });
            }
        }]')
])
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
> <i>Custom Software | Web & Mobile Software Development</i>  
> [www.2amigos.us](https://2amigos.us)
