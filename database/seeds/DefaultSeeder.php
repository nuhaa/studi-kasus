<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Permission;
use App\Models\Role;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([[
          'name' => 'Muhammad Ulin Nuha',
          'email' => 'nuha.um@gmail.com',
          'password' => bcrypt('12345678'),
          'address' => 'Ketandan Lama 5A, Genteng - Ketabang',
          'phone' => '085712551156',
          'created_at' => Carbon::now(),
        ],[
          'name' => 'Pengguna',
          'email' => 'pengguna@gmail.com',
          'password' => bcrypt('12345678'),
          'address' => 'Surabaya',
          'phone' => '085712551156',
          'created_at' => Carbon::now(),
        ]]);

        Permission::insert([
          ['name' => 'add product','created_at' => Carbon::now()],
          ['name' => 'edit product','created_at' => Carbon::now()],
          ['name' => 'delete product','created_at' => Carbon::now()],
        ]);

        Role::insert([
          ['name' => 'admin', 'created_at' => Carbon::now(),],
          ['name' => 'user', 'created_at' => Carbon::now(),],
        ]);

        DB::table('roles_permissions')->insert([
            ['role_id' => 1, 'permission_id' => 1],
            ['role_id' => 1, 'permission_id' => 2],
            ['role_id' => 2, 'permission_id' => 1],
            ['role_id' => 2, 'permission_id' => 2],
        ]);

        DB::table('users_permissions')->insert([
            ['user_id' => 1, 'permission_id' => 3]
        ]);

        DB::table('users_roles')->insert([
            ['user_id' => 1, 'role_id' => 1],
            ['user_id' => 2, 'role_id' => 2],
        ]);
    }
}
