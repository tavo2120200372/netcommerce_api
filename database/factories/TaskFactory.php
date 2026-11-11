<?php

namespace Database\Factories;

use App\Models\Task;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => fake()->words(3, true),
        'description' => 'task content',
        'company_id' => Company::factory(),
        'user_id' => User::factory(),
        'is_completed' => fake()->boolean(),
        'start_at' => fake()->dateTimeBetween('-1 month', 'now'),
        'expired_at' => null
        ];
    }
}
