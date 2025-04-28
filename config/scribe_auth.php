<?php

return [
    'enabled' => env('SCRIBE_AUTH_ENABLED', false),
    'auth_key' => env('SCRIBE_AUTH_PASSWORD', '123456789'),
    'throttle_max_attempts' => env('SCRIBE_AUTH_MAX_ATTEMPTS', 5),
];