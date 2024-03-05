<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class RedisTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redis:go';

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
        //create
        Cache::put('example', 'my_string');
        //index
        $str = Cache::get('example');
        //update
        Cache::put('example', $str . ' ' . 'new');
        //delete
        Cache::forget('example');
        //temporarily remember if not
        $str = 'some string';
        $result = Cache::remember('my_string', 60 ,function() use ($str){
            return $str;
        });

        dd($result);
    }
}
