<?php

    return [
        'auth' => [
            'login' => [
                'logo_alt' => 'Logo of ' . config('app.name'),
                'header' => 'Login',
                'email' => 'Email',
                'password' => 'Password',
                'remember_me' => 'Remember me',
                'forgot_password' => 'Forgot your password?',
                'reset_password' => 'Reset here',

                'aria_labels' => [
                    'email' => 'Email address input',
                    'password' => 'Password input',
                    'remember_me' => 'Remember me checkbox',
                    'reset_password' => 'Reset password link',
                    'submit' => 'Login button',
                ]
            ],
        ],

        'sidebar' => [
            'anchors' => [
                'dashboard' => 'Dashboard',
                'users' => 'Users',
            ]
        ],

        'dashboard' => [
            'widgets' => [
                'visitors' => [
                    'title' => 'Total visitors',
                    'text' => 'Compared to last month',
                ]
            ]
        ],
    ];
