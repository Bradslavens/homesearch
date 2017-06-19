<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Log;
use troydavisson\phrets;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){

            // connect to RETS
            $config = new \PHRETS\Configuration;
            $config->setLoginUrl(env('RETS_URL'))
                    ->setUsername(env('RETS_USER'))
                    ->setPassword(env('RETS_PASS'))
                    ->setRetsVersion('1.7.2');

            $config->setHttpAuthenticationMethod('basic');

            $rets = new \PHRETS\Session($config);

            $connect = $rets->Login();

            // search RETS and add to database
            
            Log::info('started query');
            
            $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)', ['Limit' => 100, 'Select' => ['L_ListingID', 'L_AskingPrice', 'L_AddressNumber', 'L_AddressDirection', 'L_AddressStreet', 'L_Address2', 'L_City', 'L_State', 'L_Zip']]);
            
            log::info('ended query');

            foreach ($results as $r) 
            {
                // add the property to the database
                $property = \App\Property::create(['L_ListingID' => $r['L_ListingID'], 'L_AskingPrice' => $r['L_AskingPrice'], 'L_AddressNumber' => $r['L_AddressNumber'], 'L_AddressDirection' => $r['L_AddressDirection'], 'L_AddressStreet' => $r['L_AddressStreet'], 'L_Address2' => $r['L_Address2'], 'L_City' => $r['L_City'], 'L_State' => $r['L_State'], 'L_Zip' => $r['L_Zip']]);

                // add the property images to the images database
                $objects = $rets->GetObject('Property', 'Photo', $r['L_ListingID'], '*',  1);

                foreach ($objects as $object) 
                {   

                    // fix the urls from the testing server
                    if(env('APP_ENV') == 'local')
                    {
                        $url = preg_replace("/stageimage./", "IMG-", $object->getLocation());
                    }
                    else
                    {
                        $url = $object->getLocation();
                    }

                    $image = \App\Image::create(['link' => $url, 'property_id' => $r['L_ListingID']]);

                }
            }

            Log::info("updated property database with cron job");

        })->hourlyAt(13);
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
