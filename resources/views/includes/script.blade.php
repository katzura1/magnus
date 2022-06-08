<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- Select2 -->
<script src="{{  asset('plugins/select2/js/select2.full.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
<!-- InputMask -->
<script src="{{  asset('plugins/moment/moment.min.js') }}"></script>
<script src="{{  asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<!-- bs-custom-file-input -->
<script src="{{  asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('js/adminlte.min.js') }}"></script>

<script>
    $(document).ready(function() {

        var url = "{{ URL::to('/') }}";
        var url_segment1 = "{{ Request::segment(1) }}";
        var url_segment2 = "{{ Request::segment(2) }}";


        function set_menu(url= '', url_1 = '', url_2 = '') {
            if (url_1 != '') {
                url += '/' + url_1;
            }
            if (url_2 != '') {
                url += '/' + url_2;
            }
            // for sidebar menu entirely but not cover treeview
            $("ul.nav-sidebar a")
                .filter(function() {
                    return this.href == url;
                })
                .addClass("active");

            // for treeview
            $("ul.nav-treeview a")
                .filter(function() {
                    return this.href == url;
                })
                .parentsUntil("nav-sidebar > .nav-treeview")
                .addClass("menu-open")
                .prev("a")
                .addClass("active");
        }

        set_menu(url,url_segment1,url_segment2);
        bsCustomFileInput.init();
        // $('.select').select2();
    })
</script>