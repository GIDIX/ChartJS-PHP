<?php
	/**
	 * CommonChartTheme
	 * Dataset-Theme for CommonChart
	 * {@see CommonChart}
	 *
	 * @author GIDIX
	 * @version 1.0
	 */
	class CommonChartTheme {
		// Chart
		protected $fillColor;
		protected $strokeColor;

		// Point
		protected $pointColor;
		protected $pointStrokeColor;
		protected $pointHighlightFill;
		protected $pointHighlightStroke;

		public static function createDefault() {
			return new self(
				'rgba(220, 220, 220, 0.2)',
				'#dcdcdc',
				'#dcdcdc',
				'#fff',
				'#fff',
				'#dcdcdc'
			);
		}

		public static function createOrange() {
			return new self(
				'rgba(255, 152, 0, 0.1)',
				'#FF9800',
				'#FF9800',
				'#fff',
				'#fff',
				'#FF9800'
			);
		}

		public function __construct(
			$fillColor = null, $strokeColor = null, $pointColor = null, $pointStrokeColor = null,
			$pointHighlightFill = null, $pointHighlightStroke = null) {

			$this->fillColor = $fillColor;
			$this->strokeColor = $strokeColor;
			$this->pointColor = $pointColor;
			$this->pointStrokeColor = $pointStrokeColor;
			$this->pointHighlightFill = $pointHighlightFill;
			$this->pointHighlightStroke = $pointHighlightStroke;
		}

		public function setFillColor($c) {
			$this->fillColor = $c;
		}

		public function setStrokeColor($c) {
			$this->strokeColor = $c;
		}

		public function setPointColor($c) {
			$this->pointColor = $c;
		}

		public function setPointStrokeColor($c) {
			$this->pointStrokeColor = $c;
		}

		public function setPointHighlightFill($c) {
			$this->pointHighlightFill = $c;
		}

		public function setPointHighlightStroke($c) {
			$this->pointHighlightStroke = $c;
		}

		public function __toArray() {
			return [
				'fillColor'				=>	$this->fillColor,
				'strokeColor'			=>	$this->strokeColor,
				'pointColor'			=>	$this->pointColor,
				'pointStrokeColor'		=>	$this->pointStrokeColor,
				'pointHighlightFill'	=>	$this->pointHighlightFill,
				'pointHighlightStroke'	=>	$this->pointHighlightStroke
			];
		}
	}
?>