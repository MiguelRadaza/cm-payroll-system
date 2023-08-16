<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super admin']);
        Role::create(['name' => 'ceo']);
        Role::create(['name' => 'employee']);

        $user = User::where('id', 1)->first();
        $role = Role::where('name', 'super admin')->first();
        $user->assignRole($role);
    }
}
