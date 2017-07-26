<?php

/*
 * This file is part of the 2amigos/yii2-chartjs-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests\overrides;

use dosamigos\chartjs\ChartJs;
use dosamigos\chartjs\ChartJsAsset;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\web\View;

class TestChartJs extends ChartJs
{
    public function registerClientScript()
    {
        $id = $this->options['id'];
        $view = $this->getView();
        ChartJsAsset::register($view);

        $config = Json::encode(
            [
                'type' => $this->type,
                'data' => $this->data ?: new JsExpression('{}'),
                'options' => $this->clientOptions ?: new JsExpression('{}')
            ]
        );

        $js = ";var chartJS_{$id} = new Chart($('#{$id}'),{$config});";
        $view->registerJs($js, View::POS_READY, 'test-chartjs-js');
    }
}
