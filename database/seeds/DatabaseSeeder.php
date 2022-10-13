<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Model\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET foreign_key_checks = 0');
        Client::truncate();
        $QtyClient=200;
        factory(App\Model\Client::class,$QtyClient)->create();
    }
}
