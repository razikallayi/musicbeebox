<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MonthlySubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'email:newsletter{user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send drip emails to user';

    //protected $drip;

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
        
      //$this->drip->send(User::find($this->argument('username')));

  }



}
