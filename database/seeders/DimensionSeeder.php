<?php

namespace Database\Seeders;

use App\Models\Admin\Dimension;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DimensionSeeder extends Seeder
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
            Dimension::create([
                'dimension' => $value['dimension'],
                'status' => $value['status'],
                'order' => $value['order'],
                'title' => $value['title'],
                'description' => $value['description'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return [
            ['dimension'=> 'emotional', 'status' => 1, 'order' => 1, 'title' => 'İyileşen Duygular', 'description' => 'Huzurlu bir yaşantı için duygularımızı anlayabilmeli ve onları yönetebilmeliyiz. Nasıl yapabileceğini öğrenmeye hazır mısın?', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'spiritual', 'status' => 1, 'order' => 2, 'title' => 'Evrendeki Denge', 'description' => 'Evrende herşey bir denge içinde. Bu dengeyi keşfederek farkındalığını arttırmaya başla.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'meditation', 'status' => 1, 'order' => 3, 'title' => 'Nefes ve Meditasyon', 'description' => 'Derin bir nefes al ve güvende olduğunu hisset. Çeşitli meditasyon teknikleriyle zihnini rahatlar, nefes egzersizleriyle ruhunu dinlendir.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'intellectual', 'status' => 1, 'order' => 4, 'title' => 'İlham ve Motivasyon', 'description' => 'Hedeflerine ilerlerken ihtiyaç duyduğun mativasyonu keşfet. Hayallerinden asla vazgeçme.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'physical', 'status' => 1, 'order' => 5, 'title' => 'Fiziksel Sağlık', 'description' => 'Fiziksel sağlığını asla ihmal etme. Sağlıklı beslenerek ve düzenli spor yaparak vücuduna gereken önemi verdiğine emin ol.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'sleep', 'status' => 1, 'order' => 6, 'title' => 'Sağlıklı Uyku', 'description' => 'Daha iyi bir uyku ile ruhunu ve bedenini dinlendir. Güne huzurla başlamanın mutluluğunu yaşa, verimliliğini arttır.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'relationships', 'status' => 1, 'order' => 7, 'title' => 'Daha İyi İlişkiler', 'description' => 'İlişkilerin karmaşık yönünü keşfederek kendini geliştir. Yıllar sürecek güçlü ilişkiler kurmak için neler yapman gerektiğini öğren.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'family_parenting', 'status' => 1, 'order' => 8, 'title' => 'Aile ve Ebeveynlik', 'description' => 'Aile bağlarını güçlendirebilmek ve daha iyi bir ebeveyn olabilmek için neler yapabileceğini öğren.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'occupational', 'status' => 1, 'order' => 9, 'title' => 'Eğitim ve İş Hayatı', 'description' => 'Gelecek kaygısıyla bugünü asla kaçırma. İş hayatının zorlu basamaklarını nasıl tırmanacağını, derslerinde nasıl başarılı olacağını öğren.', 'updated_by'=>801000, 'created_by'=>801000],
            ['dimension'=> 'music', 'status' => 1, 'order' => 10, 'title' => 'Rahatlatan Müzikler', 'description' => 'Gözlerini kapat ve ruhunu besleyecek müzikler ile doğayı keşfe çık. Yağmur damlalarını ve esen rüzgarı hisset.', 'updated_by'=>801000, 'created_by'=>801000],
        ];
    }
}
