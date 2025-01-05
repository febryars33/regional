<?php

namespace Snairbef\Regional\Commands;

use Illuminate\Console\Command;

class RegionalCommand extends Command
{
    /**
     * The name and signature of the console command.
     */
    public $signature = 'regional:install';

    /**
     * The console command description.
     */
    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
