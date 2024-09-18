<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use App\Models\Admin\Visitor;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Foundation\Application;
    use \Illuminate\Contracts\View\View;

    class DashboardController extends Controller
    {
        /**
         * Show the admin dashboard.
         *
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
         */
        public function index(): Factory|View|Application
        {
            $currentMonthVisitors = Visitor::visitorsCurrentMonth();
            $lastMonthVisitors = Visitor::visitorsLastMonth();
            $percentageChange = $lastMonthVisitors ? Visitor::percentageChange($currentMonthVisitors, $lastMonthVisitors) : null;

            return view('admin.index', compact('currentMonthVisitors', 'lastMonthVisitors', 'percentageChange'));
        }
    }
