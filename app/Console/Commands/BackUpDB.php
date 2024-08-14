<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackUpDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:back-up-d-b';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         $filename = "backup-" . Carbon::now()->format('Y-m-d') . ".gz";
  
        // $command = "mysqldump --user=" . env('DB_USERNAME') ." --password=" . '"cT&Z=)JxKzYJ"' . " --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . storage_path() . "/app/backup/" . $filename;

        $command = "mysqldump --user=" . env('DB_USERNAME') ." --password='" . env('DB_PASSWORD') . "' --host=" . env('DB_HOST') . " " . env('DB_DATABASE') . "  | gzip > " . base_path() . "/DB-backup" ."/" . $filename;

  
        $returnVar = NULL;
        $output  = NULL;
  
        exec($command, $output, $returnVar);
    }
}
