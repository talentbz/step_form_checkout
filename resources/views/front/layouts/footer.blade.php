<footer class="bg-dark py-4 mt-auto">
    <div class="container px-5">
        <div class="row align-items-center justify-content-between flex-column flex-sm-row">
            <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Halteverbot Profi</div></div>
            <div class="col-auto">
                <a class="link-light small" href="#">Datenschutz</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#">Cookie Einstellungen</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#">AGB & Widerrufsrecht</a>
                <span class="text-white mx-1">&middot;</span>
                <a class="link-light small" href="#">Impressum</a>
            </div>
        </div>
    </div>
</footer>
<script src="{{ URL::asset('assets/libs/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ URL::asset('/assets/front/js/scripts.js')}}"></script>
@yield('script')