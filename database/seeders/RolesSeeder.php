<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = $this->data();

        foreach ($data as $value) {
            Role::create([
                'guard_name' => $value['guard_name'],
                'name' => $value['name'],
            ]);
        }
    }

    public function data(): array
    {
        return [
            ['guard_name' => 'admin', 'name' => 'root'],
            ['guard_name' => 'admin', 'name' => 'admin'],
            ['guard_name' => 'admin', 'name' => 'manager'],
            ['guard_name' => 'admin', 'name' => 'author'],
            ['guard_name' => 'admin', 'name' => 'narrator'],
            ['guard_name' => 'admin', 'name' => 'user'],
            ['guard_name' => 'web', 'name' => 'author'],
            ['guard_name' => 'web', 'name' => 'narrator'],
            ['guard_name' => 'web', 'name' => 'user'],
        ];
    }
}
