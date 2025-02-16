<?php

namespace Database\Seeders;

use App\Enums\GenderEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Tests\Helpers;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'id' => Helpers::getId('male'),
            'gender' => GenderEnum::Male,
        ]);

        User::factory()->create([
            'id' => Helpers::getId('female'),
            'gender' => GenderEnum::Female,
        ]);
    }
}