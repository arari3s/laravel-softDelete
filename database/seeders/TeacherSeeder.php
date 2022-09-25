<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        // insert data ke table pegawai menggunakan Faker
        for ($i = 1; $i <= 50; $i++) {
            DB::table('teachers')->insert([
                'name' => $faker->name(),
                'address' => $faker->address(),
            ]);
        }
    }
}
