<?php

use Illuminate\Database\Seeder;

class WarehouseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('st_warehouse')
          ->insert(array(
                    array('name'=>'HQ', 'address'=> 'Jl. Palmerah Barat', 'flag_status' => ''),
                ));
    }
}
