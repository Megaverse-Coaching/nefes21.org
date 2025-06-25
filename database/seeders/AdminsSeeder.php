<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use App\Models\Admin\AdminInfo;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @return void
     */
    public function run(Generator $faker): void
    {
        $rootUser = Admin::create([
            'first_name'        => 'Anıl',
            'last_name'         => 'Gündal',
            'email'             => 'anil.gundal@grafstudios.com.tr',
            'password'          => Hash::make('123'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('anil.gundal@grafstudios.com.tr'),
        ])->assignRole(['root'], "admin");

        $this->addDummyInfo($faker, $rootUser);

        foreach ($this->data($faker) as $value) {
            $fname = tr_change($value['first_name']);
            $lname = tr_change($value['last_name']);
            $demoUser = Admin::create([
                'first_name'        => $value['first_name'],
                'last_name'         => $value['last_name'],
                'email'             => Str::of($fname." ".$lname."@nefes21.org")->snake()->replace('_', '.'),
                'password'          => Hash::make('demo'),
                'email_verified_at' => now(),
                'api_token'         => Hash::make($value['api_token']),
            ])->assignRole(['author', 'narrator'], "admin");
            $this->addDummyInfo($faker, $demoUser);
            unset($demoUser);
        }

        $role1 = Role::findByName('root', 'admin')->syncPermissions(Permission::all());
        $role2 = Role::findByName('author', 'admin')->syncPermissions([
            "create content", "read content", "update content", "delete content",
        ]);
        $role3 = Role::findByName('narrator', 'admin')->syncPermissions([
            "create track", "read track", "update track", "delete track"
        ]);

        /*
        User::factory(100)->create()->each(function (User $user) use ($faker) {
            $this->addDummyInfo($faker, $user);
            $user->assignRole('user');
        });
        */
    }

    private function addDummyInfo(Generator $faker, Admin $admin)
    {
        $dummyInfo = [
            'company'  => $faker->company,
            'phone'    => $faker->phoneNumber,
            'website'  => $faker->url,
            'language' => $faker->languageCode,
            'country'  => $faker->countryCode,
        ];

        $info = new AdminInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->admin()->associate($admin);
        $info->save();
    }

    private function data($faker): array
    {
        return [
            ['id'=> 801038,'first_name'=> 'Bülent','last_name'=> 'Gardiyanoğlu','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801040,'first_name'=> 'Selma','last_name'=> 'Kahraman','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801062,'first_name'=> 'Neslihan','last_name'=> 'Nalbant','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
        ];
    }
}
