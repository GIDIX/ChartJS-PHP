# Chart.js for PHP

[Chart.js](https://github.com/nnnick/Chart.js) is a great library by nnick which allows you to easily add rich visual graphs to your project. However, since it is a JS library, using it in PHP might get a bit tedious. You can have as many charts as you wish. Generated JS code is namespaced so it doesn't clash with code from other Chart.js instances.

Here to change that is **Chart.js for PHP**. It is fully compatible with **Chart.js 1.x** (will be updated for 2.x soon).

## Get Started

1. Clone this repository and place the contents of the `src` folder anywhere in your PHP project.
2. `include` the files in your PHP project.
3. Place `chart.min.js` anywhere in your project.
4. Place this into the page where you want to display charts:
    
    ```html
    <script src="path/to/chart.min.js"></script>
    ```

## How to use it

### Create a LineChart

For creating a line chart, you need two arrays: One containing the labels of the chart (x-axis) and one containing the datasets. A datasets consist of a label, the values and a theme.

1. Create a theme for your dataset:
    
    ```php
    $theme = new CommonChartTheme($fillColor, $strokeColor, $pointColor, $pointStrokeColor, $pointHighlightFull, $pointHighlightStroke);
    ```
    
    Alternatively, use one of the default ones:
    
    ```php
    $theme = CommonChartTheme::createDefault();
    ```
2. Create a dataset and apply the theme:
    
    ```php
    $dataset = new CommonChartDataset('Example Data', [ 50, 100, 25, 42 ], $theme);
    ```
    
3. Create the chart:
    
    ```php
    $chart = new LineChart([ 'Today', 'Today+1', 'Today+2', 'Today+3' ], [ $dataset ], []);
    ```
    
    You can provide options as a third parameter. Use the options [provided by Chart.js](http://www.chartjs.org/docs/#getting-started-global-chart-configuration).
    
4. Create output:
    
    ```php
    echo $chart->__toJS($customID = uniqid(), $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT);
    ```

### Create a PieChart
1. Create data:
    
    ```php
    $data = [
        new PieChartData('Data 1', 13, '#292c34', '#fff'),
        new PieChartData('Data 2', 42, '#1177aa', '#fff')
    ];
    ```
    
2. Create the chart:
    
    ```php
    $chart = new PieChart($data, []);
    ```
    
    You can provide options as a second parameter. Use the options [provided by Chart.js](http://www.chartjs.org/docs/#getting-started-global-chart-configuration).
    
3. Create output:
    
    ```php
    echo $chart->__toJS($customID = uniqid(), $responsive = true, $width = Chart::DEFAULT_WIDTH, $height = Chart::DEFAULT_HEIGHT);
    ```
    
## Chart Types
There are only 2 major chart types. Here's how they depend one each other:

- CommonChart
    - BarChart
    - LineChart
- PieChart
    - DoughnutChart

Every CommonChart works like any other CommonChart.
PieChart and DoughnutChart are completely compatible (you can even use PieChartData with DoughnutChart but for semantics sake, DoughnutChartData is provided).

## Requirements
This library supports Chart.js 1.x only.
You need at least PHP 5.4 because people, move on.

## Contribute
Contributions are welcome. Issue pull requests when you have improvements or fixes.

## License
This project is released under the MIT license.

    The MIT License (MIT)
    
    Copyright (c) 2015 GIDIX
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files (the "Software"), to deal
    in the Software without restriction, including without limitation the rights
    to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
    copies of the Software, and to permit persons to whom the Software is
    furnished to do so, subject to the following conditions:
    
    The above copyright notice and this permission notice shall be included in
    all copies or substantial portions of the Software.
    
    THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
    IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
    FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
    AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
    LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
    OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
    THE SOFTWARE.
