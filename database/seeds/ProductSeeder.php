<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        $datas = DB::table('users')->where('user_type', 1)->get();
//        foreach($datas as $data) {
//            DB::table('company')->insert([
//                'product_name' => Str::random(10),
//                'supplier_name' => $data->name,
//                'received_date' => date("Y-m-d H:i:s"),
//            ]);
//        }
        $datas = DB::table('users')->where('user_type', 0)->get();
        foreach($datas as $data) {
            DB::table('supplier')->insert([
                'product_name' => Str::random(10),
                'company_name' => $data->name,
            ]);
        }
    }
}
