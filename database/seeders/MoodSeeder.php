<?php

namespace Database\Seeders;

use App\Models\Admin\Mood;
use Illuminate\Database\Seeder;

class MoodSeeder extends Seeder
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
            Mood::create([
                'mood_id' => $value['mood_id'],
                'status' => $value['status'],
                'title' => $value['title'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }


    private function data():array
    {
        return [
            ['mood_id'=> 'energetic',   'status' => 1,    'title' => 'Energetic',   'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',        'status' => 1,    'title' => 'Calm',        'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',         'status' => 1,    'title' => 'Sad',         'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',    'status' => 1,    'title' => 'Stressed',    'updated_by'=>801000, 'created_by'=>801000],
        ];
    }
}
