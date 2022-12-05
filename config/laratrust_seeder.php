<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => false,

    'roles_structure' => [

        'super_admin' => [
            'users' => 'c,r,u,d',
            'teachers' => 'c,r,u,d',
            'students' => 'c,r,u,d',
        ],

        'admin' => [
            'users' => 'r,d,u',
            'teachers' => 'c,u',
            'students' => 'c,u',
        ],
        
        'teacher' => [
            'users' => 'r,d,u',
            'students' => 'c,u',
        ],

        'student' => [],
       
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
