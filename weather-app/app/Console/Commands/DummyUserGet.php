<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class DummyUserGet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dummy:user';

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
        $uri = 'https://jsonplaceholder.typicode.com/users/1';
        $res = Http::get($uri);
        $jsonResponse = $res->json();

        dd($jsonResponse);
    }
}
