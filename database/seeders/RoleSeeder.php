<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleAdmi = Role::create(['name' => 'webAdmi']);
        $roleProfe = Role::create(['name' => 'profesor']);

        Permission::create(['name'=>'panel'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'profile'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'changePassword'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'sections'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'logout'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'register'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'saveStudent'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'saveProfessor'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'saveOtherWorker'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.student'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.professor'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.otherWorker'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'update.student'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'update.professor'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'update.otherWorker'])->syncRoles([$roleAdmi]);

    }
}
