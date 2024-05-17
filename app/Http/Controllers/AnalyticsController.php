<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function showAnalytics()
    {
        // Get page views count for each page
        $pageViews = DB::table('page_views')
            ->select('page_name', DB::raw('count(*) as count'))
            ->groupBy('page_name')
            ->get();

        return view('analytics', ['pageViews' => $pageViews]);
    }
}
