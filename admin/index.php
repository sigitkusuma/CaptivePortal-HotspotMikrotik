<?php
extract($_POST);
$con=mysqli_connect('localhost','root','root','db_skripsi');
// require '../config/koneksi.php';
?> 

    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>admin</title>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <!--jquery-->
        <script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <link rel="stylesheet" href="dist/css/summernote.css">
        <script src="dist/js/summernote.js"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <?php 
            session_start();
            if($_SESSION['status']!="login"){
                header("location:login_page.php?pesan=belum_login");
            }
        ?>
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="index.php?page=home" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg" ><b>ADMINISTRATOR</b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="glyphicon glyphicon-menu-hamburger"></span>
                    </a>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php include'menu.php'; ?>
                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <!-- Content Header (Page header) -->
                    <!-- Main content -->
                    <section class="content">
                        <?php 
                if(isset($_GET['page']))
                {
                 switch($_GET['page'])
                {
                    case 'berita': include'form_b.php'; break; 
                    case 'list_berita': include'list_berita.php';$order=3; break;
                    case 'home': include'home.php';break;
                    case 'server' : include'server.php'; break;
                    case 'rd' : include'rd.php'; break;
                    case 'hotspot' : include'hotspot.php'; break;
                    case 'adduser' : include'adduser.php'; break;
                    case 'serverhotspot' : include'serverhotspot.php';break;
                    case 'radius' : include'radius.php';break;
                    case 'logmikrotik' : include'logmikrotik.php';break;
                    case 'simple' : include'simple.php';break;
                    case 'tree' : include'tree.php';break;

                }   
                }
            ?>
                    </section>
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 1.0.0
                    </div>
                            <?php
                                $tanggal = time () ;
                                //Untuk mengambil data waktu dan tanggal saat ini dari server 
                                $tahun= date("Y",$tanggal);
                                //Memformat agar hanya menampilkan tahun 4 digit angka dengan Y (kapital)
                                echo " Copyright &copy; 2017 - " . $tahun;
                                /* baris ini mencetak rentang copyright,
                                Anda perlu mengganti 2011 dengan tahun pertama kali website Anda diluncurkan */
                            ?> FreeWifi - All Rights Reserved. 
                        </p>   
                </footer>
                <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- Bootstrap 3.3.5 -->
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.konten').summernote({
                    height: 300, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: true, // set focus to editable area after initializing summernote
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline', 'clear']],
                        ['fontname', ['fontname']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ['table', ['table']],
                        ['insert', ['link', 'hr']],
                        ['view', ['fullscreen', 'codeview']]
                    ],
					onPaste: function (e) {
                        var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                        e.preventDefault();
                        setTimeout(function () {
                            document.execCommand('insertText', false, bufferText);
                        }, 10);
					 }
                });
            });
        </script>
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script>
            $(function () {
                $("#example1").DataTable({
                   "lengthMenu": [[4, 8, 15, -1], [4, 8, 15, "All"]]
                });
            });
        </script>
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- jQuery Knob Chart -->
        <script src="plugins/knob/jquery.knob.js"></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js"></script>
        <script>
            $('#tgl_agenda').datepicker({
                format: 'dd-mm-yyyy'
            })
        </script>
    </body>
    </html>