<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker; // for dummy data.
use Carbon\Carbon as Carbon; // for date and time.
use Illuminate\Support\Facades\Hash;  // password hash.


class DatabaseSeeder extends Seeder
{
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
			// Role comes before User seeder here.
			$this->call(RoleTableSeeder::class);

			// User seeder will use the roles above created.
			$this->call(UserTableSeeder::class);

          // $this->call(UsersTableSeeder::class);
          $this->subshareTable();
          $this->uploadsTable();  // tracks table dummy data.
          $this->transactionsTable();  // tracks table dummy data.
          $this->playlistTable();  // tracks table dummy data.
          // $this->UsersTable();  // tracks table dummy data.
      }


      public function playlistTable()
      {
          $playlist = array('Babymaking Music','Lessons & Experiences','All time Favorites','House Music','On the Road Again','Angel Flights and Glitter','Guitars and Tears','Hanging 10 with Moon Doggie');

           $faker = Faker::create();
            foreach (range(1,30) as $index)
            {
              $percentage = $faker->randomDigit."%";
              DB::table('playlists')->insert([

                'user_id'    => $faker->randomNumber,
                'name'       => $playlist[array_rand($playlist)],

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);
             }
      }

      public function transactionsTable()
      {

            $invoiceTitle = array("Membership annual fee", "Membership weekly fee", "Membership monthly fee");
            $status = array('0', '1');

            $faker = Faker::create();
            foreach (range(1,30) as $index)
            {
              $percentage = $faker->randomDigit."%";
              DB::table('transactions')->insert([

                'user_id'        => $faker->randomNumber,
                'title'          => $invoiceTitle[array_rand($invoiceTitle)],
                'invoiceNumber'  => $faker->randomNumber,
                'details'        => $invoiceTitle[array_rand($invoiceTitle)] . " has been paid for the month of " . $faker->monthName($max = 'now'),
                'currency'       => $faker->currencyCode,
                'amount'         => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 8),
                'status'         => $status[array_rand($status)],
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);
             }
      }

      public function uploadsTable()
      {

            $input_status = array("1", "0"); // random status.
            $tags = array("Need Help", "Good", "Need Improvement"); // random status.
            $genre = array("Rock", "Pop", "Jazz","Blues","Country Music","Clasic Music"); // random status.
            $files = array("mymusic.mp3", "localmusic.mp4", "classicmusic.mp3","classicmusic.mp4"); // random status.
            $tracks = array('Back in the Saddle','Seasons of Wither','Living on the Edge','Beautiful','Gotta Go','Grace Like Rain','Faded','Debonair ','Gentlemen ','If I Were Going');


            $faker = Faker::create();
            foreach (range(1,30) as $index)
            {
              $percentage = $faker->randomDigit;
              DB::table('uploads')->insert([
                'file_name'           => $files[array_rand($files)],
                'song_name'           => $tracks[array_rand($tracks)],
                'duration'            => '',
                'user_id'             => $faker->randomNumber,

                'song_artist'         => '',
                'track_title'         => $tracks[array_rand($tracks)],
                'track_bpm'           => $faker->randomNumber,
                'track_genre'         => $genre[array_rand($genre)],
                'track_age'           => $faker->randomNumber,
                'track_percentage'    => $percentage,
                'track_inspiration'   => '',

                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);
             }

            // 'status'              => $input_status[array_rand($input_status)],
            // 'tags'                => $tags[array_rand($tags)],
      }


      public function subshareTable()
      {
            // Subshare database table.
            $tracks = array('Back in the Saddle','Seasons of Wither','Living on the Edge','Beautiful','Gotta Go','Grace Like Rain','Faded','Debonair ','Gentlemen ','If I Were Going');

            // Agrements
            $input_agrements = array(" is offering vocals to track ".$tracks[array_rand($tracks)]." for ", " is offering full vocals to track ".$tracks[array_rand($tracks)]." for ", " is offering vocals to track ".$tracks[array_rand($tracks)]." for ", " is offering vocals to track ".$tracks[array_rand($tracks)]." for ");

            // Status
            $input_status= array("Completed", "Pending", "Canceled"); // random status.

            // roles
            $roles= array("Producer", "Director", "Vocalist"); // random status.

            $faker = Faker::create();
            foreach (range(1,30) as $index)
            {
              $percentage = $faker->randomDigit."%";
              DB::table('subshare')->insert([
                'user_id'          => $faker->randomNumber,
                'track_id'         => $faker->randomNumber,
                'percentage'       => $percentage,
                'custom_agreement' => $faker->name . $input_agrements[array_rand($input_agrements)] .  $faker->randomDigit ."%" ,
                'status'           => $input_status[array_rand($input_status)],
                'roles'            => $roles[array_rand($roles)],         // roles.
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);
             }
      }


      public function UsersTable()
      {

              // Create Admin User.
              // DB::table('users')->insert([
              //   'email'           => "admin@admin.com",
              //   'first_name'      => "Subshare",
              //   'last_name'       => "Administrator",
              //   'password'        => "admin",
              //   'image'           => "",
              //   'token'           => "",
              //   'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
              //   'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
              //   'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
              // ]);


            $faker = Faker::create();
            foreach (range(1,30) as $index)
            {
              DB::table('users')->insert([
                'email'           => $faker->freeEmail,
                // 'first_name'      => $faker->firstNameMale,
                // 'last_name'       => $faker->lastName,
                // 'password'        => Hash::make("user123"),
                // 'password'        => "123",
                // 'image'           => "",
                // 'token'           => "",



                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'deleted_at' => Carbon::now()->format('Y-m-d H:i:s'),
              ]);
             }


      }
}