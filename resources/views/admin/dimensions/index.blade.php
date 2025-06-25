<x-base-layout>
    <!--begin::Toolbar-->
    <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
        <!--begin::Toolbar container-->
        @include('admin.dimensions._toolbar')
        <!--end::Toolbar container-->
    </div>
    <!--end::Toolbar-->
    <!--begin::Content-->
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <!--begin::Content container-->
        <div id="kt_app_content_container" class="app-container container-fluid">
            @include('admin.dimensions._table')
        </div>
        <!--end::Content container-->
    </div>
    <!--end::Content-->

    @include('admin.dimensions._modals')

    <script>
        document.querySelectorAll('.button-ajax').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const actionUrl = this.dataset.action;
                const csrfToken = this.dataset.csrf;

                if (!actionUrl || !csrfToken) {
                    console.error('Action URL veya CSRF token eksik!');
                    return;
                }

                if (confirm('Bu öğeyi silmek istediğinizden emin misiniz?')) {
                    axios.delete(actionUrl, {
                        headers: {
                            'X-CSRF-TOKEN': csrfToken, // CSRF tokeni gönder
                        },
                    })
                        .then(response => {
                            if (response.status === 200) {
                                location.reload(); // Gerekirse sayfayı yenile
                            } else {
                                alert('Bir hata oluştu!');
                            }
                        })
                        .catch(error => {
                            console.error('Hata:', error.response || error);
                            alert('Silme işlemi başarısız oldu!');
                        });
                }
            });
        });


    </script>
</x-base-layout>
