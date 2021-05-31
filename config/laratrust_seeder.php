<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => true,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'superadmin' => [
            'users'         => 'c,r,u,d',
            'roles'         => 'c,r,u,d',
            'customers'     => 'c,r,u,d',
            'vendors'       => 'c,r,u,d',
            'categories'    => 'c,r,u,d',
            'stores'        => 'c,r,u,d',
            'units'         => 'c,r,u,d',
            'taxes'         => 'c,r,u,d',
            'items'         => 'c,r,u,d',
            'initials'      => 'c,r,u,d',
            'bills'         => 'c,r,u,d',
            'invoices'         => 'c,r,u,d',
            'dashboard'     => 'r',
        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
