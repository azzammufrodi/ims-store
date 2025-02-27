<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use ArielMejiaDev\LarapexCharts\LineChart;
use App\Models\Product;

class PriceChart
{
    public function build(): LineChart
    {
        $products = Product::orderBy('created_at')->get();

        $labels = $products->pluck('name_product')->toArray();
        $prices = $products->pluck('price')->toArray();

        return (new LarapexChart)->lineChart()
            ->setXAxis($labels)
            ->addLine('Harga', $prices)
            ->setColors(['#ffc63b']);
    }
}
