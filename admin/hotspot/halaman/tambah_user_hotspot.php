<?php $API->write("/ip/hotspot/user/profile/print");   
	  $glimit = $API->read();
		
	if(!empty($_GET['id'])){
		$judul = "Edit";
		$id = $_GET['id'];
		$aksi = "update";
		$button = "Update";
	    $API->write("/ip/hotspot/user/print",false);   
	    $API->write("?.id=".$id,true);   
	    $p = $API->read(); 
	    foreach($p as $tam){
			$user = $tam['name'];
			$pass = $tam['password'];
			$profile = $tam['profile'];
			$ket = $tam['comment'];
	    }
	} else {
		$id = "";
		$aksi = "save";
		$judul = "Tambah";
		$button = "Simpan";
		$user = "";
		$pass = "";
		$ket = "";
		$profile = "";
	}
?>
<div class="span9">
       <h3 class="page-title"><?php echo $judul; ?> User Hotspot</h3>

<div class="well">

    <form id="tuserhotspot" method="post" action="">
        <label>Nama User</label>
        <input type="hidden" id="idnya" value="<?php echo $id; ?>">
        <input type="hidden" id="aksi" value="<?php echo $aksi; ?>">
        <input type="text" id="user" value="<?php echo $user; ?>" name="user" class="input-xlarge required">
        <label>Password</label>
        <input type="password" id="pass" name="pass" value="<?php echo $pass; ?>" class="input-xlarge required">
        <label>Group Limitasi Bandwidth</label>
        <select name="glimit" id="glimit" class="input-large required warna">
			<option value="">-- Pilih --</option>
			<?php 
				foreach($glimit as $g){
					?>
			<option value="<?php echo $g['name'];?>" <?php if ($g['name']==$profile){ echo "selected"; }?>><?php echo $g['name']." (".$g['rate-limit'].")"; ?></option>
			<?php } ?>
		</select>   
		<label>Keterangan</label>
        <textarea id="ket" name="ket" rows="2" class="required"><?php echo $ket; ?></textarea>
		
        <div style="padding-top:20px">
            <input class="btn btn-primary" id="simpan" type="submit" value="<?php echo $button; ?> User Hotspot">
			<img src="images/loading.gif" id="lproses" class="load"/>
			<button class="btn"><a href="index.php?halaman=daftar_user_hotspot" style="color:black">Kembali</a></button>
		</div>
	</form>
      </div>
  </div>
 
 <script src="aksi/js/userhotspot/save.js"></script>
 
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Perhatian</h3>
  </div>
  <div class="modal-body">
    <p class="error-text"></p>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
  </div>
</div>

   