<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Circl - Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,700,800&display=swap" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/font-awesome/css/all.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/apexcharts/apexcharts.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/datepicker.css" rel="stylesheet" />
    <link href="/tema/admin/circladmin-10/circl/theme/assets/plugins/DataTables/datatables.min.css" rel="stylesheet">

    <!-- Theme Styles -->
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/main.min.css" rel="stylesheet">
    <link href="/tema/admin/circladmin-10/circl/theme/assets/css/custom.css" rel="stylesheet">

</head>

<body>

    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="page-container">
        <!-- tempat halaman -->
        <?= $this->include('/admin/layout/v_nav'); ?>
        <?= $this->include('/admin/layout/v_side'); ?>
        <?= $this->renderSection('content'); ?>
    </div>

    <!-- Javascripts -->
    <!-- jquery -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/jquery/jquery-3.4.1.min.js"></script>
    <!-- popper  -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/popper.min.js"></script>
    <!-- bootstrap -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- feather -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/feather.min.js"></script>
    <!-- perfect scroll -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <!-- chart -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/apexcharts/apexcharts.min.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/chartjs/chart.bundle.min.js"></script>
    <!-- datatable -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/DataTables/datatables.min.js"></script>
    <!-- datepicker -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/datepicker.js"></script>
    <!-- pdf -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/pdfjs/build/pdf.js"></script>
    <script src="/tema/admin/circladmin-10/circl/theme/assets/plugins/pdfjs/build/pdf.worker.js"></script>

    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/main.min.js"></script>
    <!-- pages -->
    <script src="/tema/admin/circladmin-10/circl/theme/assets/js/pages/datatables.js"></script>

    <?= $this->renderSection('source'); ?>
    <!-- fungsi date picker format tahun -->
    <script>
        $("#tahun").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years"
        });
    </script>

    <!-- data table -->
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "oLanguage": {
                    "sSearch": "",
                    "sSearchPlaceholder": "Cari",
                    "sLengthMenu": "Tampil _MENU_ data",
                    "sInfo": "Menampilkan data _START_ sampai _END_ dari _TOTAL_ data",
                    "sZeroRecords": "Data tidak Ditemukan",
                    "sInfoFiltered": " - disaring dari _MAX_ data",
                }
            });
        });
    </script>
    <!-- pdf viewer -->
    <script>
        // Loaded via <script> tag, create shortcut to access PDF.js exports.
        var pdfjsLib = window['pdfjs-dist/build/pdf'];
        // The workerSrc property shall be specified.

        $("#dokumen").on("change", function(e) {
            var file = e.target.files[0]
            if (file.type == "application/pdf") {
                var fileReader = new FileReader();
                fileReader.onload = function() {
                    var pdfData = new Uint8Array(this.result);
                    // Using DocumentInitParameters object to load binary data.
                    var loadingTask = pdfjsLib.getDocument({
                        data: pdfData
                    });
                    loadingTask.promise.then(function(pdf) {
                        console.log('PDF loaded');

                        // Fetch the first page
                        var pageNumber = 1;
                        pdf.getPage(pageNumber).then(function(page) {
                            console.log('Page loaded');

                            var scale = 1.5;
                            var viewport = page.getViewport({
                                scale: scale
                            });

                            // Prepare canvas using PDF page dimensions
                            var canvas = $("#pdfViewer")[0];
                            var context = canvas.getContext('2d');
                            canvas.height = viewport.height;
                            canvas.width = viewport.width;

                            // Render PDF page into canvas context
                            var renderContext = {
                                canvasContext: context,
                                viewport: viewport
                            };
                            var renderTask = page.render(renderContext);
                            renderTask.promise.then(function() {
                                console.log('Page rendered');
                            });
                        });
                    }, function(reason) {
                        // PDF loading error
                        console.error(reason);
                    });
                };
                fileReader.readAsArrayBuffer(file);
            }
        });
    </script>

</body>

</html>