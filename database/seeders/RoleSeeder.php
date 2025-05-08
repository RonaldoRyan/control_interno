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
        $roleAdmi = Role::create(['name' => 'webAdmi', 'guard_name'=> 'web']);
        $roleProfe = Role::create(['name' => 'profesor', 'guard_name'=>'web']);

        Permission::create(['name'=>'panel', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'profile', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'changePassword', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'sections', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'logout', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'register', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'saveStudent', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'saveProfessor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'saveOtherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.student', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.professor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'delete.otherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'update.student', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
        Permission::create(['name'=>'update.professor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
        Permission::create(['name'=>'update.otherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);

    }
}
