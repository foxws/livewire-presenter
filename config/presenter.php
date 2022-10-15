<?php

return [
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
