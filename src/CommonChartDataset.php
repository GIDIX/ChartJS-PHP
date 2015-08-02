<?php
	/**
	 * CommonChartDataset
	 * A dataset for all charts of type CommonChart.
	 * {@see CommonChart}
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class CommonChartDataset {
		protected $label;
		protected $data;
		protected $theme;

		public function __construct($label, array $data = [], CommonChartTheme $theme = null) {
			$this->label = $label;
			$this->theme = $theme;
			$this->data = $data;

			if ($theme == null) {
				$this->theme = CommonChartTheme::createDefault();
			}
		}

		public function setTheme(CommonChartTheme $t) {
			$this->theme = $t;
		}

		public function setLabel($l) {
			$this->label = $l;
		}

		public function __toArray() {
			return array_merge([
				'label'			=>	$this->label,
				'data'			=>	$this->data
			], $this->theme->__toArray());
		}
	}
?>