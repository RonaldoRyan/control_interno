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
    // public function run(): void
    // {
    //     $roleAdmi = Role::create(['name' => 'webAdmi', 'guard_name'=> 'web']);
    //     $roleProfe = Role::create(['name' => 'profesor', 'guard_name'=>'web']);

    //     Permission::create(['name'=>'panel', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'profile', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'changePassword', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'sections', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'logout', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'register', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'saveStudent', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'saveProfessor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'saveOtherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'delete.student', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'delete.professor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'delete.otherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'update.student', 'guard_name'=>'web'])->syncRoles([$roleAdmi, $roleProfe]);
    //     Permission::create(['name'=>'update.professor', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);
    //     Permission::create(['name'=>'update.otherWorker', 'guard_name'=>'web'])->syncRoles([$roleAdmi]);

    // }


    public function run(): void
    {
        $permissions = [
            'panel' => ['webAdmi', 'profesor'],
            'profile' => ['webAdmi', 'profesor'],
            'changePassword'=> ['webAdmi', 'profesor'],
            'sections'=> ['webAdmi', 'profesor'],
            'logout'=> ['webAdmi', 'profesor'],
            'register' => ['webAdmi'],
            'saveStudent' => ['webAdmi', 'profesor'],
            'saveProfessor' => ['webAdmi'],
            'saveOtherWorker' => ['webAdmi'],
            'delete.student' => ['webAdmi'],
            'delete.professor' => ['webAdmi'],
            'delete.otherWorker' => ['webAdmi'],
            'update.student' => ['webAdmi', 'profesor'],
            'update.professor' => ['webAdmi'],
            'update.otherWorker' => ['webAdmi'],
        ];


        $roles = [
            'webAdmi' => ['guard_name' => 'web'],
            'profesor' => ['guard_name' => 'web'],
        ];

   foreach ($roles as $roleName => $roleData) {
    $roleModels[$roleName] = Role::firstOrCreate(['name' => $roleName, 'guard_name' => $roleData['guard_name']]);
}

foreach ($permissions as $perm => $roleNames) {
    $permission = Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
    $permission->syncRoles(array_map(fn($role) => $roleModels[$role], $roleNames));
}

    }
}
