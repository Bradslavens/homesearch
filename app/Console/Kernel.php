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

            $yesterday = Carbon::yesterday()->toAtomString();

            // $query = "(L_UpdateDate=". $yesterday . "+)|(L_ListingDate=". $yesterday . "+),(L_IdxInclude=0,2)"; //select only those that can be show on the internet
            $query = '(L_StatusCatID=1),(L_IdxInclude=0,2)'; //select only those that can be show on the internet
            

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

            // set limit
            $limit = 2000;
            
               
            $select = [
                        'L_ListingID', 
                        'L_AskingPrice', 
                        'L_AddressNumber', 
                        'L_AddressDirection', 
                        'L_AddressStreet', 
                        'L_Address2', 
                        'L_City', 
                        'L_State', 
                        'L_Zip', 
                        'LM_Int1_3',
                        'LM_Int2_3',
                        'LM_Int1_5',
                        'LM_Int4_1',
                        'LM_Int2_6',
                        'L_UpdateDate', 
                        'L_ListingDate', 
                        'L_Status', 
                        'L_StatusCatID',
                        'LFD_Terms_42',
                        'LR_remarks11',
                        'LM_Char10_6',
                        'LM_Char10_11',
                        'LM_Char10_15',
                        'LM_Char50_5',
                        'LM_Int1_8',
                        'LM_Int2_1',
                        'LM_Int4_7',
                        'LM_Int4_8',
                        'LM_Int4_16',
                        'LM_Dec_3',
                        'LM_Dec_4',
                        'LM_Dec_6',
                        'LFD_Cooling_3',
                        'LFD_Equipment_4',
                        'LFD_LaundryLocation_15',
                        'LFD_Pool_25',
                        'LFD_SchoolDistrict_32',
                        'LFD_View_44',
                        'LFD_PropertyCondition_305',
                        'L_IdxInclude',
                    ]; 
                        
            $results1 = $rets->Search('Property', 'RE_1', $query, 
                    [
                        'select' => $select, 'Count' => 2, 
                        'Format' => 'COMPACT-DECODED', 
                        'PropertyQueryType=DMQL2',
                    ]);


             // log::info('ended query - count = ');
             log::info('ended query - count = ' . $results1->getTotalResultsCount());

             $count = $results1->getTotalResultsCount();

             for($i=0; $i <= $count; $i+=$limit) //($count + 500)
             {
                $o = $i+1; // adjusted offset

                Log::info('o = ' . $o);

                $results = $rets->Search('Property', 'RE_1', $query, ['Limit' => $limit, 'select' => $select, 'Offset' => $o, 'Format' => 'COMPACT-DECODED', 'PropertyQueryType=DMQL2',]);

                foreach ($results as $r) 
                {
                    Log::info('times ' . $yesterday . '- yesterday - ' . $r['L_ListingDate'] . '- listing date' );
                    // set the full address
                    $fullAddress = $r['L_AddressNumber'] . " " . $r['L_AddressDirection'] . " " . $r['L_AddressStreet'] . ", " . $r['L_City']. ", " . $r['L_State'] . " " . $r['L_Zip'];
                    // 
                    // $fullAddress = $r['L_AddressNumber'] . " " . $r['L_AddressDirection'] . " " . $r['L_AddressStreet'] . " " . $r['L_City']. " " . $r['L_State'] . " " . $r['L_Zip'];
                    // see if the listing exits
                    
                    $property = \App\Property::where('L_ListingID', $r['L_ListingID'])->first();

                    $details = [
                                'L_ListingID' => $r['L_ListingID'], 
                                'FullAddress' => $fullAddress  , 
                                'L_AskingPrice' => $r['L_AskingPrice'], 
                                'L_AddressNumber' => $r['L_AddressNumber'], 
                                'L_AddressDirection' => $r['L_AddressDirection'], 
                                'L_AddressStreet' => $r['L_AddressStreet'], 
                                'L_Address2' => $r['L_Address2'], 
                                'L_City' => $r['L_City'], 
                                'L_State' => $r['L_State'], 
                                'L_Zip' => $r['L_Zip'], 
                                'LM_Int1_3' => $r['LM_Int1_3'],
                                'LM_Int2_3' => $r['LM_Int2_3'],
                                'LM_Int1_5' => $r['LM_Int1_5'],
                                'LM_Int4_1' => $r['LM_Int4_1'], 
                                'L_UpdateDate' => $r['L_UpdateDate'], 
                                'L_ListingDate' => $r['L_ListingDate'], 
                                'L_Status' => $r['L_Status'], 
                                'L_StatusCatID' => $r['L_StatusCatID'], 
                                'L_IdxInclude' => $r['L_IdxInclude'],
                            ];

                    if($property == null)
                    {
                        Log::info('property does not exist');

                        // add the property to the database
                        $property = \App\Property::create($details);
                    }
                    else
                    {

                        Log::info('property already exists');

                        \App\Property::find($property->id)->update($details);

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

             }
             // end for loop

            Log::info("updated property database with cron job");

            $rets->Disconnect();

        })->dailyAt("19:56");
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
