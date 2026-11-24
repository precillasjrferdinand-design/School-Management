<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Mathematics', 'English', 'Science', 'History', 'Computer Programming', 'Physical Education'] as $name) {
            Subject::firstOrCreate(['name' => $name]);
        }
    }
}
