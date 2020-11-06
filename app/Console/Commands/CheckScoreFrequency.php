<?php

namespace App\Console\Commands;

use App\Score;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckScoreFrequency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:checkscore';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check Score Frequency';

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
        $query = Score::select(DB::raw('score_gen,COUNT(*) as freq'))
            ->groupBy('score_gen')
            ->get()
            ->toArray();
        foreach ($query as $data) {
            $updateFreq = Score::where('score_gen', $data['score_gen'])
                ->update([
                    'frequency' => $data['freq']
                ]);
        }
        dd('Score Updated');
    }
}
