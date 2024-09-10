<?php

    namespace App\Http\Controllers;

    use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
    use Illuminate\Foundation\Validation\ValidatesRequests;
    use Illuminate\Routing\Controller as BaseController;

    /**
     * Base controller for the application.
     *
     * This abstract class provides a foundation for other controllers, inheriting
     * functionality for authorizing user requests and validating incoming request data.
     *
     * @package App\Http\Controllers
     */
    abstract class Controller extends BaseController
    {
        use AuthorizesRequests, ValidatesRequests;
    }
