<?php

namespace Database\Seeders;

use App\Models\Admin\MoodLayout;
use Illuminate\Database\Seeder;

class MoodLayoutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run():void
    {
        $data = $this->data();

        foreach ($data as $value) {
            MoodLayout::create([
                'mood_id' => $value['mood_id'],
                'content_id' => $value['content_id'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by']
            ]);
        }
    }


    private function data(): array
    {
        return [
            ['mood_id'=> 'energetic',  'content_id' => 101080,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101094,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101103,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101104,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101114,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101129,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101186,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'energetic',  'content_id' => 101178,    'updated_by'=>801000, 'created_by'=>801000],

            ['mood_id'=> 'calm',  'content_id' => 101116,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101178,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101202,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101210,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101194,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101214,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'calm',  'content_id' => 101217,    'updated_by'=>801000, 'created_by'=>801000],

            ['mood_id'=> 'sad',  'content_id' => 101080,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101081,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101085,    'updated_by'=>801000, 'created_by'=>801000],
//            ['mood_id'=> 'sad',  'content_id' => 101088,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101093,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101106,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101109,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101178,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101108,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101110,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101111,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'sad',  'content_id' => 101215,    'updated_by'=>801000, 'created_by'=>801000],

            ['mood_id'=> 'stressed',  'content_id' => 101075,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101081,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101098,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101089,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101113,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101105,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101106,    'updated_by'=>801000, 'created_by'=>801000],
            ['mood_id'=> 'stressed',  'content_id' => 101127,    'updated_by'=>801000, 'created_by'=>801000],

        ];
    }
}
