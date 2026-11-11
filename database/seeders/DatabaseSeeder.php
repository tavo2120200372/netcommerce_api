<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Akira',
            'email' => 'Aki@Netcom.com',
        ]);

        $companies = Company::factory()->count(3)->sequence(
            ['name' => 'NetCommerce'],
            ['name' => 'TechSolutions'],
            ['name' => 'SoftDev']
        )->create();

        $tasks = Task::factory()->count(2)->sequence(['name' => 'task 1'], ['name' => 'task 2'])->for($companies->first(), 'company')->for($user, 'user')->create();
    }
}
