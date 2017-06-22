<?php

use Illuminate\Database\Seeder;

class PropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        factory(\App\Property::class, 100)->create()
            ->each(function ($p) {
                $p->images()->save(factory(\App\Image::class)->make(['link' => 'http://clv.h-cdn.co/assets/16/34/1471969019-gallery-1470750772-savannah-tumbleweed-0002.jpg']));
            });
    }
}
