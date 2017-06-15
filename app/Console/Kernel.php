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
            
            $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)', ['Limit' => 1, 'Select' => 'L_ListingID']);
            
            foreach ($results as $r) 
            {
                // add the property to the database
                $property = \App\Property::create(['L_ListingID' => $r['L_ListingID']]);

                Log::info("Property " . $property->id . " added to the DB");

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

                    Log::info("url " . $url);

                    $image = \App\Image::create(['link' => $url, 'property_id' => $r['L_ListingID']]);

                }
            }



        })->hourlyAt(41);
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
