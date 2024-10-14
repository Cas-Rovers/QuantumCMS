<?php

    namespace App\Http\Controllers\Admin;

    use \Illuminate\Contracts\View\View;
    use App\Http\Controllers\Controller;
    use App\Models\Admin\Visitor;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Foundation\Application;

    class DashboardController extends Controller
    {
        /**
         * Show the admin dashboard.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
         */
        public function index(): Factory|View|Application
        {
            $totalVisitors = Visitor::totalVisitors();
            $currentMonthVisitors = Visitor::visitorsCurrentMonth();
            $lastMonthVisitors = Visitor::visitorsLastMonth();

            $percentageChange = Visitor::percentageChange($currentMonthVisitors, $lastMonthVisitors);

            return view('admin.index', compact('totalVisitors', 'percentageChange'));
        }
    }
