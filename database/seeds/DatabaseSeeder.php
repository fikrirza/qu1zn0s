<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(WarehouseSeed::class);
        $this->call(UserSeed::class);
        $this->call(RoleSeed::class);
    }
}
