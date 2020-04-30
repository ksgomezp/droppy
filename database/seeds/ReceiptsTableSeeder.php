<?php

use Illuminate\Database\Seeder;
use App\Receipt;

class ReceiptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Receipt::class, 8)->create();
    }
}
