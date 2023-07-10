<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Mail;
use App\Mail\ExipiryEMail;

class NotifyHostingCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifyhosting:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Date using carbon function
        $tomorrow = Carbon::tomorrow();

        //Query Website list
        $test = DB::table('websites')
                ->where('expiry', '=', $tomorrow)
                ->get();
        //info($websites);
        //$test = 1;
        /**foreach (['taylor@example.com', 'dries@example.com'] as $recipient) {
            Mail::to($recipient)->send(new OrderShipped($order));
        }**/

        //Query Users
        $users = DB::table('users')->get();
        foreach ($users as $user) {
        Mail::to($user->email)->send(new ExipiryEmail($test));
        }
        
    }
}
