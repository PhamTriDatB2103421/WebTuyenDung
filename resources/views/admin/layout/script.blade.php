<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<!-- Bootstrap core JavaScript-->
<script src="{{ asset('BackEnd/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('BackEnd/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('BackEnd/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('BackEnd/js/sb-admin-2.min.js') }}"></script>

<!-- Page level plugins -->
<script src="{{ asset('BackEnd/vendor/chart.js/Chart.min.js') }}"></script>

<!-- Page level custom scripts -->
<script src="{{ asset('BackEnd/js/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('BackEnd/js/demo/chart-pie-demo.js') }}"></script>
<script>
    // Khởi tạo CKEditor cho trường nội dung
    CKEDITOR.replace('noi_dung');
</script>
