<?php

namespace Config;

use CodeIgniter\Database\Config;

class Database extends Config
{
    public string $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;
    public string $defaultGroup = 'default';

   public $default = [
    'DSN'      => '',
    'hostname' => 'mysql-tsa1-db-tsa1-task-management-system-1.g.aivencloud.com',
    'username' => 'avnadmin',
    'password' => '', // Left blank here; CodeIgniter automatically loads it securely from your .env file
    'database' => 'defaultdb',
    'DBDriver' => 'MySQLi',
    'DBPrefix' => '',
    'pConnect' => false,
    'DBDebug'  => true,
    'charset'  => 'utf8mb4',
    'DBCollat' => 'utf8mb4_general_ci',
    'swapPre'  => '',
    'encrypt'  => true,  // Required for Aiven SSL connection
    'compress' => false,
    'strictOn' => false,
    'failover' => [],
    'port'     => 10441,
];

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

        // Safely pull the password from Render environment variables
        $pass = getenv('DB_PASSWORD') ?: getenv('database.default.password');
        if ($pass) {
            $this->default['password'] = $pass;
        }
    }
}