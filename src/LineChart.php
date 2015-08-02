<?php
	/**
	 * LineChart
	 * A chart that shows progress over time.
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class LineChart extends CommonChart {

		public function __toJS($canvasID = null, $responsive = true, $width = 400, $height = 400) {
			return parent::toJS('Line', $canvasID, $responsive, $width, $height);
		}
	}
?>