<?php

use App\Film;
use App\Geo;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        Model::unguard();

        $NUMBER_USERS = 5;

        $latitude = [
            -5.811914,
            -5.821626,
            -5.839130,
            -5.842120,
            -5.801140,
            -5.811430,
            -5.828402,
            -5.811301,
            -5.840302,
            -5.812410,
        ];

        $longitude = [
            -35.212368,
            -35.221813,
            -35.235454,
            -35.242454,
            -35.204454,
            -35.220054,
            -35.241451,
            -35.215454,
            -35.232054,
            -35.213442,
        ];

        for ($i = 0; $i < $NUMBER_USERS; $i++) {
            $user = new User([
                'name'     => $faker->name,
                'email'    => $faker->email,
                'password' => bcrypt('secret'),
            ]);

            $user->save();

            for ($j = 0; $j < $NUMBER_USERS; $j++) {
                $film = new Film([
                        'omdb'    => 'tt'.$faker->randomNumber(7),
                        'user_id' => $user->id,
                        'watched' => $faker->boolean(),
                    ]);

                $film->save();

                if ($j < ($NUMBER_USERS - 1)) {
                    $lat = $faker->randomElement($latitude);
                    $geo = $faker->randomElement($longitude);
                } else {
                    $lat = $latitude[0];
                    $geo = $longitude[0];
                }

                $geo = new Geo([
                    'lat'     => $lat,
                    'lng'     => $geo,
                    'film_id' => $film->id,
                ]);

                $geo->save();
            }
        }

        Model::reguard();
    }
}
