<?php

namespace App\Console\Commands;

use App\Period;
use Carbon\Carbon;
use Illuminate\Console\Command;

class TwoDaysPriorCommand extends Command
{

    protected $signature = 'blueAngie:two';


    protected $description = 'Inform angie that its coming in two days';


    public function __construct()
    {
        parent::__construct();
    }


    public function handle()
    {
        if ($this->periodStartsInTwoDays()) {
            $this->sendSms();
        }

        return true;
    }

    private function periodStartsInTwoDays()
    {
        $estNext = Period::get()->last()->date->addDays(27);

        $daysUntil = (int) Carbon::now()->startOfDay()->diffInDays($estNext);

        return $daysUntil === 2;
    }


    private function sendSms()
    {
        $message = "Message from BlueAngie.\nYour period starts in approximately 2-3 days.\n";
        $message .= "Don't forget to buy painkillers.You are the best!";

        \Twilio::message(env('ANGIES_PHONE'), $message);
    }
}













