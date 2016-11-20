<?php

namespace App\Http\Controllers;

use App\Period;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeriodController extends Controller
{
    public function index()
    {
        $now          = Carbon::now();

        $last         = Period::get()->last()->date;
        $lastPeriodOn = clone $last;
        $currentDay   = $now->diffInDays($last);
        $estNext      = $last->addDays(27);

        return view('home', compact('lastPeriodOn', 'estNext', 'currentDay'));
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'date' => 'date_format:d/m/Y|required'
        ]);

        $date = Carbon::createFromFormat('d/m/Y', $request->get('date'));
        Period::create([
            'date' => $date
        ]);

        alert()->success('You are the best', 'Congrats Angela')->autoclose(2500);

        return back();
    }
}
