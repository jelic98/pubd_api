<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \DB;

class DropDb extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'drop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'drops all tables of specific or all connections';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $databases = array("mysql");

        foreach ($databases as $databasetoempty) {
            $pdo = \DB::connection($databasetoempty)->getPdo();
    
            $tables = $pdo
                ->query("SHOW FULL TABLES;")
                ->fetchAll();
    
            $sql = 'SET FOREIGN_KEY_CHECKS=0;';
    
            foreach ($tables as $tableInfo) {
                $name = $tableInfo[0];
				
				if (strcmp('BASE TABLE', $name) == 0)
                    continue;
				
                $sql .= 'DROP TABLE ' . $name . ';';
                $this->info('Dropping table ' . $name);
            }
    
            $sql .= 'SET FOREIGN_KEY_CHECKS=1;';
    
            $pdo->exec($sql);
        }
    }
}
