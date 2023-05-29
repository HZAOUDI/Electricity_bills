    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap5.bundle.min.js"></script>

    <script src="assets/js/jquery-3.6.3.min.js"></script>
    <script src="assets/js/jquery.dataTables.min.js"></script>
    <script src="assets/js/dataTables.bootstrap5.min.js"></script>
    
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>

    
    
    <!-- Summernote JS - CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            //$("#your_summernote").summernote();
            
            $('#your_summernote').summernote({
                placeholder: 'Ecrire ici votre description',
                
                height: 200
            });
   
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <!-- //Summernote JS - CDN Link -->

</body>
</html>