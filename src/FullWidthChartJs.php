<?php
namespace app\widgets;

use dosamigos\chartjs\ChartJs;
use yii\helpers\Html;

class FullWidthChartJs extends ChartJs
{
	protected function registerClientScript()
	{
		// Remove width value, will be overwritten anyways
		unset($this->options['width']);
		$canvas_id = $this->options['id'];

		// Create the js to figure out the width of the canvas parent and
		// set it as the canvas width before rendering the chart
		$js = <<<JS
(function () {
	var canvasWidth = $("#{$canvas_id}").parent().width();
	document.getElementById("{$canvas_id}").width = canvasWidth;
})();
JS;

		$this->view->registerJs($js);

		parent::registerClientScript();
	}
}