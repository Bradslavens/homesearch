<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

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
        $config->setLoginUrl('https://rets-paragon.sandicor.com/rets/fnisrets.aspx/SANDICOR/login?rets-version=RETS/1.7.2')
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

        $objects = $rets->GetObject('Property', 'Photo', '00-1669', '*', 1);
        // var_dump($objects);

        $fields = $rets->GetTableMetadata('Property', 'RE_1');

    }

    public function testPHRetsSearch()
    {

        $config = new \PHRETS\Configuration;
        $config->setLoginUrl('https://rets-paragon.sandicor.com/rets/fnisrets.aspx/SANDICOR/login?rets-version=RETS/1.7.2')
                ->setUsername(env('RETS_USER'))
                ->setPassword(env('RETS_PASS'))
                ->setRetsVersion('1.7.2');

        $config->setHttpAuthenticationMethod('basic');

        $rets = new \PHRETS\Session($config);

        $connect = $rets->Login();

        $results = $rets->Search('Property', 'RE_1', '(ListPrice=5000000+)', ['Limit' => 3, 'Select' => 'L_AddressStreet']);
        
        foreach ($results as $r) 
        {
            var_dump($r['L_AddressStreet']);
        }
    }
}
