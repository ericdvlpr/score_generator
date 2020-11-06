<?php

namespace App\Http\Controllers;

use App\Score;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDO;

class ScoreController extends Controller
{

    public function score()
    {
        return response()->json(Score::get(), 200);
    }

    public function scoreByID($id)
    {
        return response()->json(Score::find($id), 200);
    }
    public function scoreSave(Request $request)
    {
        $score = Score::create($request->all());
        return response()->json($score, 201);
    }
    public function scoreUpdate(Request $request, Score $score)
    {
        $score->update($request->all());
        return response()->json($score, 200);
    }
    public function scoreDelete(Request $request, Score $score)
    {
        $score->delete($request->all());
        return response()->json(null, 204);
    }
}
