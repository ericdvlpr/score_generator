<?php

namespace App\Console\Commands;

use App\Score;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ScoreGenerate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generatescore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Random Score';

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
     * @return int
     */
    public function handle()
    {

        $score = Score::insert([
            'score_gen' => rand(1, 50),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
            'frequency' => 0
        ]);
        dd('Generate a score');
    }
}
