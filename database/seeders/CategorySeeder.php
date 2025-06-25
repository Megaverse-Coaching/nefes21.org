<?php

namespace Database\Seeders;

use App\Models\Admin\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
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
            Category::create([
                'category' => $value['category'],
                'dimension_id' => $value['dimension_id'],
                'status' => $value['status'],
                'order' => $value['order'],
                'title' => $value['title'],
                'description' => $value['description'],
                'created_by' => $value['created_by'],
                'updated_by' => $value['updated_by'],
            ]);
        }
    }

    private function data(): array
    {
        return [
            ['category'=> 'sleep_soundscapes',           'dimension_id' => 'sleep',              'order' => 1, 'title' => 'Rahatlatıcı Sesler',               'description' => 'Senin için önemli olanı bul',                             'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'sleep_preperation',           'dimension_id' => 'sleep',              'order' => 2, 'title' => 'Uykuya Hazırlık',                  'description' => 'Bilinçli farkındalığını artır',                           'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'sleep_stories',               'dimension_id' => 'sleep',              'order' => 3, 'title' => 'Uyku Hikayeleri',                  'description' => 'Sorguladıklarını anlamaya çalış',                         'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'sleep_asmr',                  'dimension_id' => 'sleep',              'order' => 4, 'title' => 'ASMR ile Huzurlu Uyu',             'description' => 'Sahip olduklarını azımsama',                              'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'sleep_musics',                'dimension_id' => 'sleep',              'order' => 5, 'title' => 'Uyku İçin Müzikler',               'description' => 'Zihnini olumsuzluklardan arındır',                        'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'soundscapes',                 'dimension_id' => 'music',              'order' => 1, 'title' => 'Doğadan Sesler',                   'description' => 'Bilinçli farkındalığını artır',                           'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'albums',                      'dimension_id' => 'music',              'order' => 2, 'title' => 'Albümler',                         'description' => 'Sorguladıklarını anlamaya çalış',                         'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'music',                       'dimension_id' => 'music',              'order' => 3, 'title' => 'Müzikler',                         'description' => 'Sahip olduklarını azımsama',                              'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'meditation-641077',           'dimension_id' => 'meditation',         'order' => 1, 'title' => 'Olumlama Meditasyonları',          'description' => 'Olumlama Meditasyonları',                                 'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'meditation-933257',           'dimension_id' => 'meditation',         'order' => 2, 'title' => 'Nefes Egzersizleri',               'description' => 'Nefesinle hayatına değişimi getirebilirsin',              'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'meditation-873482',           'dimension_id' => 'meditation',         'order' => 3, 'title' => 'Farkındalık Meditasyonları',       'description' => 'Mindfulness',                                             'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'family_parenting-610589',     'dimension_id' => 'family_parenting',   'order' => 1, 'title' => 'Ebeveyn Olmak',                    'description' => 'Ebeveyn Olmayı Kolaylaştırıcı Yöntemler',                 'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'family_parenting-634699',     'dimension_id' => 'family_parenting',   'order' => 2, 'title' => 'Çocuklarla İletişim',              'description' => 'Çocuklara Ulaşabilmeyi Kolaylaştırmak',                   'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'family_parenting-307382',     'dimension_id' => 'family_parenting',   'order' => 3, 'title' => 'Yaşanmış Hikayeler',               'description' => 'Deneyimsel Öğretiler',                                    'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'relationships-302886',        'dimension_id' => 'relationships',      'order' => 1, 'title' => 'Aşk',                              'description' => 'Aşkı Bulmanın Yolları',                                   'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'relationships-195818',        'dimension_id' => 'relationships',      'order' => 2, 'title' => 'İlişkilerde Sorunlar',             'description' => 'İlişkide Sorunları Tanımlama ve Çözümleri',               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'relationships-398207',        'dimension_id' => 'relationships',      'order' => 3, 'title' => 'Sosyal Hayat',                     'description' => 'Arkadaşlarım ve Çevremle olan İlişkilerim',               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'relationships-197310',        'dimension_id' => 'relationships',      'order' => 4, 'title' => 'Yaşanmış Hikayeler',               'description' => 'Deneyimsel Öğretiler',                                    'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'intellectual-782784',         'dimension_id' => 'intellectual',       'order' => 1, 'title' => 'Verimli Bir Hayat',                'description' => 'Hayatında verimi artırmak',                               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'intellectual-684664',         'dimension_id' => 'intellectual',       'order' => 2, 'title' => 'Kreatif Düşünmek',                 'description' => 'Yaratıcılığınızı arttırmak ister misiniz?',               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'intellectual-267011',         'dimension_id' => 'intellectual',       'order' => 3, 'title' => 'Motivasyon Kaynakları',            'description' => 'İç ve Dış Kaynaklarını Görebilmek',                       'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'occupational-935694',          'dimension_id' => 'occupational',       'order' => 1, 'title' => 'İş Hayatında Başarı',              'description' => 'İş hayatını kolaylaştıran adımlar',                       'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'occupational-532653',          'dimension_id' => 'occupational',       'order' => 2, 'title' => 'İş Hayatında Atılım',              'description' => 'Girişimci olmak için',                                    'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'emotional-329590',            'dimension_id' => 'emotional',          'order' => 1, 'title' => 'Huzur',                            'description' => 'Huzurlu yaşamın sırları',                                 'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'emotional-444403',            'dimension_id' => 'emotional',          'order' => 2, 'title' => 'Stres',                            'description' => 'Stresten Arınmanın Yolları',                              'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'emotional-944652',            'dimension_id' => 'emotional',          'order' => 3, 'title' => 'Değerlerimiz',                     'description' => 'Hayatıma Anlam Katan Değerlerime Yolculuk',               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'emotional-394063',            'dimension_id' => 'emotional',          'order' => 4, 'title' => 'Zorlu Duygular',                   'description' => 'İçimizde ki Korkular',                                    'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'physical-689686',             'dimension_id' => 'physical',           'order' => 1, 'title' => 'Zorlu Duygular',                   'description' => 'Doğal beslenmenin önemi',                                 'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'physical-811660',             'dimension_id' => 'physical',           'order' => 2, 'title' => 'Aktivite ve Egzersizler',          'description' => 'Beden ve Farkındalık',                                    'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'physical-237985',             'dimension_id' => 'physical',           'order' => 3, 'title' => 'Sağlık İçin Nefes',                'description' => 'Nefesten gelen şifa',                                     'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'physical-655539',             'dimension_id' => 'physical',           'order' => 4, 'title' => 'Spiritüel Sağlık',                 'description' => 'Sağlık için...',                                          'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'spiritual-407975',            'dimension_id' => 'spiritual',          'order' => 1, 'title' => 'Farkındalık Atölyeleri',           'description' => 'Bülent Gardiyanoğlu',                                     'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'spiritual-951477',            'dimension_id' => 'spiritual',          'order' => 2, 'title' => 'Kadınlara Özel...',                'description' => 'Kadınlara Dair Her Şey...',                               'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'spiritual-635092',            'dimension_id' => 'spiritual',          'order' => 3, 'title' => 'Bilinçaltı ve Denge',              'description' => 'Bilinçaltı Kodlarımız',                                   'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'spiritual-514372',            'dimension_id' => 'spiritual',          'order' => 4, 'title' => 'Yaşanmış Hikayeler',               'description' => 'Deneyimlerin Öğretisi',                                   'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
            ['category'=> 'spiritual-900923',            'dimension_id' => 'spiritual',          'order' => 5, 'title' => 'Sesli Kitaplar',                   'description' => 'Merak Ettikleriniz',                                      'status' => 1,  'created_by'=>801000, 'updated_by' => 801000],
        ];
    }
}
