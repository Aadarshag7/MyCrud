<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions=[
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'game-list',
            'game-create',
            'game-edit',
            'game-delete'
        ];
        foreach ($permissions as $permission){
            Permission::create([
                'name'=>$permission
            ]);
        }
    }
}
