<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker; // for dummy data.
use Carbon\Carbon as Carbon; // for date and time.
use Illuminate\Support\Facades\Hash;  // password hash.

class SubShareRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            $title = array('Artist','Audio Engineer','Producer','Recording Artist','Song Writers','Music Publisher','Executive Producer');
            $status = array('Active','Pending','Decline');

            foreach ($title as $title)
            {

              DB::table('subshare_roles')->insert([

                    'title' =>  $title,
                    'status' => $status[array_rand($status)],
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                    'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

                ]);

            }

    }
}
