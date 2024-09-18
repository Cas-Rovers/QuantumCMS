<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
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
            return view('admin.index');
        }
    }
