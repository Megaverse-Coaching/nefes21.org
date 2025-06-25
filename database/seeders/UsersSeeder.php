<?php

namespace Database\Seeders;

use App\Models\Front\User;
use App\Models\Front\UserInfo;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param Generator $faker
     * @return void
     */
    public function run(Generator $faker): void
    {
        $rootUser = User::create([
            'first_name'        => 'Anıl',
            'last_name'         => 'Gündal',
            'email'             => 'anil.gundal@grafstudios.com.tr',
            'password'          => Hash::make('123'),
            'email_verified_at' => now(),
            'api_token'         => Hash::make('anil.gundal@grafstudios.com.tr'),
        ])->assignRole('root');

        $this->addDummyInfo($faker, $rootUser);

        foreach ($this->data($faker) as $value) {
            $fname = tr_change($value['first_name']);
            $lname = tr_change($value['last_name']);
            $demoUser = User::create([
                'first_name'        => $value['first_name'],
                'last_name'         => $value['last_name'],
                'email'             => Str::of($fname." ".$lname."@nefes21.org")->snake()->replace('_', '.'),
                'password'          => Hash::make('demo'),
                'email_verified_at' => now(),
                'api_token'         => Hash::make($value['api_token']),
            ])->assignRole('author', 'narrator');
            $this->addDummyInfo($faker, $demoUser);
            unset($demoUser);
        }

        $role1 = Role::findByName('root', 'admin')->syncPermissions(Permission::all());
        $role2 = Role::findByName('author')->syncPermissions([
            "create content", "read content", "update content", "delete content",
        ]);
        $role3 = Role::findByName('narrator')->syncPermissions([
            "create track", "read track", "update track", "delete track"
        ]);

        /*
        User::factory(100)->create()->each(function (User $user) use ($faker) {
            $this->addDummyInfo($faker, $user);
            $user->assignRole('user');
        });
        */
    }

    private function addDummyInfo(Generator $faker, User $user)
    {
        $dummyInfo = [
            'company'  => $faker->company,
            'phone'    => $faker->phoneNumber,
            'website'  => $faker->url,
            'language' => $faker->languageCode,
            'country'  => $faker->countryCode,
        ];

        $info = new UserInfo();
        foreach ($dummyInfo as $key => $value) {
            $info->$key = $value;
        }
        $info->user()->associate($user);
        $info->save();
    }

    private function data($faker)
    {
        return [
            ['id'=> 801038,'first_name'=> 'Bülent','last_name'=> 'Gardiyanoğlu','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801039,'first_name'=> 'Rana','last_name'=> 'Kaplan','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801040,'first_name'=> 'Selma','last_name'=> 'Kahraman','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801041,'first_name'=> 'Gözde','last_name'=> 'Ağseren Bayır','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801042,'first_name'=> 'Dilek','last_name'=> 'Kıyıcı','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801043,'first_name'=> 'Ülkü','last_name'=> 'Nazlım','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801044,'first_name'=> 'Selva','last_name'=> 'Akışık','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801045,'first_name'=> 'Elif','last_name'=> 'Taşdöğen Topal','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801046,'first_name'=> 'Nuran','last_name'=> 'Koldan','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801047,'first_name'=> 'Nihal','last_name'=> 'Yalazkan','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801048,'first_name'=> 'Nilüfer','last_name'=> 'Bal','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801049,'first_name'=> 'Çağdaş','last_name'=> 'Aydaş','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801050,'first_name'=> 'Emine','last_name'=> 'Gardiyanoğlu','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801051,'first_name'=> 'Muhammed','last_name'=> 'Gebeş','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801052,'first_name'=> 'Nefes21','last_name'=> 'Akademi','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801053,'first_name'=> 'Senem','last_name'=> 'Kanbir','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801054,'first_name'=> 'Nuran','last_name'=> 'Filiz','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801055,'first_name'=> 'Ferhat','last_name'=> 'Atik','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801056,'first_name'=> 'Gamze','last_name'=> 'Kır Sapancı','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801057,'first_name'=> 'Fatoş','last_name'=> 'Koca Tümmü','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801058,'first_name'=> 'Zülal','last_name'=> 'Pelit','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801059,'first_name'=> 'Duygu','last_name'=> 'Korkmaz','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801060,'first_name'=> 'Ayşe','last_name'=> 'Özkılıç','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801061,'first_name'=> 'Gizem','last_name'=> 'Bat','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801062,'first_name'=> 'Neslihan','last_name'=> 'Nalbant','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801063,'first_name'=> 'Zeynep','last_name'=> 'Sarıkavak','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801064,'first_name'=> 'Memnune','last_name'=> 'Nazlıoğlu','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801065,'first_name'=> 'Tuğba','last_name'=> 'Sümen','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801066,'first_name'=> 'Muhsine','last_name'=> 'Aydın','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801067,'first_name'=> 'Yasemin','last_name'=> 'Aktağ','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
            ['id'=> 801068,'first_name'=> 'Yasemin','last_name'=> 'Hakikat Derin','email'=> $faker->email,'password'=> Hash::make('demo'),'email_verified_at' => now(),'api_token' => Hash::make('api@nefes21.org'),],
        ];
    }
}
