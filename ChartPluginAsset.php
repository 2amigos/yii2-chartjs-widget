<?php
/**
 * @link https://github.com/2amigos/yii2-selectize-widget
 * @copyright Copyright (c) 2013 2amigOS! Consulting Group LLC
 * @license http://opensource.org/licenses/BSD-3-Clause
 */
namespace dosamigos\chartjs;

use yii\web\AssetBundle;

/**
 * 
 * ChartPluginAsset.php
 *
 * @author Antonio Ramirez <amigo.cobos@gmail.com>
 * @link http://www.ramirezcobos.com/
 * @link http://www.2amigos.us/
 */
class ChartPluginAsset extends AssetBundle
{
	public $sourcePath = '@vendor/2amigos/yii2-chartjs-widget/assets';

	public function init()
	{
		$this->js = YII_DEBUG ? ['js/Chart.js'] : ['js/Chart.min.js'];
	}
}