<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuario = new User();
        $usuario->name='carlitos';
        $usuario->email='wi1406375@outlook.com';
        $usuario->password='charmina112';
        $usuario->save();
    }
}
