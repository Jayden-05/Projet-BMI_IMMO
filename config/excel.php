<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Sheet Settings
    |--------------------------------------------------------------------------
    |
    | Default settings to use when creating a new sheet.
    |
    */

    'default_sheet_view' => null,

    /*
    |--------------------------------------------------------------------------
    | Excel Files Storage
    |--------------------------------------------------------------------------
    */

    'stores' => [
        'local' => [
            'disk' => 'local',
        ],
        'public' => [
            'disk' => 'public',
            'url' => '/storage',
            'visibility' => 'public',
        ],
        's3' => [
            'disk' => 's3',
        ],
    ],

    'local' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Export Settings
    |--------------------------------------------------------------------------
    |
    | Configure export behavior
    |
    */

    'exports' => [
        /*
        |--------------------------------------------------------------------------
        | Chunk size
        |--------------------------------------------------------------------------
        |
        | When a export is used, how much rows should be written to the file per
        | chunk. Higher values = better performance, but more memory usage.
        |
        */

        'chunk_size' => 100,

        /*
        |--------------------------------------------------------------------------
        | Memory Limit
        |--------------------------------------------------------------------------
        |
        | When exporting, PHPExcel keeps objects in memory before flushing them
        | to a file. By default we're increasing the memory limit to prevent
        | any memory problems.
        |
        */

        'memory_limit' => '-1',
    ],

    /*
    |--------------------------------------------------------------------------
    | Import Settings
    |--------------------------------------------------------------------------
    */

    'imports' => [
        'read_only' => true,
        'heading_row' => 1,

        /*
        |--------------------------------------------------------------------------
        | CSV Settings
        |--------------------------------------------------------------------------
        */

        'csv' => [
            'delimiter' => ',',
        ],

        /*
        |--------------------------------------------------------------------------
        | Chunk size
        |--------------------------------------------------------------------------
        |
        | When a import is used, how much rows should be read from the file per
        | chunk. Higher values = better performance, but more memory usage.
        |
        */

        'chunk_size' => 100,

        /*
        |--------------------------------------------------------------------------
        | Memory Limit
        |--------------------------------------------------------------------------
        |
        | Memory limit to use when importing, defaults to current php.ini value.
        |
        */

        'memory_limit' => '-1',

        /*
        |--------------------------------------------------------------------------
        | Read Only
        |--------------------------------------------------------------------------
        |
        | By default, imports will read from the file. If you want to make
        | changes to the import and save them back to the file, set this to false.
        |
        */

        'read_only' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Extension resolver
    |--------------------------------------------------------------------------
    */

    'extension_detector' => [
        'xlsx' => null,
        'csv' => null,
        'xls' => null,
    ],

    'value_binder' => [
        'default' => \Maatwebsite\Excel\DefaultValueBinder::class,
    ],

    'cache' => [
        'only_object' => false,
        'expiration_time' => null,
    ],

    'temporary_files' => [
        'local_path' => sys_get_temp_dir(),
        'remote_disk' => null,
        'remote_path' => 'temporary_exports',
    ],

    /*
    |--------------------------------------------------------------------------
    | Excel Writer Options
    |--------------------------------------------------------------------------
    */

    'write' => [
        'html' => [
            'test_html_presence' => true,
        ],
    ],
];
