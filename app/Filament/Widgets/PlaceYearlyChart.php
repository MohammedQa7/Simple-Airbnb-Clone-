<?php

namespace App\Filament\Widgets;

use App\Models\Place;
use App\Models\Reservation;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class PlaceYearlyChart extends ChartWidget
{
    protected static ?string $heading = 'Yearly Statistics For Places';
    protected static ?string $maxHeight = '300px';
    protected function getData(): array
    {

        $data_reservations = Reservation::count();
        $data_place = Place::count();   
        return [
            'datasets' => [
                [
                    'label' => 'Blog posts created',
                    'data' => [$data_reservations , $data_place],
                    'backgroundColor' => [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                      ],
                ],
            ],
           
            'labels' => ['Reservations' , 'Places'],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
