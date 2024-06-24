<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Mobil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Fetch counts
        $mobilCount = Mobil::count();
        $userCount = User::count();
        $categoryCount = Category::count();

        // Fetch rental counts per month
        $rentLogs = DB::table('rent_logs')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as count'))
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->pluck('count', 'month')
            ->all();

        // Prepare data for chart
        $chartData = array_fill(1, 12, 0);
        foreach ($rentLogs as $month => $count) {
            $chartData[$month] = $count;
        }

        return view('Dashboard.dashboard', [
            'mobil_count' => $mobilCount,
            'category_count' => $categoryCount,
            'user_count' => $userCount,
            'chartData' => json_encode(array_values($chartData))
        ]);
    }
}
