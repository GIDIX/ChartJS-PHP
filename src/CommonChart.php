<?php
	/**
	 * CommonChart
	 * The base class for all charts with datasets:
	 * 		Bar
	 * 		Line
	 * 		Radar
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	abstract class CommonChart extends Chart {
		protected $labels = [];
		protected $options = [];
		protected $datasets = [];

		public function __construct($labels, array $datasets, $options = []) {
			$this->labels = $labels;
			$this->datasets = $datasets;
			$this->options = $options;
		}

		public function addLabel($label) {
			$this->labels[] = $label;
		}

		public function setLabels($labels) {
			$this->labels = $labels;
		}

		public function addDataset(CommonChartDataset $set) {
			$this->datasets[] = $set;
		}

		public function setOptions(array $options) {
			$this->options = $options;
		}

		public function setOption($key, $value) {
			$this->options[$key] = $value;
		}

		public function setScale($min, $max, $step) {
			$this->setOption('scaleOverride', true);
			$this->setOption('scaleStepWidth', $step);
			$this->setOption('scaleStartValue', $min);
			$this->setOption('scaleSteps', $max / $step);
		}

		protected function toJS($type, $canvasID = null, $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT) {
			if ($canvasID == null) {
				$canvasID = 'CjsPHP' . uniqid(true);
			}

			$data = [];
			foreach ($this->datasets as $key => $set) {
				$data[] = $set->__toArray();
			}

			$data = [
				'labels'	=>	$this->labels,
				'datasets'	=>	$data
			];

			return '
				<script>
					function ' . $type . 'Chart' . $canvasID . '() {
						var canvas = document.querySelector("canvas#' . $canvasID . '");
						var ctx = canvas.getContext("2d");
						var chart = null;
						var data = ' . json_encode($data) . ';
						var options = ' . json_encode($this->options) . ';

						'.($responsive ? 'window.addEventListener("resize", resizeWindowListener, true);' : '').'

						function createChart() {
							return new Chart(ctx).'.$type.'(data, options);
						}

						function resizeWindowListener() {
							'.($responsive ? '
								if ("getComputedStyle" in window) {
									var style = window.getComputedStyle(canvas.parentNode, null);
									var width = style.getPropertyValue("width").replace("px", "");
									var paddingLeft = style.getPropertyValue("padding-left").replace("px", "");
									var paddingRight = style.getPropertyValue("padding-right").replace("px", "");

									canvas.width = width/* - paddingLeft - paddingRight*/;
								} else {
									canvas.width = canvas.parentNode.offsetWidth;
								}
							' : '').'
							chart = createChart();
						}

						resizeWindowListener();
					}

					document.addEventListener("DOMContentLoaded", function() {
						var ' . $type . 'ChartObj' . $canvasID . ' = new ' . $type . 'Chart' . $canvasID . '();
					});
				</script>

				<canvas id="' . $canvasID . '" width="' . $width . '" height="' . $height . '" /></canvas>
			';
		}
	}
?>