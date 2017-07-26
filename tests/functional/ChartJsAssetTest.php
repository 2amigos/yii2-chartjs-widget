<?php

/*
 * This file is part of the 2amigos/yii2-chartjs-widget project.
 * (c) 2amigOS! <http://2amigos.us/>
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace tests;

use dosamigos\chartjs\ChartJsAsset;
use yii\web\AssetBundle;

class ChartAssetTest extends TestCase
{
    public function testRegister()
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        ChartJsAsset::register($view);
        $this->assertEquals(2, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['dosamigos\\chartjs\\ChartJsAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/views/rawlayout.php');
        $this->assertContains('Chart.js', $content);
    }
}
