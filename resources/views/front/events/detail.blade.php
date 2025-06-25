@extends('front.layouts.app')

@section('content')

    <main id="page_content">
        <div class="hero" style="background-image: url({{ asset('assets/images/banner/banner5.webp') }});"></div>
        <div class="under-hero container">
            <div class="section">
                <div class="row">
                    <div class="col-xl-8 px-4 px-md-5 px-xl-0 mx-auto mb-5">
                        <h1>İç Sesinle Yeniden Buluşmak</h1>
                        <p>İç Sesinle Yeniden Buluşmak ( Yeni Tarih Kısa Sürede Paylaşıyor Olacağız )</p>
                        <ul class="info-list info-list--dotted mt-3">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar">
                                            <div class="avatar__image"><img src="{{ asset('assets/images/users/thumb-3.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <div class="avatar__image"><img src="{{ asset('assets/images/users/thumb-4.jpg') }}" alt="">
                                            </div>
                                        </div>
                                        <div class="avatar">
                                            <div class="avatar__image"><img src="{{ asset('assets/images/users/thumb-5.jpg') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="ps-1">24+</div>
                                </div>
                            </li>
                            <li>Online Katılım Sertifikalı</li>
                            <li class="fw-semi-bold">22 Aralık 2022
                            </li>
                        </ul><a href="#" class="btn btn-primary mt-4" style="min-width: 140px;">
                            <div class="btn__wrap"><i class="ri-add-circle-line"></i> <span>Etkinliğe Katıl</span></div>
                        </a>
                    </div>
                    <div class="col-xl-10 mx-auto mb-5">
                        <div class="cover cover--round">
                            <div class="cover__image">
                                <img src="{{ asset('assets/images/events/ic-sesinle-yeniden-bulusmak-2022-03-02-257.jpg') }}" alt="Event cover">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 px-4 px-md-5 px-xl-0 mx-auto">
                        <div class="row fs-6 mb-4">
                            <div class="col-sm-6 d-flex mb-3"><i class="ri-map-pin-2-fill fs-5"></i>
                                <div class="ps-3"><span class="d-block mb-2 fw-semi-bold text-dark">Venue At</span>
                                    <p>2102 Tennessee Avenue,<br>Plymouth MI - 48170</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center mb-3"><i class="ri-phone-fill fs-5"></i> <a
                                        href="tel:+0734-637-0374" class="ms-3 text-dark">0734-637-0374</a></div>
                                <div class="d-flex align-items-center"><i class="ri-mail-open-fill fs-5"></i> <a
                                        href="mailto:y65nl6lt7pf@payspun.com"
                                        class="ms-3 text-dark">y65nl6lt7pf@payspun.com</a></div>
                            </div>
                        </div>
                        <p>İçimizde iki tane ses var.</p>
                        <p>Vesvese ve İlahi olan.</p>
                        <p>İlahi olan bir kes ve kısık konuşur. Ardından ise vesvese yüksek ve kavgacı bir ses ile zihnimizdeki mahallelerde elinden geldiğince gürültü yapıp dikkatimizi dağıtmaya çalışıyor.</p>
                        <p>Hayatımızın içerisinde doğru kararlar alırken, yaşam amacımızı ararken ve hedeflerimize ilerlerken iç ses çok önemli.</p>
                        <p>Sizlerle iç sesimizi ayırt edebilmeyi, içimizdeki bilge ile konuşabilmeyi ve daha birçok güzel konuları sizlerle paylaşabilmeye niyet ediyorum.</p>
                        <span class="text-black">Etkinlik kayıt fiyatları :</span>
                        <p>04.Nisan.2022 tarihine kadar indirimli fiyat 350,00 TL</p>
                        <p>16.Mayıs.2022 tarihine kadar Ramazan ve Ramazan Bayramı için indirimli fiyat 450,00 TL</p>
                        <p>18.Temmuz.2022 tarihine kadar Kurban Bayramı sonuna kadar 550,00 TL</p>
                        <p>17.Eylül.2022 tarihine kadar 700,00 TL</p>
                        <p>İç ses atölyemizin tekrarı 2023 yılında gerçekleşecektir.</p>
                        <p>Hadi kendin için adım at ve atölyemize sen de katıl.</p>
                        <p>Türkiye ve Kuzey Kıbrıs Türk Cumhuriyeti Saat  16:00 – 18:30</p>
                        <p>Avrupa Saati 15:00 – 17:30</p>

                    </div>
                </div>
            </div>
        </div>
        <x-front.footer.footer :items="[]" />
    </main>
@endsection
