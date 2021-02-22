<?php

namespace Database\Seeders;

use App\Models\TaskType;
use Illuminate\Database\Seeder;

class TaskTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //no need to check if it exists in db, not the point of the challange
        TaskType::create([
            'name' => "invoice_ops",

        ]);

        TaskType::create([
            'name' => "custom_ops",

        ]);
        TaskType::create([
            'name' => "common_ops",

        ]);

    }
}
