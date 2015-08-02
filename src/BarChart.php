<?php
	/**
	 * BarChart
	 * A chart with bars rising up.
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class BarChart extends CommonChart {

		public function __toJS($canvasID = null, $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT) {
			return parent::toJS('Bar', $canvasID, $responsive, $width, $height);
		}
	}
?>