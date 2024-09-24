<?php

namespace Manza\Paisa\Commands;

use Illuminate\Console\Command;

class PaisaCommand extends Command
{
    public $signature = 'paisa';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
