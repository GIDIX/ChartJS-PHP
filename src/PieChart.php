<?php
	/**
	 * PieChart
	 * A chart that shows shares.
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class PieChart extends Chart {
		protected $data = [];
		protected $options = [];

		public function __construct(array $data, array $options = []) {
			$this->data = $data;
			$this->options = $options;
		}

		public function addData(PieChartData $d) {
			$this->data[] = $d;
		}

		public function setOptions(array $options) {
			$this->options = $options;
		}

		public function setOption($key, $value) {
			$this->options[$key] = $value;
		}

		public function __toJS($canvasID = null, $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT, $type = 'Pie') {
			if ($canvasID == null) {
				$canvasID = 'CjsPHP' . uniqid(true);
			}

			$data = [];

			foreach ($this->data as $d) {
				$data[] = $d->__toArray();
			}

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