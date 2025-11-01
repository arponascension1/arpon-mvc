<?php

namespace App\Console\Commands;

use Arpon\Console\Command;
use Arpon\Support\Facades\Mail;


class SendMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected string $signature = 'mail:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected string $description = 'Send a test email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $to = ['address' => 'arponascension20@gmail.com', 'name' => 'Test User'];

        Mail::send('emails.test', ['name' => $to['name']], function ($message) use ($to) {
            $subject = 'Test Email';
            $message->to($to['address'], $to['name']);
            $message->subject($subject);
        });

        $this->info('Test email sent!');

        return 0; // Return 0 for success
    }
}
