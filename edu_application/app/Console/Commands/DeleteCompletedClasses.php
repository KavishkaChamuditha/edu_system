<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteCompletedClasses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-completed-classes';

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
            $now = now();
            $deleted = \App\Models\SchoolClass::where(
                function ($query) use ($now) {
                    $query->where('start_date', '<', $now->toDateString())
                          ->where('time', '<', $now->format('H:i'));
                }
            )->delete();

            $this->info("Deleted $deleted completed classes.");
    }
}
