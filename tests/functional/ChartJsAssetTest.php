<?php

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
        $this->assertEquals(1, count($view->assetBundles));
        $this->assertTrue($view->assetBundles['dosamigos\\chartjs\\ChartJsAsset'] instanceof AssetBundle);
        $content = $view->renderFile('@tests/views/rawlayout.php');
        $this->assertContains('Chart.js', $content);
    }
}