<?php
	/**
	 * DoughnutChart
	 * Like PieChart but is a doughnut (or donut).
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class DoughnutChart extends PieChart {

		public function __toJS($canvasID = null, $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT, $type = 'Doughnut') {
			return parent::__toJS($canvasID, $responsive, $width, $height, $type);
		}
	}
?>