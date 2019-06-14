<?php
return [
    'createProject' => [
        'type' => 2,
        'description' => 'Create a projects',
    ],
    'user' => [
        'type' => 1,
        'children' => [
            'createProject',
        ],
    ],
    'admin' => [
        'type' => 1,
        'children' => [
            'createProject',
        ],
    ],
];
