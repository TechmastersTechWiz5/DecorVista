<!-- ========== Footer Start ========== -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 text-center">
                <script>document.write(new Date().getFullYear())</script> &copy; Bombay Choconut. Crafted by <iconify-icon icon="iconamoon:heart-duotone" class="fs-18 align-middle text-danger"></iconify-icon> <a
                    href="#" class="fw-bold footer-text" target="_blank">Bombay Choconut</a>
            </div>
        </div>
    </div>
</footer>
<!-- ========== Footer End ========== -->

<!-- Vendor Javascript -->
<script src="../admin_assets/assets/js/vendor.js"></script>
<script src="../admin_assets/assets/js/app.js"></script>

<!-- Additional Scripts -->
<script src="../admin_assets/assets/vendor/jsvectormap/js/jsvectormap.min.js"></script>
<script src="../admin_assets/assets/vendor/jsvectormap/maps/world-merc.js"></script>
<script src="../admin_assets/assets/vendor/jsvectormap/maps/world.js"></script>

<!-- Custom Scripts -->
<script src="{{ URL::asset('admin_assets/assets/js/hummingbird-treeview.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/ajaxPost.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/status-update.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/form-upload.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/image-preview.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/pagination.js')}}"></script>
<script src="{{ URL::asset('admin_assets/assets/js/custom/filemanager.js')}}"></script>

@stack('scripts')
</body>
</html>
