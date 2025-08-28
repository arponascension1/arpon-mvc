<?php

namespace App\Console;

use App\Console\Commands\DbSeedCommand;
use App\Console\Commands\GreetCommand;
use Arpon\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected array $commands = [
        GreetCommand::class,
        DbSeedCommand::class,
    ];

    /**
     * Get the commands provided by the application.
     *
     * @return array
     */
    public function getCommands(): array
    {
        return array_merge(parent::getCommands(), $this->commands);
    }
}
