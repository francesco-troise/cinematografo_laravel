<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $this->resetTables();

            $roleIds = $this->seedRoles();
            $genreIds = $this->seedGenres();
            $peopleIds = $this->seedPeople();
            $movieIds = $this->seedMovies();

            $this->seedMovieGenres($movieIds, $genreIds);
            $this->seedMoviePeople($movieIds, $peopleIds, $roleIds);
        });
    }

    private function resetTables(): void
    {
        DB::table('movie_person')->delete();
        DB::table('genre_movie')->delete();
        DB::table('movies')->delete();
        DB::table('people')->delete();
        DB::table('roles')->delete();
        DB::table('genres')->delete();
    }

    private function seedRoles(): array
    {
        $now = now();

        $roles = [
            ['name' => 'Regista'],
            ['name' => 'Protagonista'],
            ['name' => 'Co-protagonista'],
            ['name' => 'Comparsa'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->insert([
                'name' => $role['name'],
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        return DB::table('roles')->pluck('id', 'name')->all();
    }

    private function seedGenres(): array
    {
        $now = now();

        $genres = [
            'Science Fiction' => 'Storie ambientate in scenari futuristici o basate su concetti scientifici speculativi.',
            'Thriller'        => 'Narrazioni ad alta tensione, suspense e ritmo incalzante.',
            'Drama'           => 'Film centrati su conflitti emotivi, relazioni e sviluppo dei personaggi.',
            'Action'          => 'Opere con forte presenza di sequenze dinamiche, inseguimenti e combattimenti.',
            'Crime'           => 'Storie legate a criminalità, indagini, mafia e contesti illegali.',
            'Adventure'       => 'Film incentrati su viaggio, scoperta ed esplorazione.',
            'Romance'         => 'Narrazioni con forte componente sentimentale e relazionale.',
            'Fantasy'         => 'Storie con elementi immaginari, magici o mitologici.',
        ];

        foreach ($genres as $name => $description) {
            DB::table('genres')->insert([
                'name' => $name,
                'description' => $description,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        return DB::table('genres')->pluck('id', 'name')->all();
    }

    private function seedPeople(): array
    {
        $now = now();

       $people = [
    // Inception / Nolan universe
    'christopher_nolan' => [
        'name' => 'Christopher',
        'last_name' => 'Nolan',
        'gender' => 'M',
        'date_of_birth' => '1970-07-30',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Christopher_Nolan.jpg',
    ],
    'leonardo_dicaprio' => [
        'name' => 'Leonardo',
        'last_name' => 'DiCaprio',
        'gender' => 'M',
        'date_of_birth' => '1974-11-11',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Leonardo_DiCaprio.jpg',
    ],
    'joseph_gordon_levitt' => [
        'name' => 'Joseph',
        'last_name' => 'Gordon-Levitt',
        'gender' => 'M',
        'date_of_birth' => '1981-02-17',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Joseph_Gordon_Levitt.jpg',
    ],
    'tom_hardy' => [
        'name' => 'Tom',
        'last_name' => 'Hardy',
        'gender' => 'M',
        'date_of_birth' => '1977-09-15',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Tom_Hardy.jpg',
    ],
    'marion_cotillard' => [
        'name' => 'Marion',
        'last_name' => 'Cotillard',
        'gender' => 'F',
        'date_of_birth' => '1975-09-30',
        'nationality' => 'FR',
        'url_image' => 'storage/images/people/Marion_Cotillard.jpg',
    ],

    // The Dark Knight / Interstellar
    'christian_bale' => [
        'name' => 'Christian',
        'last_name' => 'Bale',
        'gender' => 'M',
        'date_of_birth' => '1974-01-30',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Christian_Bale.jpg',
    ],
    'heath_ledger' => [
        'name' => 'Heath',
        'last_name' => 'Ledger',
        'gender' => 'M',
        'date_of_birth' => '1979-04-04',
        'nationality' => 'AU',
        'url_image' => 'storage/images/people/Heath_Ledger.jpg',
    ],
    'michael_caine' => [
        'name' => 'Michael',
        'last_name' => 'Caine',
        'gender' => 'M',
        'date_of_birth' => '1933-03-14',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Michael_Caine.jpg',
    ],
    'matthew_mcconaughey' => [
        'name' => 'Matthew',
        'last_name' => 'McConaughey',
        'gender' => 'M',
        'date_of_birth' => '1969-11-04',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Matthew_McConaughey.jpg',
    ],
    'anne_hathaway' => [
        'name' => 'Anne',
        'last_name' => 'Hathaway',
        'gender' => 'F',
        'date_of_birth' => '1982-11-12',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Anne_Hathaway.jpg',
    ],
    'jessica_chastain' => [
        'name' => 'Jessica',
        'last_name' => 'Chastain',
        'gender' => 'F',
        'date_of_birth' => '1977-03-24',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Jessica_Chastain.jpg',
    ],

    // Classic crime / drama
    'frank_darabont' => [
        'name' => 'Frank',
        'last_name' => 'Darabont',
        'gender' => 'M',
        'date_of_birth' => '1959-01-28',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Frank_Darabont.jpg',
    ],
    'tim_robbins' => [
        'name' => 'Tim',
        'last_name' => 'Robbins',
        'gender' => 'M',
        'date_of_birth' => '1958-10-16',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Tim_Robbins.jpg',
    ],
    'morgan_freeman' => [
        'name' => 'Morgan',
        'last_name' => 'Freeman',
        'gender' => 'M',
        'date_of_birth' => '1937-06-01',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Morgan_Freeman.jpg',
    ],
    'bob_gunton' => [
        'name' => 'Bob',
        'last_name' => 'Gunton',
        'gender' => 'M',
        'date_of_birth' => '1945-11-15',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Bob_Gunton.jpg',
    ],

    'quentin_tarantino' => [
        'name' => 'Quentin',
        'last_name' => 'Tarantino',
        'gender' => 'M',
        'date_of_birth' => '1963-03-27',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Quentin_Tarantino.jpg',
    ],
    'john_travolta' => [
        'name' => 'John',
        'last_name' => 'Travolta',
        'gender' => 'M',
        'date_of_birth' => '1954-02-18',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/John_Travolta.jpg',
    ],
    'uma_thurman' => [
        'name' => 'Uma',
        'last_name' => 'Thurman',
        'gender' => 'F',
        'date_of_birth' => '1970-04-29',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Uma_Thurman.jpg',
    ],
    'samuel_jackson' => [
        'name' => 'Samuel L.',
        'last_name' => 'Jackson',
        'gender' => 'M',
        'date_of_birth' => '1948-12-21',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Samuel_L_Jackson.jpg',
    ],

    'francis_ford_coppola' => [
        'name' => 'Francis Ford',
        'last_name' => 'Coppola',
        'gender' => 'M',
        'date_of_birth' => '1939-04-07',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Francis_Ford_Coppola.jpg',
    ],
    'al_pacino' => [
        'name' => 'Al',
        'last_name' => 'Pacino',
        'gender' => 'M',
        'date_of_birth' => '1940-04-25',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Al_Pacino.jpg',
    ],
    'marlon_brando' => [
        'name' => 'Marlon',
        'last_name' => 'Brando',
        'gender' => 'M',
        'date_of_birth' => '1924-04-03',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Marlon_Brando.jpg',
    ],
    'diane_keaton' => [
        'name' => 'Diane',
        'last_name' => 'Keaton',
        'gender' => 'F',
        'date_of_birth' => '1946-01-05',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Diane_Keaton.jpg',
    ],

    // Fight Club
    'david_fincher' => [
        'name' => 'David',
        'last_name' => 'Fincher',
        'gender' => 'M',
        'date_of_birth' => '1962-08-28',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/David_Fincher.jpg',
    ],
    'brad_pitt' => [
        'name' => 'Brad',
        'last_name' => 'Pitt',
        'gender' => 'M',
        'date_of_birth' => '1963-12-18',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Brad_Pitt.jpg',
    ],
    'edward_norton' => [
        'name' => 'Edward',
        'last_name' => 'Norton',
        'gender' => 'M',
        'date_of_birth' => '1969-08-18',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Edward_Norton.jpg',
    ],
    'helena_bonham_carter' => [
        'name' => 'Helena',
        'last_name' => 'Bonham Carter',
        'gender' => 'F',
        'date_of_birth' => '1966-05-26',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Helena_Bonham_Carter.jpg',
    ],

    // The Matrix
    'lana_wachowski' => [
        'name' => 'Lana',
        'last_name' => 'Wachowski',
        'gender' => 'F',
        'date_of_birth' => '1965-06-21',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Lana_Wachowski.jpg',
    ],
    'keanu_reeves' => [
        'name' => 'Keanu',
        'last_name' => 'Reeves',
        'gender' => 'M',
        'date_of_birth' => '1964-09-02',
        'nationality' => 'CA',
        'url_image' => 'storage/images/people/Keanu_Reeves.jpg',
    ],
    'laurence_fishburne' => [
        'name' => 'Laurence',
        'last_name' => 'Fishburne',
        'gender' => 'M',
        'date_of_birth' => '1961-07-30',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Laurence_Fishburne.jpg',
    ],
    'carrie_anne_moss' => [
        'name' => 'Carrie-Anne',
        'last_name' => 'Moss',
        'gender' => 'F',
        'date_of_birth' => '1967-08-21',
        'nationality' => 'CA',
        'url_image' => 'storage/images/people/Carrie_Anne_Moss.jpg',
    ],

    // Parasite
    'bong_joon_ho' => [
        'name' => 'Bong Joon',
        'last_name' => 'Ho',
        'gender' => 'M',
        'date_of_birth' => '1969-09-14',
        'nationality' => 'KR',
        'url_image' => 'storage/images/people/Bong_Joon_Ho.jpg',
    ],
    'song_kang_ho' => [
        'name' => 'Song',
        'last_name' => 'Kang-ho',
        'gender' => 'M',
        'date_of_birth' => '1967-01-17',
        'nationality' => 'KR',
        'url_image' => 'storage/images/people/Song_Kang_ho.jpg',
    ],
    'cho_yeo_jeong' => [
        'name' => 'Cho',
        'last_name' => 'Yeo-jeong',
        'gender' => 'F',
        'date_of_birth' => '1981-02-10',
        'nationality' => 'KR',
        'url_image' => 'storage/images/people/Cho_Yeo_jeong.jpg',
    ],
    'lee_sun_kyun' => [
        'name' => 'Lee',
        'last_name' => 'Sun-kyun',
        'gender' => 'M',
        'date_of_birth' => '1975-03-02',
        'nationality' => 'KR',
        'url_image' => 'storage/images/people/Lee_Sun_kyun.jpg',
    ],

    // La La Land
    'damien_chazelle' => [
        'name' => 'Damien',
        'last_name' => 'Chazelle',
        'gender' => 'M',
        'date_of_birth' => '1985-01-19',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Damien_Chazelle.jpeg',
    ],
    'ryan_gosling' => [
        'name' => 'Ryan',
        'last_name' => 'Gosling',
        'gender' => 'M',
        'date_of_birth' => '1980-11-12',
        'nationality' => 'CA',
        'url_image' => 'storage/images/people/Ryan_Gosling.jpg',
    ],
    'emma_stone' => [
        'name' => 'Emma',
        'last_name' => 'Stone',
        'gender' => 'F',
        'date_of_birth' => '1988-11-06',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Emma_Stone.jpg',
    ],
    'john_legend' => [
        'name' => 'John',
        'last_name' => 'Legend',
        'gender' => 'M',
        'date_of_birth' => '1978-12-28',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/John_Legend.jpg',
    ],

    // Jurassic Park
    'steven_spielberg' => [
        'name' => 'Steven',
        'last_name' => 'Spielberg',
        'gender' => 'M',
        'date_of_birth' => '1946-12-18',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Steven_Spielberg.jpg',
    ],
    'sam_neill' => [
        'name' => 'Sam',
        'last_name' => 'Neill',
        'gender' => 'M',
        'date_of_birth' => '1947-09-14',
        'nationality' => 'NZ',
        'url_image' => 'storage/images/people/Sam_Neill.jpg',
    ],
    'laura_dern' => [
        'name' => 'Laura',
        'last_name' => 'Dern',
        'gender' => 'F',
        'date_of_birth' => '1967-02-10',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Laura_Dern.jpg',
    ],
    'jeff_goldblum' => [
        'name' => 'Jeff',
        'last_name' => 'Goldblum',
        'gender' => 'M',
        'date_of_birth' => '1952-10-22',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Jeff_Goldblum.jpg',
    ],

    // Titanic
    'james_cameron' => [
        'name' => 'James',
        'last_name' => 'Cameron',
        'gender' => 'M',
        'date_of_birth' => '1954-08-16',
        'nationality' => 'CA',
        'url_image' => 'storage/images/people/James_Cameron.jpg',
    ],
    'kate_winslet' => [
        'name' => 'Kate',
        'last_name' => 'Winslet',
        'gender' => 'F',
        'date_of_birth' => '1975-10-05',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Kate_Winslet.jpg',
    ],
    'billy_zane' => [
        'name' => 'Billy',
        'last_name' => 'Zane',
        'gender' => 'M',
        'date_of_birth' => '1966-02-24',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Billy_Zane.jpg',
    ],
    'frances_fisher' => [
        'name' => 'Frances',
        'last_name' => 'Fisher',
        'gender' => 'F',
        'date_of_birth' => '1952-05-11',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Frances_Fisher.jpg',
    ],

    // Gladiator
    'ridley_scott' => [
        'name' => 'Ridley',
        'last_name' => 'Scott',
        'gender' => 'M',
        'date_of_birth' => '1937-11-30',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Ridley_Scott.jpg',
    ],
    'russell_crowe' => [
        'name' => 'Russell',
        'last_name' => 'Crowe',
        'gender' => 'M',
        'date_of_birth' => '1964-04-07',
        'nationality' => 'NZ',
        'url_image' => 'storage/images/people/Russell_Crowe.jpg',
    ],
    'joaquin_phoenix' => [
        'name' => 'Joaquin',
        'last_name' => 'Phoenix',
        'gender' => 'M',
        'date_of_birth' => '1974-10-28',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Joaquin_Phoenix.jpg',
    ],
    'connie_nielsen' => [
        'name' => 'Connie',
        'last_name' => 'Nielsen',
        'gender' => 'F',
        'date_of_birth' => '1965-07-03',
        'nationality' => 'DK',
        'url_image' => 'storage/images/people/Connie_Nielsen.jpg',
    ],

    // The Lord of the Rings
    'peter_jackson' => [
        'name' => 'Peter',
        'last_name' => 'Jackson',
        'gender' => 'M',
        'date_of_birth' => '1961-10-31',
        'nationality' => 'NZ',
        'url_image' => 'storage/images/people/Peter_Jackson.jpg',
    ],
    'elijah_wood' => [
        'name' => 'Elijah',
        'last_name' => 'Wood',
        'gender' => 'M',
        'date_of_birth' => '1981-01-28',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Elijah_Wood.jpg',
    ],
    'ian_mckellen' => [
        'name' => 'Ian',
        'last_name' => 'McKellen',
        'gender' => 'M',
        'date_of_birth' => '1939-05-25',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Ian_McKellen.jpg',
    ],
    'orlando_bloom' => [
        'name' => 'Orlando',
        'last_name' => 'Bloom',
        'gender' => 'M',
        'date_of_birth' => '1977-01-13',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Orlando_Bloom.jpg',
    ],

    // The Silence of the Lambs
    'jonathan_demme' => [
        'name' => 'Jonathan',
        'last_name' => 'Demme',
        'gender' => 'M',
        'date_of_birth' => '1944-02-22',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Jonathan_Demme.jpg',
    ],
    'jodie_foster' => [
        'name' => 'Jodie',
        'last_name' => 'Foster',
        'gender' => 'F',
        'date_of_birth' => '1962-11-19',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Jodie_Foster.jpg',
    ],
    'anthony_hopkins' => [
        'name' => 'Anthony',
        'last_name' => 'Hopkins',
        'gender' => 'M',
        'date_of_birth' => '1937-12-31',
        'nationality' => 'GB',
        'url_image' => 'storage/images/people/Anthony_Hopkins.jpg',
    ],
    'ted_levine' => [
        'name' => 'Ted',
        'last_name' => 'Levine',
        'gender' => 'M',
        'date_of_birth' => '1957-05-29',
        'nationality' => 'US',
        'url_image' => 'storage/images/people/Ted_Levine.jpg',
    ],
];

        $faker = Faker::create('en_US');
        $faker->seed(4242);

        $nationalities = ['US', 'GB', 'CA', 'FR', 'IT', 'JP', 'AU', 'KR', 'IE', 'NZ', 'DK', 'DE', 'ES'];

        for ($i = 1; $i <= 15; $i++) {
            $key = sprintf('extra_%02d', $i);

            $people[$key] = [
                'name' => $faker->firstName(),
                'last_name' => $faker->lastName(),
                'gender' => $faker->randomElement(['M', 'F', 'O', 'U']),
                'date_of_birth' => $faker->dateTimeBetween('-70 years', '-18 years')->format('Y-m-d'),
                'nationality' => $faker->randomElement($nationalities),
                'url_image' => null,
            ];
        }

        $ids = [];

        foreach ($people as $key => $data) {
            $ids[$key] = DB::table('people')->insertGetId(array_merge($data, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        return $ids;
    }

    private function seedMovies(): array
    {
        $now = now();

        $movies = [
            'inception' => [
                'title' => 'Inception',
                'duration' => 148,
                'url_poster' => 'storage/images/movies/inception.jpg',
                'pegi' => 13,
            ],
            'dark_knight' => [
                'title' => 'The Dark Knight',
                'duration' => 152,
                'url_poster' => 'storage/images/movies/dark_knight.jpg',
                'pegi' => 13,
            ],
            'interstellar' => [
                'title' => 'Interstellar',
                'duration' => 169,
                'url_poster' => 'storage/images/movies/interstellar.jpg',
                'pegi' => 13,
            ],
            'shawshank' => [
                'title' => 'The Shawshank Redemption',
                'duration' => 142,
                'url_poster' => 'storage/images/movies/shawshank.jpg',
                'pegi' => 16,
            ],
            'pulp_fiction' => [
                'title' => 'Pulp Fiction',
                'duration' => 154,
                'url_poster' => 'storage/images/movies/pulp_fiction.jpg',
                'pegi' => 18,
            ],
            'godfather' => [
                'title' => 'The Godfather',
                'duration' => 175,
                'url_poster' => 'storage/images/movies/godfather.jpg',
                'pegi' => 18,
            ],
            'fight_club' => [
                'title' => 'Fight Club',
                'duration' => 139,
                'url_poster' => 'storage/images/movies/fight_club.jpg',
                'pegi' => 18,
            ],
            'matrix' => [
                'title' => 'The Matrix',
                'duration' => 136,
                'url_poster' => 'storage/images/movies/matrix.jpg',
                'pegi' => 14,
            ],
            'parasite' => [
                'title' => 'Parasite',
                'duration' => 132,
                'url_poster' => 'storage/images/movies/parasite.jpg',
                'pegi' => 14,
            ],
            'la_la_land' => [
                'title' => 'La La Land',
                'duration' => 128,
                'url_poster' => 'storage/images/movies/la_la_land.jpg',
                'pegi' => 12,
            ],
            'jurassic_park' => [
                'title' => 'Jurassic Park',
                'duration' => 127,
                'url_poster' => 'storage/images/movies/jurassic_park.jpeg',
                'pegi' => 12,
            ],
            'titanic' => [
                'title' => 'Titanic',
                'duration' => 194,
                'url_poster' => 'storage/images/movies/titanic.jpg',
                'pegi' => 12,
            ],
            'gladiator' => [
                'title' => 'Gladiator',
                'duration' => 155,
                'url_poster' => 'storage/images/movies/gladiator.jpg',
                'pegi' => 16,
            ],
            'lotr_fellowship' => [
                'title' => 'The Lord of the Rings: The Fellowship of the Ring',
                'duration' => 178,
                'url_poster' => 'storage/images/movies/lotr_fellowship.jpg',
                'pegi' => 12,
            ],
            'silence_lambs' => [
                'title' => 'The Silence of the Lambs',
                'duration' => 118,
                'url_poster' => 'storage/images/movies/silence_lambs.jpg',
                'pegi' => 18,
            ],
        ];

        $ids = [];

        foreach ($movies as $key => $movie) {
            $ids[$key] = DB::table('movies')->insertGetId(array_merge($movie, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        return $ids;
    }

    private function seedMovieGenres(array $movieIds, array $genreIds): void
    {
        $now = now();

        $movieGenres = [
            'inception' => ['Science Fiction', 'Thriller', 'Action'],
            'dark_knight' => ['Action', 'Crime', 'Drama'],
            'interstellar' => ['Science Fiction', 'Adventure', 'Drama'],
            'shawshank' => ['Drama', 'Crime'],
            'pulp_fiction' => ['Crime', 'Drama', 'Thriller'],
            'godfather' => ['Crime', 'Drama'],
            'fight_club' => ['Drama', 'Thriller'],
            'matrix' => ['Science Fiction', 'Action'],
            'parasite' => ['Thriller', 'Drama'],
            'la_la_land' => ['Romance', 'Drama'],
            'jurassic_park' => ['Adventure', 'Science Fiction'],
            'titanic' => ['Romance', 'Drama'],
            'gladiator' => ['Action', 'Drama'],
            'lotr_fellowship' => ['Adventure', 'Fantasy'],
            'silence_lambs' => ['Thriller', 'Crime'],
        ];

        foreach ($movieGenres as $movieKey => $genres) {
            foreach ($genres as $genreName) {
                DB::table('genre_movie')->insert([
                    'genre_id' => $genreIds[$genreName],
                    'movie_id' => $movieIds[$movieKey],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }

    private function seedMoviePeople(array $movieIds, array $peopleIds, array $roleIds): void
    {
        $now = now();

        $moviePeople = [
            'inception' => [
                ['person' => 'christopher_nolan', 'role' => 'Regista'],
                ['person' => 'leonardo_dicaprio', 'role' => 'Protagonista'],
                ['person' => 'joseph_gordon_levitt', 'role' => 'Co-protagonista'],
                ['person' => 'tom_hardy', 'role' => 'Co-protagonista'],
                ['person' => 'marion_cotillard', 'role' => 'Co-protagonista'],
                ['person' => 'extra_01', 'role' => 'Comparsa'],
            ],
            'dark_knight' => [
                ['person' => 'christopher_nolan', 'role' => 'Regista'],
                ['person' => 'christian_bale', 'role' => 'Protagonista'],
                ['person' => 'heath_ledger', 'role' => 'Co-protagonista'],
                ['person' => 'michael_caine', 'role' => 'Co-protagonista'],
                ['person' => 'extra_02', 'role' => 'Comparsa'],
            ],
            'interstellar' => [
                ['person' => 'christopher_nolan', 'role' => 'Regista'],
                ['person' => 'matthew_mcconaughey', 'role' => 'Protagonista'],
                ['person' => 'anne_hathaway', 'role' => 'Co-protagonista'],
                ['person' => 'jessica_chastain', 'role' => 'Co-protagonista'],
                ['person' => 'extra_03', 'role' => 'Comparsa'],
            ],
            'shawshank' => [
                ['person' => 'frank_darabont', 'role' => 'Regista'],
                ['person' => 'tim_robbins', 'role' => 'Protagonista'],
                ['person' => 'morgan_freeman', 'role' => 'Co-protagonista'],
                ['person' => 'bob_gunton', 'role' => 'Co-protagonista'],
                ['person' => 'extra_04', 'role' => 'Comparsa'],
            ],
            'pulp_fiction' => [
                ['person' => 'quentin_tarantino', 'role' => 'Regista'],
                ['person' => 'john_travolta', 'role' => 'Protagonista'],
                ['person' => 'uma_thurman', 'role' => 'Co-protagonista'],
                ['person' => 'samuel_jackson', 'role' => 'Co-protagonista'],
                ['person' => 'extra_05', 'role' => 'Comparsa'],
            ],
            'godfather' => [
                ['person' => 'francis_ford_coppola', 'role' => 'Regista'],
                ['person' => 'al_pacino', 'role' => 'Protagonista'],
                ['person' => 'marlon_brando', 'role' => 'Co-protagonista'],
                ['person' => 'diane_keaton', 'role' => 'Co-protagonista'],
                ['person' => 'extra_06', 'role' => 'Comparsa'],
            ],
            'fight_club' => [
                ['person' => 'david_fincher', 'role' => 'Regista'],
                ['person' => 'brad_pitt', 'role' => 'Protagonista'],
                ['person' => 'edward_norton', 'role' => 'Co-protagonista'],
                ['person' => 'helena_bonham_carter', 'role' => 'Co-protagonista'],
                ['person' => 'extra_07', 'role' => 'Comparsa'],
            ],
            'matrix' => [
                ['person' => 'lana_wachowski', 'role' => 'Regista'],
                ['person' => 'keanu_reeves', 'role' => 'Protagonista'],
                ['person' => 'laurence_fishburne', 'role' => 'Co-protagonista'],
                ['person' => 'carrie_anne_moss', 'role' => 'Co-protagonista'],
                ['person' => 'extra_08', 'role' => 'Comparsa'],
            ],
            'parasite' => [
                ['person' => 'bong_joon_ho', 'role' => 'Regista'],
                ['person' => 'song_kang_ho', 'role' => 'Protagonista'],
                ['person' => 'cho_yeo_jeong', 'role' => 'Co-protagonista'],
                ['person' => 'lee_sun_kyun', 'role' => 'Co-protagonista'],
                ['person' => 'extra_09', 'role' => 'Comparsa'],
            ],
            'la_la_land' => [
                ['person' => 'damien_chazelle', 'role' => 'Regista'],
                ['person' => 'ryan_gosling', 'role' => 'Protagonista'],
                ['person' => 'emma_stone', 'role' => 'Co-protagonista'],
                ['person' => 'john_legend', 'role' => 'Co-protagonista'],
                ['person' => 'extra_10', 'role' => 'Comparsa'],
            ],
            'jurassic_park' => [
                ['person' => 'steven_spielberg', 'role' => 'Regista'],
                ['person' => 'sam_neill', 'role' => 'Protagonista'],
                ['person' => 'laura_dern', 'role' => 'Co-protagonista'],
                ['person' => 'jeff_goldblum', 'role' => 'Co-protagonista'],
                ['person' => 'extra_11', 'role' => 'Comparsa'],
            ],
            'titanic' => [
                ['person' => 'james_cameron', 'role' => 'Regista'],
                ['person' => 'leonardo_dicaprio', 'role' => 'Protagonista'],
                ['person' => 'kate_winslet', 'role' => 'Co-protagonista'],
                ['person' => 'billy_zane', 'role' => 'Co-protagonista'],
                ['person' => 'frances_fisher', 'role' => 'Comparsa'],
                ['person' => 'extra_12', 'role' => 'Comparsa'],
            ],
            'gladiator' => [
                ['person' => 'ridley_scott', 'role' => 'Regista'],
                ['person' => 'russell_crowe', 'role' => 'Protagonista'],
                ['person' => 'joaquin_phoenix', 'role' => 'Co-protagonista'],
                ['person' => 'connie_nielsen', 'role' => 'Co-protagonista'],
                ['person' => 'extra_13', 'role' => 'Comparsa'],
            ],
            'lotr_fellowship' => [
                ['person' => 'peter_jackson', 'role' => 'Regista'],
                ['person' => 'elijah_wood', 'role' => 'Protagonista'],
                ['person' => 'ian_mckellen', 'role' => 'Co-protagonista'],
                ['person' => 'orlando_bloom', 'role' => 'Co-protagonista'],
                ['person' => 'extra_14', 'role' => 'Comparsa'],
            ],
            'silence_lambs' => [
                ['person' => 'jonathan_demme', 'role' => 'Regista'],
                ['person' => 'jodie_foster', 'role' => 'Protagonista'],
                ['person' => 'anthony_hopkins', 'role' => 'Co-protagonista'],
                ['person' => 'ted_levine', 'role' => 'Co-protagonista'],
                ['person' => 'extra_15', 'role' => 'Comparsa'],
            ],
        ];

        foreach ($moviePeople as $movieKey => $assignments) {
            foreach ($assignments as $assignment) {
                DB::table('movie_person')->insert([
                    'movie_id' => $movieIds[$movieKey],
                    'person_id' => $peopleIds[$assignment['person']],
                    'role_id' => $roleIds[$assignment['role']],
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}