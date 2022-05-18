<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       
        DB::table('tag')->insert(
            [
                [
                    "content"=>"React",
                    "colorcode"=>"#6DDAFB"
                ],
                [
                    "content" => "PHP",
                    "colorcode"=>"#8892BF"
                ],
                [
                    "content" => "SQL",
                    "colorcode"=>""
                ],
                [
                    "content" => "Nodejs",
                    "colorcode"=>"#43853D"
                ]
            ]
        );
    }
}
