<?php

namespace App\Console\Commands;

use Arpon\Console\Command;

class GreetCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected string $signature = 'app:greet {name=World}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected string $description = 'Greet a user.';

    /**
     * Execute the console command.
     *
     * @param array $args
     * @param array $options
     * @return int
     */
    public function handle(array $args = [], array $options = []): int
    {
        $name = $args[0] ?? $options['name'] ?? 'World';
        $this->info("Hello, {$name}!");
        return 0;
    }
}