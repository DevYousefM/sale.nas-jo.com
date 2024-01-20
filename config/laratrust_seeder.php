<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super_admin' => [
            'category' => 'c,r,u,d',
            'country' => 'c,r,u,d',
            'city' => 'c,r,u,d',
            'client' => 'c,r,u,d',
            'feature' => 'c,r,u,d',
            'post' => 'c,r,u,d',
            'subadmin' => 'c,r,u,d',
            'subcategory' => 'c,r,u,d',
            'slider' => 'c,r,u,d',
            'TermsAndConditions' => 'c,r,u,d',
            'PrivacyPolicy' => 'c,r,u,d',
        ],
        'admin' => [],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
