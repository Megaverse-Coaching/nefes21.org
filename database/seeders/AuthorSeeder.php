<?php

namespace Database\Seeders;

use App\Models\Admin\Author;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
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
            Author::create([
                'author_id' => $value['author_id'],
                'info' => $value['info'],
                'label' => $value['label'],
                'name' => $value['name'],
                'position' => $value['position'] ?? null,
                'surname' => $value['surname'],
                'title' => $value['title'],
                'headerImageUrl' => $value['headerImageUrl'],
                'isConsulting' => $value['isConsulting'],
                'profilePicUrl' => $value['profilePicUrl'],
                'updated_by' => $value['updated_by'],
                'created_by' => $value['created_by'],
            ]);
        }
    }

    private function data():array
    {
        return
            [
                [
                    "author_id" =>  "901139",
                    "info" =>  "2012 yılında ilk kitabı ‘Evrenin İlahi Dili-Uyanış’, 2013 yılında ‘2 Tam Bir Tek’ ve Haziran 2014 te çıkardığı ‘KADIN Olmayı Hatırlamak’ , 2015'te çıkardığı \"Her Şey Hakikati Görmekle Başlar\",2016 yılında \"Mucize Şifa\" , 2017 yılında \"Her Güne Mesajın Var\" , 2018'de \"Gönül Gözü\" , 2019 Yılında \"Dört Sınav\" ve 2020 yılında \"Kendini Ertelemekten Vazgeç ve Şimdi Harekete Geç\" kitapları yazarı, Nefes21.com Bütünsel Gelişim Portalı, Kisiselgelisim.tv, Nefes21 App Kurucusu Bülent Gardiyanoğlu, 19 Mayıs Kıbrıs doğumludur. ",
                    "label" =>  "Bülent Gardiyanoğlu",
                    "name" =>  "Bülent",
                    "position" =>  "",
                    "surname" =>  "Gardiyanoğlu",
                    "title" =>  "Yazar",
                    "headerImageUrl" =>  "/images/author-headers/901139-567438.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901139-441103.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901140",
                    "info" =>  "Kocaeli Üniversitesi Mühendislik Fakültesinden mezun oldu. Aynı yıllarda üniversitenin Teknik Eğitim Fakültesinde Pedagojik Formasyon eğitimini tamamladı.\n\n Kurum İçi İç Koçluk Projesi’nde Yönetici Koçluğu görevlerini sürdürdü. Kişisel Gelişim eğitimleri vermekle birlikte bu eğitimlerin tasarım ve geliştirme çalışmalarında aktif rol aldı. ICF TR Projeler Kurulunda 2 yıl proje liderliği yaptı. 2011 yılında RANAKAPLAN Akademi’yi, 2019 yılında RANAKAPLAN Coaching Zentrum’u (Almanya) kurdu.\n",
                    "label" =>  "Rana KAPLAN",
                    "name" =>  "Rana",
                    "position" =>  "",
                    "surname" =>  "Kaplan",
                    "title" =>  " PCC / NLP Uzmanı/ Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901140-592785.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901140-657567.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901141",
                    "info" =>  "Lisans eğitimi Eskişehir Anadolu Üniversitesi Halkla İlişkiler ve Tanıtım bölümü. Uzun yıllar kurucusu olduğu HERO Network İletişim Hizmetlerinde yöneticilik yaptıktan sonra 2015 yılında eğitim sektörüne -kalbinin sesini dinleyerek- geçiş yaptı. Profesyonel Koçluk ve NLP başta olmak üzere pek çok kişisel gelişim temelli eğitimler ile birlikte Kişilik Psikolojisi eğitimini de bu süreçte tamamladı.\nKurumsal koçluk kariyerinde Yönetici Koçluğu çalışmalarına ağırlık vererk ICF Türkiye  ve RANAKAPLAN Akademi  bünyesinde birçok sosyal projede yer aldı. \n",
                    "label" =>  "Selma KAHRAMAN",
                    "name" =>  "Selma",
                    "position" =>  "Content Lead",
                    "surname" =>  "Kahraman",
                    "title" =>  "ACC /NLP Uzmanı/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901141-458764.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901141-602505.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901142",
                    "info" =>  "Kocaeli Üniversitesi Siyaset Bilimi ve Kamu Yönetimi bölümünden mezun oldu. Öğrencilik yıllarında kurucu üyesi olduğu Toplumsal Sorumluluk Derneği’nde yönetim kurulu başkan yardımcılığı görevini sürdürdü. \nAynı yıllarda RANAKAPLAN Akademi’de kariyerine bu çatı altında koç ve eğitmen olarak başladı. Eş zamanlı Kocaeli Üniversitesi Tarih Anabilim Dalı’nda Yüksek Lisans Eğitimini tamamladı.\n\"Gezgin Koçlar\" platformu ile koçluk adına hayallerini gerçekleştirmeye başladı. \nHalen İstanbul Üniversitesi Yönetim ve Strateji Doktora Programı’nda eğitimine devam etmekte. \n",
                    "label" =>  "Gözde A. BAYIR",
                    "name" =>  "Gözde",
                    "position" =>  "",
                    "surname" =>  "Ağseren Bayır",
                    "title" =>  "ACC /NLP Uzmanı/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901142-819715.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901142-873239.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901143",
                    "info" =>  "İstanbul Üniversitesi Sosyoloji Eğitimi .\nAldığı eğitimler:\n -\tProfesyonel Koçluk Eğitimi\n-\tNlp Eğitimi\n-\tÖğrenci Koçluğu Eğitimi\n-\tEbeveyn Koçluğu Eğitimi\n-\tEğitici Eğitimi İz Gören Akademi\n-\tEğitici Eğitimi Rana Kaplan Akademi \n\nKariyerine Rana Kaplan Akademi başladı. Profesyonel Koçluk Eğitimi ,Nlp eğitimi, Öğrenci koçluğu Eğitimi, Ebeveyn Koçluğu eğitimi aldı. Yine Rana kaplan Akademi de Profesyonel Koçluk ve Eğitmenlik yapıyor.\n",
                    "label" =>  "Dilek KIYICI",
                    "name" =>  "Dilek",
                    "position" =>  "",
                    "surname" =>  "Kıyıcı",
                    "title" =>  "Profesyonel Koç/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901143-499502.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901143-906045.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901144",
                    "info" =>  "Atatürk Üniversitesi Sosyoloji Lisans öğrenimi devam etmektedir. Son 6 yıldır kişisel gelişim alanında hizmet veren Nazlım şu an Profesyonel Koçluk, NLP uygulayıcılığı, Aile dizimi kolaylaştırıcılığı ve Olumlu Yaşam Tekniği eğitmenliği yapmaktadır. Bununla birlikte Rana Kaplan Akademi'de geri bildirimci koç, Nefes21 Akademi'de eğitmenlik, Nefes21.com kişisel gelişim sayfasında  blog yazarlığı ve seslendirme yapmaktadır. Eğitim hayatına birçok hocayla devam eden Nazlım, bireysel ve kurumsal eğitimler vermeye devam etmektedir.",
                    "label" =>  "Ülkü NAZLIM",
                    "name" =>  "Ülkü",
                    "position" =>  "",
                    "surname" =>  "Nazlım",
                    "title" =>  "Profesyonel Koç/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901144-913270.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901144-229473.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901145",
                    "info" =>  "Eskişehir Anadolu Üniversitesi İşletme Bölümünden mezun oldu.  Şu anda İstanbul Üniversitesi AUZEF Sosyoloji Bölümü 4. sınıf öğrenciliği devam etmektedir.  \nKariyerine birbirinden farklı özel şirketler yanı sıra uzun yıllarda Botaş Boru Hatları A.Ş. da İnsan Kaynakları, İdari ve Mali bölümlerde 30 yıl yöneticilik yaptı.  Bu süreçlerde Kurum içi hizmetler yanı sıra Bilişsel Enerji alanında çalışmaları oldu. 3 yıldır Rana Kaplan Akademide  ICF ACC Ünvanlı Profesyonel Koçluk, ICF NLP Uzmanlığı, ICF Eğitim ve Öğrenci Koçluğu, ICF Ebeveyn Koçluğu, ICF Kariyer Koçluğu ve Eğitmenlik yapıyor.  \n",
                    "label" =>  "Selva AKIŞIK",
                    "name" =>  "Selva ",
                    "position" =>  "",
                    "surname" =>  "Akışık",
                    "title" =>  "ACC Profesyonel Koç/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901145-596078.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901145-254596.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901146",
                    "info" =>  "Eğitimi Eskişehir Anadolu Üniversitesi Sosyal Medya Yöneticiliği olan Elif Taşdöğen Topal, 1998 / 2004 TV 41 RADYO TELEVİZYON A.Ş.\nHafta içi sabah ve öğlen kuşağı program sunuculuğu yaparken kurumun AR-GE departmanında birbirinden farklı programların yönetmenliğini yapmıştır.\n2015 yılında RANAKAPLAN Akademisinde Profesyonel Koçluk Eğitimini aldıktan sonra kurumda koordinatör görevini yaparken Nefes eğitimi ve eğitmenliği tamamlayıp akademinin Nefes Eğitmeni olarak görevine devam etmektedir .\n",
                    "label" =>  "Elif TOPAL",
                    "name" =>  "Elif",
                    "position" =>  "",
                    "surname" =>  "Taşdöğen Topal",
                    "title" =>  "Profesyonel Koç/ Nefes Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901146-506560.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901146-341524.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901147",
                    "info" =>  "05.05.1973 İzmir doğumlu. Eskişehir Anadolu Üniversitesi Halkla İlişkiler Bölümü mezunu. \n2015 Yılından itibaren kişisel gelişim alanında kendini geliştirmek için eğitimler aldı.\nKişisel gelişimi alanında  aldığı eğitimler: NLP, Yaşam Koçluğu, Bioenerji, Hipnotik dil Kalıpları, Çocuk Oyun Terapisi, Mentossori, Eğitmenlik eğitimi. Hipnotik telkinli meditasyon  çalışmalarına devam ediyor.                        \n                                                                                                ",
                    "label" =>  "Nuran KOLDAN",
                    "name" =>  "Nuran",
                    "position" =>  "",
                    "surname" =>  "Koldan",
                    "title" =>  "Yaşam Koçu/Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901147-469883.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901147-770555.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901148",
                    "info" =>  " İstanbul doğumlu. Üç üniversite mezunu. Halkla İlişkiler, Radyo-Sinema, Sağlık Yönetimi uzmanlığı, aynı zamanda kahkaha Yogası ve Mindfulness eğitmeni, dansçı, tiyatro oyuncusu, eczane işletmecisi. Ankara 'da yaşıyor. Uzun süredir kişisel gelişim alanında aktif olarak kendini geliştirmeye ve bilgilerini paylaşmaya devam ediyor.",
                    "label" =>  "Nihan Yalazkan",
                    "name" =>  "Nihal",
                    "position" =>  "Seslendirme",
                    "surname" =>  "Yalazkan",
                    "title" =>  "Mindfulness",
                    "headerImageUrl" =>  "/images/author-headers/901148-964986.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901148-804197.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901149",
                    "info" =>  "Almanya Köln doğumlu.\nLisans öğrenimi Berufskollegschule Köln-Ehrefelde 4 yıllık Eğitmenlik Eğitimi olarak tamamladı.\n2018 yılında kişisel gelişimle tanıştıktan sonra bu yolculuğuna Belçika Bürüksel'de Dusod Bütünsel Nefes akademisinden \n– ICF Onaylı Bütünsel Nefes Danışmalığı - eğitimi alarak başladı.\n",
                    "label" =>  "Nilüfer Bal",
                    "name" =>  "Nilüfer ",
                    "position" =>  "",
                    "surname" =>  "Bal",
                    "title" =>  "Nefes Koçu",
                    "headerImageUrl" =>  "/images/author-headers/901149-103668.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901149-880565.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901150",
                    "info" =>  "Kıbrıs'lı ünlü ses ve müzik sanatçısı.  Doğu Akdeniz Üniversitesi Müzik Öğretmenliği bölümünden mezun. O Ses Türkiye'nin yarışmasında \"Stand By Me\" şarkısını seslendirdi. Tüm jüri üyelerini döndürmeyi başarıp, Murat Boz'u seçerek takımına dahil oldu. Nefes21 Aplikasyon müziklerini hazırlıyor ve Online müzik dersleri veriyor...",
                    "label" =>  "Çağdaş Aydaş",
                    "name" =>  "Çağdaş",
                    "position" =>  "Müzik Yapım",
                    "surname" =>  "Aydaş",
                    "title" =>  "Müzik",
                    "headerImageUrl" =>  "/images/author-headers/901150-187790.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901150-331456.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901151",
                    "info" =>  "Otuz yıl boyunca öğretmenlik ve Milli Eğitim Bakanlığında Müfettişlik görevi yapan Emine Gardiyanoğlu'nun Kişisel Gelişim ve Spritüellik alanında \"Evrensel İşaretleri Okumak\" kitabı ve atölye çalışmaları ile , hayatınızdaki bir çok alanda sizlere farkındalık katmaya devam ediyor. Yazar Bülent Gardiyanoğlu'nun annesi ve hocasıdır. ",
                    "label" =>  "Emine Gardiyanoğlu",
                    "name" =>  "Emine",
                    "position" =>  "Emekli Öğretmen * Yazar",
                    "surname" =>  "Gardiyanoğlu",
                    "title" =>  "Yazar",
                    "headerImageUrl" =>  "/images/author-headers/901151-320108.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901151-953000.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901152",
                    "info" =>  "1978 İstanbul doğumluyum, ilk/orta dereceli tahsilimi tamamladıktan sonra iş gereği Kocaeli'ne yerleştim ve Lise/Yüksekokul tahsilimi aynı ilde tamamladım. 1999 - 2012 yılları arasında devlet memuru olarak görev yaptım. 2013 yılından bu yana özel sektör çalışanı olarak devam ederken, 2020 yıl  ortasına doğru \"kişisel gelişim/farkındalık\" alanında değerli yazar Bülent Gardiyanoğlu ile buluştum. Değerimi fark ettim. Eşimin de desteği ile kendimi ertelemekten vazgeçtim. Aynı alanda çeşitli eğitimlere dahil oldum ve eğitimlere devam etmekteyim.\n",
                    "label" =>  "Muhammed Gebeş",
                    "name" =>  "Muhammed",
                    "position" =>  "",
                    "surname" =>  "Gebeş",
                    "title" =>  "Koç",
                    "headerImageUrl" =>  "/images/author-headers/901152-867536.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901152-217195.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901153",
                    "info" =>  "Nefes 21 Akademi olarak özenle hazırlanan Kişisel Gelişim  Aplikasyonu Nefes21 için hazırladığımız programlarla sizlerle birlikte olmaktan mutluluk duyuyoruz. \n\nBülent Gardiyanoğlu\nRana Kaplan\nSelma Kahraman\nSenem Kanbir\nNuran Filiz\nNuran Koldan\nEmine Gardiyanoğlu\nNihal Yazlazkan\nÜlkü Nazlım\nÇağdaş Ağtaş\nElif Topal\nSelva Akışık\nDilek Kıyıcı\nGözde A.Bayır\n\n",
                    "label" =>  "Nefes21 Akademi",
                    "name" =>  "Nefes21",
                    "position" =>  "",
                    "surname" =>  "Akademi",
                    "title" =>  "Nefes21 Akademi",
                    "headerImageUrl" =>  "/images/author-headers/901153-899274.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901153-576089.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901154",
                    "info" =>  "Ankara üniversitesi mühendislik fakültesi gıda mühendisliği ve beslenme uzmanlığı eğitimlerini tamamladı. Ankara da DTCF konservatuvarı disiplininde 5 yıl aktif tiyatro ve sahne sanatları ile ilgilendi. 1 oyun yönetti. Lise yıllarında başlayan kişisel gelişim merakı bu günlere kadar disipliner bir şekilde gelişerek devam etti. Nefes21 Akademi ekibi koordinatörü olarak çalışmalarına devam etmektedir.",
                    "label" =>  "Senem Kanbir",
                    "name" =>  "Senem",
                    "position" =>  "Gıda Mühendisi",
                    "surname" =>  "Kanbir",
                    "title" =>  "Gıda Mühendisi",
                    "headerImageUrl" =>  "/images/author-headers/901154-178525.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901154-137499.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901155",
                    "info" =>  "ICF onaylı Profesyonel Yaşam Koçluğu eğitimi, Profesyonel Yaşam ve Nefes Koçluğu Eğitimi, Travma Terapi Danışmanlığı ( ROMPC) Eğitimi , NLP( Neuro-linguistic programing), EFT ( Emotional Freedom Techniques), Neuro- Format (Barış Muşlu),Çakroloji (Nilüfer Özden Sarıca), ve bir yıl süreyle Tasavvuf eğitimi aldı. Bunlarla eş zamanlı bir çok eğitim, seminer ve kamplara katıldı.",
                    "label" =>  "Nuran Filiz",
                    "name" =>  "Nuran",
                    "position" =>  "Profesyonel Koç",
                    "surname" =>  "Filiz",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901155-771752.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901155-944034.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901156",
                    "info" =>  "Birçok kitap, roman, film ve belgeseli olan yazar, senarist ve yönetmendir. Occupy filmmakers, occupy writers ve insan hakları aktivistidir. 2018 yılında Türkiye Altın Kalem Edebiyat Ödülü’nü kazanmış ve 2019 yılında İngiltere'nin en iyi yazarı seçilmiştir. Yazar, \"21 Yüzyıl İnsanlık Formu\" Başkanı'dır. Girne Amerikan Üniversitesi öğretim görevlisi olmakla birlikte Sufi Akademi ve Nefes21 Akademi’de tasavvuf eğitmenidir. Dünya Biyografi Yazarları Birliği ve Uluslararası PEN Yazarlar Birliği asil üyesidir. Ferhatatik.com\n",
                    "label" =>  "Ferhat Atik",
                    "name" =>  "Ferhat",
                    "position" =>  "Yazar - Yönetmen",
                    "surname" =>  "Atik",
                    "title" =>  "Yazar - Yönetmen",
                    "headerImageUrl" =>  "/images/author-headers/901156-651901.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901156-761027.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901157",
                    "info" =>  "Harran Üniversitesi Gıda Mühendisliği bölümünden mezun oldu. Aynı yıllarda Kocaeli Üniversitenin Teknik Eğitim Fakültesinde Pedagojik Formasyon eğitimini tamamladı.\n\nKariyerine kurumsal bir yemek şirketinde gıda mühendisi olarak başladı. Bu şirkette toplam 7 yıl süreyle mühendis, yönetici ve bölge müdürü olarak görev yaptı. Bölge müdürü göreviyle birlikte ve sonrasında aynı kurumda Yeni Yönetici Geliştirme Uzmanı ve Eğitmen olarak görev aldı. Kariyer hayatı devam ederken, Kocaeli Life dergisinde Gurme Kâşif köşe yazarlığı, Gurmex internet sitesinde mekân ve seyahat yazarlığı yaptı. \n",
                    "label" =>  "Gamze Kır Sapancı",
                    "name" =>  "Gamze",
                    "position" =>  "Editör Asistanı",
                    "surname" =>  "Kır Sapancı",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901157-589341.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901157-908172.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901158",
                    "info" =>  "Liseyi bitirdiğinde evlenmeye karar verdi. Yaşadığı\ndeneyimler onu kişisel gelişim konuları üzerine\nyönlendirmeye başlayınca, Kozmik Enerji, Yaşam Koçluğu,\nHipnoz, Access Bars, Nlp, Eft, Sarkaç eğitimleri ile hayatında\nyeni bir yolculuk başlamıştı.\n38 yaşında okumaya karar verdi. Atatürk üniversitesi Halkla\nİlişkiler Lisans programını tamamladı.\nŞu an kendi merkezinde bireysel seanslar ve eğitimler\nvermekte. ",
                    "label" =>  "Fatoş Koca",
                    "name" =>  "Fatoş ",
                    "position" =>  "",
                    "surname" =>  "Koca Tümmü",
                    "title" =>  "Yaşam Koçu",
                    "headerImageUrl" =>  "/images/author-headers/901158-840424.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901158-774393.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901159",
                    "info" =>  "1994 yılında Berlin'de doğdu. Kişisel gelişime yoğun ilgisinden 2019 yılında İCF onaylı profesyonel yaşam ve nefes koçluğu eğitimi veren DUSOD akademisiyle tanıştı ve 2020 de eğitimini tamamladı. Kişisel gelişim alanında eğitimlere devam etmektedir. Uzun yıllardır sosyal projelerde yerini almış ve insani ilişkiler üzerine çalışmalarını sürdürmüştür.\nKişisel gelişim portalı nefes21.com da köşe yazarlığı yapmaktadır. Türkçe ve Almanca içerikler üretip,  projeler hazırlamaktadır.\n",
                    "label" =>  "Zülal Pelit",
                    "name" =>  "Zülal ",
                    "position" =>  "",
                    "surname" =>  "Pelit",
                    "title" =>  "Yaşam Koçu",
                    "headerImageUrl" =>  "/images/author-headers/901159-543069.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901159-387297.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901160",
                    "info" =>  "Gazi Üniversitesi Kimya Bölümünden mezun oldu. \nİstanbul Üniversitesi Çocuk Gelişimi eğitimine devam ediyor.\nKariyerine Bayer İlaç firmasında Kimyager olarak başladı ve daha sonraki yıllarda insanlarla daha iç içe olma kararı alarak, kariyerine Finans Sektöründe devam etti. O yıllarda Profesyonel koçlukla tanıştı ve Rana Kaplan Akademi’ den koçluk eğitimi aldı. Ardı sıra NLP uygulayıcısı, Eğitici Eğitimi ve Beslenme Koçluğu eğitimlerini de tamamlayarak kurumun eğitmenlerinden biri olarak devam ediyor. \n",
                    "label" =>  "Duygu Korkmaz",
                    "name" =>  "Duygu",
                    "position" =>  "Profesyonel Koç",
                    "surname" =>  "Korkmaz",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901160-759641.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901160-533095.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901161",
                    "info" =>  "Lise eğitimini bitirdikten sonra evlenmeye karar verdi. Yaşamış olduğu farkındalıklarla, hayatında bir seçim yapmıştı. Eskişehir Anadolu Üniversitesi, Kamu Yönetimi Bölümü okudu. Nefes21 Akademi eğitimini tamamladıktan sonra, Rana Kaplan Akademiden ICF Onaylı Profesyonel Koçluk ve yine Rana Kaplan Akademide NLP Eğitimini aldı.\nAldığı eğitimleri, önce kendi hayatına geçirmesiyle birlikte bunu profesyonel iş hayatına taşıdı. Nefes21 yazı bölümünde, yazıları yayınlanmakta.",
                    "label" =>  "Ayşe Özkılıç",
                    "name" =>  "Ayşe ",
                    "position" =>  "",
                    "surname" =>  "Özkılıç",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901161-564740.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901161-691027.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901162",
                    "info" =>  "İstanbul Medipol Üniversitesi İnsan ve Toplum Bilimleri Fakültesi Psikoloji Bölümünden mezun oldu. İstanbul Bakırköy Prof. Dr. Mazhar Osman Ruh Sağlığı ve Sinir Hastalıkları Eğitim ve Araştırma Hastanesi’nde Klinik Psikoloji Stajını tamamladı. İstanbul Haliç Üniversitesinde Klinik Bilişsel Davranışçı Terapi Eğitimi aldı. Oyun Terapisi, Yaratıcı Sanat Terapisi, Mindfulness Uzmanlık Eğitimi ve Profesyonel Koçluk Eğitimini tamamladı.",
                    "label" =>  "Gizem Bat",
                    "name" =>  "Gizem",
                    "position" =>  "",
                    "surname" =>  "Bat",
                    "title" =>  "Psikolog/Terapist/Prf.Koç",
                    "headerImageUrl" =>  "/images/author-headers/901162-247537.jpg",
                    "isConsulting" =>  true,
                    "profilePicUrl" =>  "/images/author-profiles/901162-174766.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901163",
                    "info" =>  "Bilgisayar Programcılığı ve Bilgisayar Mühendisliği bölümlerinden mezun olduktan sonra, İşletme ve Siber Güvenlik alanlarınla yüksek lisans yaptı. Teknik Eğitim Fakültesinde Pedagojik Formasyon eğitimini tamamladı. Aldığı diğer eğitimler:\n\n-Rana Kaplan ICF Koçluk Eğitimi\n-EFT\n-Reiki\n-Bioenerji\n-Mindfullnes\n-Regresyon terapi\n-Bilinçaltı sembol dili\n-Kuantum düşünce eğitimi\n-Holistik beslenme ve yeme bozukluğu\n",
                    "label" =>  "Neslihan Nalbant",
                    "name" =>  "Neslihan",
                    "position" =>  "",
                    "surname" =>  "Nalbant",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901163-339366.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901163-301827.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901164",
                    "info" =>  "Ankara Gazi Üniversitesi Türk Dili ve Edebiyatı Bölümü’nden mezun oldu. Aynı yıllarda\nüniversitenin Eğitim Fakültesinde Pedagojik Formasyon eğitimini tamamladı.\nYaşadığı olaylarla ilgili olarak hayat yolculuğunu sorgulamaya başladığında ise Reiki Master, İlahi Dokunuş\nUygulayıcılığı, Quantum-Touch, Pranik Şifa Uygulayıcılığı ve Eğitmenliği, Profesyonel Koçluk,\nNLP, Eğiticinin Eğitimi, Quantum ve Tasavvuf, Mindfulness Temelli Stres Azaltma Programı\neğitimlerini tamamladı.\nHalen Şifa, NLP eğitimleri vermekte; atölye çalışmaları ve bireysel seanslar yapmaktadır.\n",
                    "label" =>  "Zeynep Sarıkavak",
                    "name" =>  "Zeynep",
                    "position" =>  "",
                    "surname" =>  "Sarıkavak",
                    "title" =>  " PCC / NLP Uzmanı/ Eğitmen",
                    "headerImageUrl" =>  "/images/author-headers/901164-846195.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901164-950698.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901165",
                    "info" =>  "Gazi Üniversitesi Çocuk Gelişimi ve Okul Öncesi Öğretmenliği bölümünden\nmezun olup, drama alanında da eğitimlere katılmıştır. MEB’e bağlı ana okullarda öğretmen olarak başlamış olup farklı okullardaki görevlerini 24 yıl boyunca\nsürdürdükten sonra kendine ait anaokulunun yöneticilik görevini üstlenmiştir. Nefes 21 akademiden aldığı eğitim sonunda kişisel gelişim alanına yöneltmiştir. Buna yönelik Rana Kaplan Akademiden ICF onaylı profesyonel yaşam koçluk eğitimi almıştır. Halen aynı kurumun NLP Eğitimine devam etmektedir.Nefes21 yazı sayfasında yazıları ve hikayeleri yayınlanmaktadır.",
                    "label" =>  "Memnune Nazlıoğlu",
                    "name" =>  "Memnune",
                    "position" =>  "",
                    "surname" =>  "Nazlıoğlu",
                    "title" =>  "Nefes21",
                    "headerImageUrl" =>  "/images/author-headers/901165-654418.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901165-513364.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901166",
                    "info" =>  "Başkent Üniversitesi Ticari Bilimler Fakültesi Yönetim Bilişim Sistemleri bölümünden mezun oldu.\nEşiyle kurduğu bilişim firmasında çalışmaya devam etmektedir. Kişisel gelişimi için çeşitli eğitimler almış olup, hayatında uygulamaya çalışan bir yolcudur.\nAldığı eğitimler:\n-Kuantum Manyetizma Şifa Sistemi (6.09.2019) \n-Access The Bars (28.07.2019) \n-Kişisel Gelişim,Farkındalık ve Nefes Teknikleri Atölye Çalışması Katılım Sertifikası (20-30.06.2019) \n-Professional Coaching Training’s one part with 10CCEU-3CCEU-Breathing Techniques (3.05.2018)",
                    "label" =>  "Tuğba Sümen",
                    "name" =>  "Tuğba ",
                    "position" =>  "",
                    "surname" =>  "Sümen",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901166-529971.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901166-367147.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901167",
                    "info" =>  "Ankara ‘da doğdum. Değişimin insanın kendisinden başladığını anlamaya başladıktan sonra Rana Kaplan Akademiden koçluk eğitimi aldım.Hayatımın birçok döneminde güzel sanatlara karşı merakım oldu. Sadece bedenden var olmadığımıza çocukluğumda beri inandığım için theta healing eğitimi ile bu inancımı pekiştirdim.     Yeni şeyler öğrenmek ve paylaşmak benim için çok keyifli olduğu için kendime ve bütüne şifa niyeti ile kendi ilgi alanlarımda  devam etmekteyim.\n",
                    "label" =>  "Muhsine Aydın",
                    "name" =>  "Muhsine",
                    "position" =>  "",
                    "surname" =>  "Aydın",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901167-951885.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901167-884620.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901168",
                    "info" =>  "2000 yılından bu yana yerli yabancı doğrudan satış şirketlerinde ekip liderliği yaparken, şirket içi eğitimlerde kişisel gelişim alanında\neğitimler verdi. 2013 de Bülent Gardiyanoğlu ile tanıştım ve sonrasında Profesyonel Koçluk, Nlp, Eğitim ve Öğrenci Koçluğu ile\ndiğer eğitimlerle 7 yıldır profesyonel koçluk alanında bireysel, grupsal çalışmalar, eğitimlerle yola devam ediyor.",
                    "label" =>  "Yasemin AKTAĞ",
                    "name" =>  "Yasemin",
                    "position" =>  "",
                    "surname" =>  "Aktağ",
                    "title" =>  "Profesyonel Koç",
                    "headerImageUrl" =>  "/images/author-headers/901168-752955.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901168-541028.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ],
                [
                    "author_id" =>  "901169",
                    "info" =>  "1976'da Kocaeli' doğumlu olup, evli ve 2 çocuk annesidir. Anadolu Üniversitesi Sosyal bilimler bölümü mezunudur.Bununla birlikte Nefes21 akademi, Eğitim Öğrenci ve Yaşam koçu, Diksiyon eğitimi alarak kitap bölümleri seslendirmektedir..Vantrolog  kukla oynatıcısı eğitimi aldıktan sonra bu konuda youTube sayfasında içerikler üretimektedir. Kitap ve şarkı sözü yazmaktadır. ",
                    "label" =>  "Yasemin Hakikat DERİN",
                    "name" =>  "Yasemin ",
                    "position" =>  "",
                    "surname" =>  "Hakikat Derin",
                    "title" =>  "Yaşam Koçu",
                    "headerImageUrl" =>  "/images/author-headers/901169-678238.jpg",
                    "isConsulting" =>  false,
                    "profilePicUrl" =>  "/images/author-profiles/901169-733542.jpg",
                    "created_by" => 801000, "updated_by" => 801000
                ]
            ];
    }
}
