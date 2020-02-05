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

class ChartJsAssetTest extends TestCase
{
    public function testRegister(): void
    {
        $view = $this->getView();
        $this->assertEmpty($view->assetBundles);
        ChartJsAsset::register($view);
        $this->assertCount(2, $view->assetBundles);
        $this->assertInstanceOf(AssetBundle::class, $view->assetBundles['dosamigos\\chartjs\\ChartJsAsset']);
        $content = $view->renderFile('@tests/views/rawlayout.php');
        $this->assertStringContainsStringIgnoringCase('Chart.bundle.js', $content);
    }
}
