<?php
	/**
	 * PieChartData
	 * Data for PieChart.
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class PieChartData {
		protected $label;
		protected $value;
		protected $color;
		protected $highlightColor;

		public function __construct($label, $value, $color = '#dcdcdc', $highlightColor = '#aaa') {
			$this->label = $label;
			$this->value = $value;
			$this->color = $color;
			$this->highlightColor = $highlightColor;
		}

		public function getLabel() {
			return $this->label;
		}

		public function getValue() {
			return $this->value;
		}

		public function getColor() {
			return $this->color;
		}

		public function setLabel($l) {
			$this->label = $l;
		}

		public function __toArray() {
			return [
				'label'		=>	$this->label,
				'value'		=>	$this->value,
				'color'		=>	$this->color,
				'highlight'	=>	$this->highlightColor
			];
		}
	}
?>