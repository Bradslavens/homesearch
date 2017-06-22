<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use Illuminate\Support\Facades\Log;
use troydavisson\phrets;
use Carbon\Carbon;

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

            $time = Carbon::yesterday()->toAtomString();

            // $query = "(L_UpdateDate=". $time . "+)";
            $query = '(L_StatusCatID=1),(L_AskingPrice=500000+)';

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


            // $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)', ['Limit' => 1, 'Select' => 'L_ListingID']);
            
            $results = $rets->Search('Property', 'RE_1', $query, ['Limit' => 100, 'select' => ['L_ListingID', 'L_AskingPrice', 'L_AddressNumber', 'L_AddressDirection', 'L_AddressStreet', 'L_Address2', 'L_City', 'L_State', 'L_Zip']]);
            
            log::info('ended query');

            foreach ($results as $r) 
            {
                // first see if the listing exits
                
                $property = \App\Property::where('L_ListingID', $r['L_ListingID'])->first();

                if($property == null)
                {
                    Log::info('property does not exist');

                    // add the property to the database
                    $property = \App\Property::create(['L_ListingID' => $r['L_ListingID'], 'FullAddress' => $r['L_AddressNumber'] . " " . $r['L_AddressDirection'] . " " . $r['L_AddressStreet'] . ", " . $r['L_City']. ", " . $r['L_State'] . " " . $r['L_Zip']  , 'L_AskingPrice' => $r['L_AskingPrice'], 'L_AddressNumber' => $r['L_AddressNumber'], 'L_AddressDirection' => $r['L_AddressDirection'], 'L_AddressStreet' => $r['L_AddressStreet'], 'L_Address2' => $r['L_Address2'], 'L_City' => $r['L_City'], 'L_State' => $r['L_State'], 'L_Zip' => $r['L_Zip']]);
                }
                else
                {

                    Log::info('property already exists');

                    \App\Property::find($property->id)->update(['L_ListingID' => $r['L_ListingID'], 'FullAddress' => $r['L_AddressNumber'] . " " . $r['L_AddressDirection'] . " " . $r['L_AddressStreet'] . ", " . $r['L_City']. ", " . $r['L_State'] . " " . $r['L_Zip']  , 'L_AskingPrice' => $r['L_AskingPrice'], 'L_AddressNumber' => $r['L_AddressNumber'], 'L_AddressDirection' => $r['L_AddressDirection'], 'L_AddressStreet' => $r['L_AddressStreet'], 'L_Address2' => $r['L_Address2'], 'L_City' => $r['L_City'], 'L_State' => $r['L_State'], 'L_Zip' => $r['L_Zip']]);

                    $property = \App\Property::find($property->id);
                }


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

                    $property->images()->save($image);

                }
            }

            Log::info("updated property database with cron job");

        })->hourlyAt(10);
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
