<?php

use Larsklopstra\Nebula\Http\Middleware\NebulaIPAuthStrategy;

return [

    'name' => 'Nebula',

    'prefix' => '/nebula',

    'domain' => null,

    'auth_strategy' => NebulaIPAuthStrategy::class,

    'allowed_ips' => [
        '127.0.0.1',
    ],

    'allowed_emails' => [
        // 'admin@example.com',
    ],

    'resources' => [
        // new UserResource,
    ],

    'dashboards' => [
        // new UserDashboard,
    ],

    'pages' => [
        // new CustomPage,
    ],

];
