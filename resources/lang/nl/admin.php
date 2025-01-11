<?php

    return [
        'auth' => [
            'login' => [
                'logo_alt' => 'Logo van ' . config('app.name'),
                'header' => 'Login',
                'email' => 'E-mail',
                'password' => 'Wachtwoord',
                'remember_me' => 'Onthoud mij',
                'forgot_password' => 'Wachtwoord vergeten?',
                'reset_password' => 'Hier resetten',

                'aria_labels' => [
                    'email' => 'E-mailadres invoer',
                    'password' => 'Wachtwoord invoer',
                    'remember_me' => 'Onthoud mij selectievakje',
                    'reset_password' => 'Wachtwoord opnieuw instellen link',
                    'submit' => 'Inloggen knop',
                ],
            ],
        ],

        'sidebar' => [
            'anchors' => [
                'dashboard' => 'Dashboard',
                'users' => 'Gebruikers',
            ],
        ],

        'top_navbar' => [
            'profile_information' => [
                'avatar_alt' => 'Profielfoto van',
                'settings' => 'Instellingen',
                'logout' => 'Uitloggen',
            ],
        ],

        'dashboard' => [
            'widgets' => [
                'visitors' => [
                    'title' => 'Totaal aantal bezoekers',
                    'text' => 'Vergeleken met vorige maand',
                ],
            ],
        ],
    ];
