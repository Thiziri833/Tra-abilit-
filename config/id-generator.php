<?php

return [
    'connections' => [
        'mysql' => [
            'driver' => 'mysql',
            'table' => 'id_generator',
            'length' => 10,
            'prefix' => '',
            'reset_on_prefix_change' => true,
        ],
    ],
];
