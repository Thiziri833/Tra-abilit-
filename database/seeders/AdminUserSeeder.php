<?php

namespace Database\Seeders;

use App\Models\Structure;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // $structure = Structure::create(['name' => 'Huile']);

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('adminadmin'),
            'structure_id'=> 1,
            'is_super_admin' => true,

        ]);
        // Créer 50 utilisateurs et les associer à une structure aléatoire
        // User::factory()
        //     ->count(50)
        //     ->create()
        //     ->each(function ($user) use ($structures) {
        //     $user->structure_id = $structures->random()->id;
        //     $user->save();
        // });



        $role = Role::create(['name' => 'Admin', 'guard_name' => 'web']);

        $permissions = Permission::pluck('id', 'id')->all();


        // voulez ajouter plus d'une permision à un  role, vous devez utiliser le mot sync
        $role->syncPermissions($permissions);
        // voulez ajouter plus d'un role à une permission, vous devez utiliser le mot sync
        // $permission->syncRoles($roles);

        $user->assignRole([$role->id]);
        // $user->assignStructure([$structure->id]);
    }
}
