<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'id' => '1',
            'name' => 'Dani Latumahina',
            'email' => 'danifct65@gmail.com',
            'password' => 'rootroot',
            'street' => 'Oldenzaalsestraat',
            'houseNumber' => '228',
            'zipcode' => '7557GC',
            'country' => 'The Netherlands',
            'phone' => '0612345678'
        ]);
    }
}
