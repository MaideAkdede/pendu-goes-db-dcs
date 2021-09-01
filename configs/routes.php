<?php
return [
    [
        'method' => 'GET',
        'action' => '',
        'resource' => '',
        'controller' => 'Dashboard',
        'callback' => 'index'
    ],
    [
        'method' => 'POST',
        'action' => 'store',
        'resource' => 'letter',
        'controller' => 'Trials',
        'callback' => 'store'
    ],
];
