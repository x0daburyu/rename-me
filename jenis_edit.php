<?php
if( empty( $_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['submit'] )){
		//simpan perubahan jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		$jumlah = $_REQUEST['jumlah'];
		
		$sql = mysqli_query($koneksi, "UPDATE jenis_bayar SET jumlah='$jumlah', th_pelajaran='$tapel', tingkat='$tingkat' WHERE tingkat='$tingkat'");
		
		if($sql > 0){
			header('Location: ./admin.php?hlm=master&sub=jenis');
			die();
		} else {
			echo 'ada ERROR dg query';
		}
	} else {
		//form edit jenis pembayaran
		$tapel = $_REQUEST['tapel'];
		$tingkat = $_REQUEST['tingkat'];
		
		$sql = mysqli_query($koneksi, "SELECT * FROM jenis_bayar WHERE th_pelajaran='$tapel' AND tingkat='$tingkat'");
		list($thn, $tk, $jml) = mysqli_fetch_array($sql);
?>
<h2>Edit Jenis Bayar</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jenis&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="tapel" value="<?php echo $thn; ?>" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="tingkat" class="col-sm-2 control-label">Tingkat</label>
		<div class="col-sm-2">
			<select name="tingkat" id="tingkat" class="form-control">
				<option value="X"<?php echo ($tk == 'X') ? 'selected' : ''; ?>>X (Sepuluh)</option>
				<option value="XI"<?php echo ($tk == 'XI') ? 'selected' : ''; ?>>XI (Sebelas)</option>
				<option value="XII"<?php echo ($tk == 'XII') ? 'selected' : ''; ?>>XII (Dua belas)</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jumlah" class="col-sm-2 control-label">Jumlah Nominal</label>
		<div class="col-sm-3">
			<div class="input-group">
			  <div class="input-group-prepend">
			    <span class="input-group-text" id="basic-addon1">Rp.</span>
			  </div>
			  <input type="text" class="form-control" name="jumlah" value="<?php echo $jml; ?>" aria-describedby="basic-addon1">
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>