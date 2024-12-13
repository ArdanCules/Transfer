<?php

namespace Config;

use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\Cors;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\ForceHTTPS;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\PageCache;
use CodeIgniter\Filters\PerformanceMetrics;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseFilters
{
    /**
     * Configures aliases for Filter classes to
     * make reading things nicer and simpler.
     *
     * @var array<string, class-string|list<class-string>>
     */
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'cors'          => Cors::class,
        'forcehttps'    => ForceHTTPS::class,
        'pagecache'     => PageCache::class,
        'performance'   => PerformanceMetrics::class,
        'auth' => \App\Filters\AuthFilter::class

        // Custom filters
       
    ];

    /**
     * List of special required filters.
     *
     * These filters are applied globally regardless of routes.
     */
    public array $required = [
        'before' => [
            // Uncomment if HTTPS is mandatory
            // 'forcehttps',
        ],
        'after' => [],
    ];

    /**
     * List of filter aliases that are always
     * applied before and after every request.
     */
    public array $globals = [
        'before' => [
            // 'auth' => ['/dashboard'], // Proteksi halaman dashboard
        ],
        'after' => [],
    ];

    /**
     * List of filter aliases that work on a
     * particular HTTP method (GET, POST, etc.).
     */
    public array $methods = [
        // 'POST' => ['csrf'], // CSRF is crucial for POST requests
    ];

    /**
     * List of filter aliases that should run on any
     * before or after URI patterns.
     */
    public array $filters = [
        // 'auth' => ['before' => ['/dashboard']],
    ];
}
