<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <!-- <li class="header">MAIN NAVIGATION</li> -->
            <li class="header">Login by : <?php echo $_SESSION['username'];?></li>
            <li class="header"><?php echo date('l, d-m-Y  h:i:s a');?></li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-list-alt"></i> <span>Berita</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
                <li><a href="index.php?page=home"><i class=" glyphicon glyphicon-home"></i> Beranda</a></li>
                <li><a href="index.php?page=berita"><i class="glyphicon glyphicon-pencil"></i> Input Berita</a></li>
                <li><a href="index.php?page=list_berita"><i class="glyphicon glyphicon-list active"></i> List Berita</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-globe"></i> <span>Monitoring</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
                <li><a href="https://www.freewifi.tech:10000/"><i class="glyphicon glyphicon-tasks active"></i> Server</a></li>
                <li><a href="index.php?page=rd"><i class=" glyphicon glyphicon-stats"></i> Radius</a></li>
                <li><a href="index.php?page=hotspot"><i class="glyphicon glyphicon-signal"></i> Client Hotspot</a></li>
                <li><a href="index.php?page=adduser"><i class="glyphicon glyphicon-user"></i> Add Client Hotspot</a></li>
                <li><a href="index.php?page=serverhotspot"><i class="glyphicon glyphicon-hdd"></i> Server Hotspot</a></li>
                <li><a href="index.php?page=radius"><i class="glyphicon glyphicon-sort"></i> Log Radius</a></li>
                <li><a href="index.php?page=logmikrotik"><i class="glyphicon glyphicon-sort"></i> Log Mikrotik</a></li>

              </ul>
            </li>   

            <li class="treeview">
              <a href="#">
                <i class="glyphicon glyphicon-scale"></i> <span>QOS Bandwidth</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu"> 
                <li><a href="index.php?page=simple"><i class="glyphicon glyphicon-import"></i> Queue Simple</a></li>
                <li><a href="index.php?page=tree"><i class="glyphicon glyphicon-export"></i> Queue Tree</a></li>
              </ul>
            </li>

            <li class="treeview">         	
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
              </a>
            </li>          
          </ul>
        </section>
        <!-- /.sidebar -->
</aside>


                     
