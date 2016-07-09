<?php
namespace tests;

use Yii;
use dosamigos\chartjs\ChartJs;
use tests\overrides\TestChartJs;
use yii\web\View;

class ChartJsTest extends TestCase
{
    protected $config = [];

    public function setUp()
    {
        parent::setUp();
        $this->config = [
            'id' => 'test_chartjs',
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
        ];
    }

    public function testRenderContainer()
    {
        $out = ChartJs::widget($this->config);
        $expected = '<canvas id="test_chartjs" width="400" height="400"></canvas>';
        $this->assertEqualsWithoutLE($expected, $out);
    }

    public function testTypeException() {
        $this->setExpectedException('yii\base\InvalidConfigException');
        $config = $this->config;
        unset($config['type']);
        ChartJs::begin($config);
    }


    public function testRegisterClientScript()
    {
        $class = new \ReflectionClass('tests\\overrides\\TestChartJs');
        $method = $class->getMethod('registerClientScript');
        $method->setAccessible(true);

        $widget = TestChartJs::begin($this->config);
        $view = $this->getView();
        $widget->setView($view);
        $method->invoke($widget);

        $test = <<<JS
;var chartJS_test_chartjs = new Chart($('#test_chartjs'),{"type":"Line","data":{"labels":["January","February","March","April","May","June","July"],"datasets":[{"fillColor":"rgba(220,220,220,0.5)","strokeColor":"rgba(220,220,220,1)","pointColor":"rgba(220,220,220,1)","pointStrokeColor":"#fff","data":[65,59,90,81,56,55,40]},{"fillColor":"rgba(151,187,205,0.5)","strokeColor":"rgba(151,187,205,1)","pointColor":"rgba(151,187,205,1)","pointStrokeColor":"#fff","data":[28,48,40,19,96,27,100]}]},"options":{}});
JS;
        $this->assertEquals($test, $view->js[View::POS_READY]['test-chartjs-js']);
    }
}
