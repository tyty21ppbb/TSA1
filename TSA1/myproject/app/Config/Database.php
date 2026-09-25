<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    /**
     * The directory that holds the Migrations
     * and Seeds directories.
     */
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

    /**
     * Lets you choose which connection group to use if no
     * other one is specified.
     */
    public string $defaultGroup = 'default';

    /**
     * The default database connection.
     */
    public $default = [
        'DSN'      => '',
        'hostname' => '', 
        'username' => 'avnadmin',                  
        'password' => '', // Leave blank; it will be injected safely via Render Environment Variables
        'database' => 'defaultdb',                 
        'DBDriver' => 'MySQLi',
        'DBPrefix' => '',
        'pConnect' => false,
        'DBDebug'  => (ENVIRONMENT !== 'development'),
        'charset'  => 'utf8mb4',
        'DBCollat' => 'utf8mb4_general_ci',
        'swapPre'  => '',
        'encrypt'  => true,
        'compress' => false,
        'strictOn' => false,
        'failover' => [],
        'port'     => 10441,                     
    ];

    /**
     * This database connection is used when running PHPUnit database tests.
     */
    public array $tests = [
        'DSN'         => '',
        'hostname'    => '127.0.0.1',
        'username'    => '',
        'password'    => '',
        'database'    => ':memory:',
        'DBDriver'    => 'SQLite3',
        'DBPrefix'    => '',
        'pConnect'    => false,
        'DBDebug'     => true,
        'charset'     => 'utf8',
        'DBCollat'    => '',
        'swapPre'     => '',
        'encrypt'     => false,
        'compress'    => false,
        'strictOn'    => false,
        'failover'    => [],
        'port'        => 3306,
        'foreignKeys' => true,
        'busyTimeout' => 1000,
    ];

    public function __construct()
    {
        parent::__construct();

        // Override settings dynamically from Render Environment Variables
        if (getenv('database.default.hostname')) {
            $this->default['hostname'] = getenv('database.default.hostname');
        }
        if (getenv('database.default.database')) {
            $this->default['database'] = getenv('database.default.database');
        }
        if (getenv('database.default.username')) {
            $this->default['username'] = getenv('database.default.username');
        }
        if (getenv('database.default.password')) {
            $this->default['password'] = getenv('database.default.password');
        }
        if (getenv('database.default.port')) {
            $this->default['port'] = (int) getenv('database.default.port');
        }
    }
}