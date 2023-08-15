<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1=Role::create(['name'=>'ADMIN']);
        $role2=Role::create(['name'=>'users']);
        $role3=Role::create(['name'=>'clients']);

        Permission::create(['name'=>'admin.index'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.create'])->syncRoles([$role1]);
        Permission::create(['name'=>'admin.store'])->syncRoles([$role1]);
        Permission::create(['name'=>'users.all'])->assignRole($role2);
        Permission::create(['name'=>'clients.all'])->assignRole($role3);
    }
}
