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
//            $currentMonthVisitors = Visitor::visitorsCurrentMonth();
//            $lastMonthVisitors = Visitor::visitorsLastMonth();

            $visitors = new Visitor;

            $percentageChange = $visitors->visitorsLastMonth() ? Visitor::percentageChange($visitors->visitorsCurrentMonth(), $visitors->visitorsLastMonth()) : null;

            return view('admin.index', compact('visitors', 'percentageChange'));
        }
    }
