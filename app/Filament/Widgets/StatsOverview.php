<?php

namespace App\Filament\Widgets;

use App\Models\Certification;
use App\Models\Company;
use App\Models\Course;
use App\Models\Experience;
use App\Models\Post;
use App\Models\Social;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Certifications', Certification::all()->count()),
            Stat::make('Companies', Company::all()->count()),
            Stat::make('Courses', Course::all()->count()),
            Stat::make('Experiences', Experience::all()->count()),
            Stat::make('Posts', Post::all()->count()),
            Stat::make('Socials', Social::all()->count()),
            Stat::make('Users', User::all()->count()),
        ];
    }
}
