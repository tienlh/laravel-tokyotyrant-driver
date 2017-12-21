<?php

return [
    'host' => env('TOKYO_TYRANT_HOST', 'localhost'),
    'port' => env('TOKYO_TYRANT_PORT', '1978'),
    'options' => [
        'timeout' => 5.0,
        'reconnect' => true,
        'persistent' => true,
    ],
];
