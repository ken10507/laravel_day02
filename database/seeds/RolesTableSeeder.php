<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            ['role_name' => '一般会員'],
            ['role_name' => 'プレミア会員'],
            ['role_name' => '退会希望者'],
            ['role_name' => '退会済み'],
        ]);







    }
}
