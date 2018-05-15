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
                    array('name'=>'Head Office', 'address'=> 'Jl. Palmerah Barat', 'slug'=>'head-office', 'flag_status' => ''),
                ));
    }
}
