<?php

namespace App\Filament\Widgets;

use App\Models\Place;
use Filament\Support\Enums\IconSize;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class PlaceStatisticsWidget extends BaseWidget
{
    protected function getStats(): array
    {
        $one_week_before = Carbon::now()->subWeek()->startOfWeek();
        $two_weeks_before = Carbon::now()->subWeeks(2)->startOfWeek();
        $places_for_last_week = Place::where('created_at' , '>=' , $one_week_before)->count();
        $places_for_last_two_weeks = Place::where('created_at' , '>=' , $two_weeks_before)
        ->where('created_at' , '<=' , $one_week_before)
        ->count();
        return [
            Stat::make('New Places' , $places_for_last_week)
            ->description(
                'Places for the last week'
            )
            
            ->descriptionIcon( $places_for_last_week < $places_for_last_two_weeks ? 'heroicon-o-arrow-trending-down' :'heroicon-o-arrow-trending-up')
            ->chart([20,12,17,20,50]) 
            ->color($places_for_last_week < $places_for_last_two_weeks ? 'danger' : 'success')
        ];
    }

}
