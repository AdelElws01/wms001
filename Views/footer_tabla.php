<script src="Libraries/js/bootstrap_53/js/bootstrap.min.js"></script>
<script src="Libraries/js/bootstrap_53/js/popper.min.js"></script>

<script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                responsive: true,
                layout: {
                    topStart: {
                        buttons: [
                            'copy', 'excel', 'pdf'
                        ]
                    }
                }
            });
        } );
    </script>
</body>
</html>