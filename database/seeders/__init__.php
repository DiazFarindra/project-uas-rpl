<?php

namespace Database\Seeders;

use App\Enums\UserType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class __init__ extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            [
                'type' => UserType::ADMIN->value,
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => '$2y$12$F.pfn8tZVBxdR8iKnRly7OPj.wb/7IPi.Ev2JJotWmBdXhDOqGYWi', // password
            ],
            [
                'type' => UserType::TEACHER->value,
                'name' => 'teacher',
                'email' => 'teacher@example.com',
                'password' => '$2y$12$F.pfn8tZVBxdR8iKnRly7OPj.wb/7IPi.Ev2JJotWmBdXhDOqGYWi', // password
            ],
            [
                'type' => UserType::STUDENT->value,
                'name' => 'student',
                'email' => 'student@example.com',
                'password' => '$2y$12$F.pfn8tZVBxdR8iKnRly7OPj.wb/7IPi.Ev2JJotWmBdXhDOqGYWi', // password
            ],
        ])->each(function ($user) {
            \App\Models\User::create($user);
        });
    }
}
