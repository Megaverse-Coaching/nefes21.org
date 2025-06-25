<footer id="footer">

    <div class="container mb-5">
        <div class="d-flex flex-wrap justify-content-center mb-4">
            <img class="w-25" src="{{ asset('assets/images/logos/logo1.webp') }}" alt="Nefes21 - Kişisel Gelişim Platformu">
        </div>

        <div class="app-btn-group pt-2">
            <!-- Telefon butonu WhatsApp yönlendirmesi -->
            <a href="https://wa.me/905488720090" class="btn btn-lg btn-primary" target="_blank">
                <div class="btn__wrap">
                    <i class="ri-phone-fill"></i>
                    <span class="ms-2">+90 (548)-872-0090</span>
                </div>
            </a>
            
            <!-- E-posta butonu da WhatsApp yönlendirmesi -->
            <a href="https://wa.me/905488720090" class="btn btn-lg btn-primary d-none" target="_blank">
                <div class="btn__wrap">
                    <i class="ri-mail-fill"></i>
                    <span class="ms-2">info@nefes21.org</span>
                </div>
            </a>
        </div>
        
        <div class="app-btn-group pt-2">
            <a href="https://www.facebook.com/bgardiyanoglu" class="me-2 nefes21-facebook" target="_blank">
                <i class="ri-facebook-line fs-1"></i>
            </a>
            <a href="http://www.t.me/nefes21" class="me-2 nefes21-telegram" target="_blank">
                <i class="ri-telegram-line fs-1"></i>
            </a>
            <a href="https://www.instagram.com/bgardiyanoglu/" class="me-2 nefes21-instagram" target="_blank">
                <i class="ri-instagram-line fs-1"></i>
            </a>
            <a href="https://wa.me/905488720090" class="me-2 nefes21-whatsapp" target="_blank">
                <i class="ri-whatsapp-line fs-1"></i>
            </a>
        </div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-12 offset-sm-0 offset-lg-3 d-none">
        <x-front.banners.trial-banner/>
    </div>
</footer>
