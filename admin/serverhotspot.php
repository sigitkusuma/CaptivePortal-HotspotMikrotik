<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Server Hotspot</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hotspot Address</th>
                            <th>DNS Name</th>
                            <th>HTML Directory</th>
                            <th>HTTP Proxy Port</th>
                            <th>SMTP Server</th>
                            <th>Login By</th>
                            
                            <th>Split User Domain</th>
                            <th>Use Radius</th>
                            <th>Radius Accounting</th>
                            <th>Radius Interim Update</th>
                            <th>NAS Port Type</th>
                            <th>Radius Mac Format</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                       <?php
                        require('../config/routeros_api.class.php');
                        $API = new RouterosAPI();
                        $API->debug = false;
                        if ($API->connect('71a306971b23.sn.mynetname.net', 'admin', 'admin')) 
                        {
                          $API->write('/ip/hotspot/profile/print');
                          $READ = $API->read(false);
                          $ARRAY = $API->parseResponse($READ);
                          foreach ($ARRAY as $row) 
                          { 
                            echo "<center><tr>";
                                echo "<td>".$row['name']."</td>";
                                echo "<td>".$row['hotspot-address']."</td>";
                                echo "<td>".$row['dns-name']."</td>";
                                echo "<td>".$row['html-directory']."</td>";
                                echo "<td>".$row['http-proxy']."</td>";
                                echo "<td>".$row['smtp-server']."</td>";
                                echo "<td>".$row['login-by']."</td>";
                                echo "<td>".$row['split-user-domain']."</td>";
                                echo "<td>".$row['use-radius']."</td>";
                                echo "<td>".$row['radius-accounting']."</td>";
                                echo "<td>".$row['radius-interim-update']."</td>";
                                echo "<td>".$row['nas-port-type']."</td>";
                                echo "<td>".$row['radius-mac-format']."</td>";                   
                            echo("</tr></center>");
                          }
                          $API->disconnect();
                        }
                       ?>
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
    <!-- /.col -->
<script>
    function datadel(value,jenis){
       document.getElementById('mylink').href="hapus.php?del="+value+"&data="+jenis;
    }
</script>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Data akan terhapus !</h4>
            </div>
            <div class="modal-body">
                Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a id="mylink" href=""><button type="button" class="btn btn-primary">Delete Data</button></a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- /.row -->

