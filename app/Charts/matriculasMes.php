<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use App\Charts\SampleChart;

class matriculasMes extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function __construct()
    {
        $chart = new SampleChart;
        $chart->labels(['One', 'Two', 'Three']);

        // parent::__construct();
        return view('home', ['chart' => $chart]);
    }
}
