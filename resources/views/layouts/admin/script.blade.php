<!-- jquery
  ============================================ -->
<script src="{{ asset('assets/js/vendor/jquery-1.11.3.min.js') }}"></script>
<!-- bootstrap JS
  ============================================ -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- wow JS
  ============================================ -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<!-- price-slider JS
  ============================================ -->
<script src="{{ asset('assets/js/jquery-price-slider.js') }}"></script>
<!-- meanmenu JS
  ============================================ -->
<script src="{{ asset('assets/js/jquery.meanmenu.js') }}"></script>
<!-- owl.carousel JS
  ============================================ -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- sticky JS
  ============================================ -->
<script src="{{ asset('assets/js/jquery.sticky.js') }}"></script>
<!-- scrollUp JS
  ============================================ -->
<script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
<!-- mCustomScrollbar JS
  ============================================ -->
<script src="{{ asset('assets/js/scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollbar/mCustomScrollbar-active.js') }}"></script>
<!-- metisMenu JS
  ============================================ -->
<script src="{{ asset('assets/js/metisMenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/js/metisMenu/metisMenu-active.js') }}"></script>
<!-- morrisjs JS
  ============================================ -->
<script src="{{ asset('assets/js/morrisjs/raphael-min.js') }}"></script>
<script src="{{ asset('assets/js/morrisjs/morris.js') }}"></script>
<script src="{{ asset('assets/js/morrisjs/morris-active.js') }}"></script>
<!-- morrisjs JS
  ============================================ -->
<script src="{{ asset('assets/js/sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('assets/js/sparkline/jquery.charts-sparkline.js') }}"></script>
<!-- calendar JS
  ============================================ -->
<script src="{{ asset('assets/js/calendar/moment.min.js') }}"></script>
<script src="{{ asset('assets/js/calendar/fullcalendar.min.js') }}"></script>
<script src="{{ asset('assets/js/calendar/fullcalendar-active.js') }}"></script>
<!-- plugins JS
  ============================================ -->
<script src="{{ asset('assets/js/plugins.js') }}"></script>
<!-- main JS
  ============================================ -->
<script src="{{ asset('assets/js/main.js') }}"></script>

<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
{{-- <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script> --}}

<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
<script>
    $(":input").inputmask();
</script>

<script type="text/javascript">
    $('.show_area').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal.fire({
                title: `Are you sure you want to deactivte this record?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
<script type="text/javascript">
    $('.show_package').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal.fire({
                title: `Are you sure you want to deactivte this record?`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        Swal.fire({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                showDenyButton: true,
                showConfirmButton: false,
                denyButtonText: "Delete",
            })
            .then((result) => {
                if (result.isDenied) {
                    form.submit();
                }
            });
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"
    integrity="sha512-d5Jr3NflEZmFDdFHZtxeJtBzk0eB+kkRXWFQqEc1EKmolXjHm2IKCA7kTvXBNjIYzjXfD5XzIjaaErpkZHCkBg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $("#print").click(function() {
            $(".container1").printThis({

            });
        });
    });
</script>
<script>
    $('#example').dataTable()
</script>
