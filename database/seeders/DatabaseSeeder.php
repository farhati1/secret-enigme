<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'YoumnaM',
            'tel' => '+33698628273',
        ]);
        User::factory()->create([
            'name' => 'YoumnaS',
            'tel' => '+33766083746',
        ]);
        User::factory()->create([
            'name' => 'Esmat',
            'tel' => '+33744554517',
        ]);
        User::factory()->create([
            'name' => 'Chaima',
            'tel' => '+33767120473',
        ]);
        User::factory()->create([
            'name' => 'Mounira',
            'tel' => '+33646032117',
        ]);
        User::factory()->create([
            'name' => 'Djehane',
            'tel' => '+33663121633',
        ]);
        User::factory()->create([
        'name' => 'Djaddou',
            'tel' => '+336449201632',
    ]);
        User::factory()->create([
            'name' => 'Akram',
            'tel' => '+33695214075',
        ]);
        User::factory()->create([
            'name' => 'Zoubert',
            'tel' => '+33695185161',
        ]);
        User::factory()->create([
            'name' => 'Tadjwidi',
            'tel' => '+33767689168',
        ]);
        User::factory()->create([
            'name' => 'Nasfati',
            'tel' => '+33766828442',
        ]);
        User::factory()->create([
            'name' => 'Farhati',
            'tel' => '+33660059265',
        ]);


    }
}
