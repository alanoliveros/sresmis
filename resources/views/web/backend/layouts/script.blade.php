<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
    integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('storage/backend/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/chart.js/chart.umd.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/quill/quill.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/tinymce/tinymce.min.js') }}"></script>
<script src="{{ asset('storage/backend/assets/vendor/php-email-form/validate.js') }}"></script>
{{-- <script src="{{ asset('storage/backend/assets/vendor/simple-datatables/simple-datatables.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Template Main JS File -->
<script src="{{ asset('storage/backend/assets/js/main.js') }}"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
@yield('scripts')
