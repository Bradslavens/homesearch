<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Log;

use troydavisson\phrets;

class PHRetsTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPHRetsMeta()
    {
        $config = new \PHRETS\Configuration;

        $config->setLoginUrl(env('RETS_URL'))
                ->setUsername(env('RETS_USER'))
                ->setPassword(env('RETS_PASS'))
                ->setRetsVersion('1.7.2');

        $config->setHttpAuthenticationMethod('basic');

        $rets = new \PHRETS\Session($config);
        $connect = $rets->Login();

        $system = $rets->GetSystemMetadata();
        // var_dump($system);

        $resources = $system->getResources();
        $classes = $resources->first()->getClasses();
        // var_dump($classes);

        $classes = $rets->GetClassesMetadata('Property');
        // var_dump($classes->first());
        
        $fields = $rets->GetTableMetadata('Property', 'RE_1');

        // $rets->Disconnect(); for some reason this makes the other test fail ???

    }

    public function testPHRetsSearch()
    {

        $config = new \PHRETS\Configuration;

        $config->setLoginUrl(env('RETS_URL'))
                ->setUsername(env('RETS_USER'))
                ->setPassword(env('RETS_PASS'))
                ->setRetsVersion('1.7.2');

        $config->setHttpAuthenticationMethod('basic');

        $rets = new \PHRETS\Session($config);

        $connect = $rets->Login();

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
                        // 'LFD_PropertyCondition_305',
                        'L_IdxInclude',
                    ]; 

        $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)|(L_StatusCatID=1),(L_IdxInclude=0,2)', ['Limit' => 1, 'Select' => $select]);

        dd($results);
        
        foreach ($results as $r) 
        {
            $objects = $rets->GetObject('Property', 'Photo', $r['L_ListingID'], '*',  1);

            $this->assertContains(".JPG", $objects[0]->getLocation());
        }

        
        $rets->Disconnect();
    }
}
