<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>


<script src="{{ asset('home/') }}/lib/wow/wow.min.js"></script>
<script src="{{ asset('home/') }}/lib/easing/easing.min.js"></script>
<script src="{{ asset('home/') }}/lib/waypoints/waypoints.min.js"></script>
<script src="{{ asset('home/') }}/lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="{{ asset('home/') }}/js/main.js"></script>


<!-- Datatables -->
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#data-alumni').DataTable({});
    });
</script>

@stack('js')
@stack('js-internal')

