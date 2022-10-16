<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Query String
    |--------------------------------------------------------------------------
    |
    | This defines the default query string.
    |
    */

    'query_string' => [
        'page' => ['except' => 1, 'as' => 'p'],
        'perPage' => ['except' => 10, 'as' => 'l'],
        'search' => ['except' => '', 'as' => 'q'],
        'sort' => ['except' => '', 'as' => 's'],
        'direction' => ['except' => 'asc', 'as' => 'd'],
        'filter' => ['except' => '', 'as' => 'f'],
        'hidden' => ['except' => '', 'as' => 'h'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Validation Rules
    |--------------------------------------------------------------------------
    |
    | It is recommended to add your own rules here.
    |
    */

    'rules' => [
        'page' => 'sometimes|int|min:1',
        'perPage' => 'sometimes|int|min:10|max:50',
        'filter' => 'sometimes|array',
        'hidden' => 'sometimes|array',
        'search' => 'sometimes|string|max:255',
        'sort' => 'sometimes|string',
        'direction' => 'sometimes|string|in:asc,desc',
    ],

    /*
    |--------------------------------------------------------------------------
    | DataTable Page Sizes
    |--------------------------------------------------------------------------
    |
    | This defines the page sizes for datatables.
    |
    */

    'page_size' => 10,

    'page_sizes' => [10, 20, 30, 40, 50],
];
