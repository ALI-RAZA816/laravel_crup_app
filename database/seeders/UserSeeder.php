<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(path:'database/json/users.json');
        $data = collect(json_decode($json));

        $data->each(function($item){
            Users::create([
                'name'=>$item->name,
                'email'=>$item->email,
                'phone'=>$item->phone,
                'role'=>$item->role,
            ]);
        });
    }
}
