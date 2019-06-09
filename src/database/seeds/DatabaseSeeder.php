<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Tuupola\Base62;
use App\Models\URL;

class DatabaseSeeder extends Seeder
{

    public function getCode($longURL)
    {
        $base62 = new Base62();
        $hash = $base62->encode($longURL);
        $shortURL = $this->recursive($hash, 0);
        
        return $shortURL;
    }

    public function recursive($hash, $start){
        $shortURL = substr($hash, $start, 6);
        $url = URL::where('code', $shortURL)->first();
        if($url){
            return $this->recursive($hash, $start+6);
        }
        return $shortURL;
    }
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i=0; $i < 150; $i++) { 
            
            $url = $faker->url;
            $date = $faker->dateTimeBetween('-5 years','now');
            DB::table('urls')->insert([
                'originalURL' => $url,
                'created_at' => $date,
                'updated_at' => $date,
                'code' => $this->getCode($url),
                'clicks' => $faker->numberBetween(35, 15000),
                'NSFW' => $faker->boolean,
            ]);
        }
        
    }
}
