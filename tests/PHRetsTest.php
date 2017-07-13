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

        $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)|(L_StatusCatID=1),(L_IdxInclude=0,2)', ['Limit' => 1, 'Select' => ['L_ListingID', 'L_AskingPrice', 'L_IdxInclude', 'L_StatusCatID' ]]);
        
        foreach ($results as $r) 
        {
            $objects = $rets->GetObject('Property', 'Photo', $r['L_ListingID'], '*',  1);

            $this->assertContains(".JPG", $objects[0]->getLocation());
        }

        
        $rets->Disconnect();
    }
}
