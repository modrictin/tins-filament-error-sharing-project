<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\SimpleModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<2;$i++){
            SimpleModel::create([
                'from'=>now()->addDays($i+1),
                'to'=>now()->addDays($i+2),
                'exact_date'=>now()->addDays($i+3),
            ]);
        }

    }
}
