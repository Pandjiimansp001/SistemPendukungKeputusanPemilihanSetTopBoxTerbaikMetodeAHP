<?php
include_once 'header.php';
include_once 'includes/skor.inc.php';
$pro1 = new Skor($db);
$count1 = $pro1->countAll();
include_once 'includes/kriteria.inc.php';
$pro3 = new Kriteria($db);
include_once 'includes/nilai.inc.php';
$pro2 = new Nilai($db);
/*if($_POST){
	
	include_once 'includes/bobot.inc.php';
	$eks = new Bobot($db);

	$eks->nm = $_POST['nm'];
	
	if($eks->insert()){
?>
<script type="text/javascript">
window.onload=function(){
	showStickySuccessToast();
};
</script>
<?php
	}
	
	else{
?>
<script type="text/javascript">
window.onload=function(){
	showStickyErrorToast();
};
</script>
<?php
	}
}*/
?>
		<div class="row">
<!--		  <div class="col-xs-12 col-sm-12 col-md-2">
		  <?php
//			include_once 'sidebar.php';
			?>
		  </div>-->
		  <div class="col-xs-12 col-sm-12 col-md-12">
		  <ol class="breadcrumb">
			  <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
			  <li class="active"><span class="fa fa-balance-scale"></span> Analisis Alternatif</li>
	  		  <li><a href="#" data-toggle="modal" data-target="#myModalalt"><span class="fa fa-table"></span> Tabel Analisis Alternatif</a></li>
			</ol>
			<!-- Modal -->
			<div class="modal fade" id="myModalalt" tabindex="-1" role="dialog" aria-labelledby="myModalLabelalt">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabelalt">Pilih Kriteria</h4>
			      </div>
			      <div class="modal-body">
			        <div class="list-group">
			        	<?php
						$stmt5 = $pro3->readAll();
						while ($row5 = $stmt5->fetch(PDO::FETCH_ASSOC)){
						?>
					  <a href="analisa-alternatif-tabel.php?kriteria=<?php echo $row5['id_kriteria'] ?>" class="list-group-item"><?php echo $row5['nama_kriteria'] ?></a>
					  	<?php
						}
						?>
					</div>
			      </div>
			    </div>
			  </div>
			</div>
		  	<p style="margin-bottom:10px;">
		  		<strong style="font-size:18pt;"><span class="fa fa-bomb"></span> Analisis Alternatif</strong>
		  	</p>
		  	<div class="panel panel-default">
		<div class="panel-body">
			
			    <form method="post" action="analisa-alternatif-tabel.php">
			    <div class="row">
					<div class="col-xs-12 col-md-3">
						<div class="form-group">
							<p style="padding:10px 0;"><label>Pilih Kriteria</label></p>
						</div>
					</div>
					<div class="col-xs-12 col-md-9">
						<div class="form-group">
							<select class="form-control" id="kriteria" name="kriteria">
								<?php
								$stmt4 = $pro3->readAll();
								while ($row4 = $stmt4->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row4['id_kriteria'] ?>"><?php echo $row4['nama_kriteria'] ?></option>
								<?php
								}
								?>
							</select>
							<p class="text-muted"> Silahkan pilih kriteria yang anda ingin perbandingkan dengan jurusan</p>
						</div>
					</div>
				</div>
				<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<label>Kriteria Pertama</label>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<label>Pernilaian</label>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<label>Kriteria Kedua</label>
						</div>
					  </div>
					</div>
					
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readAlternatif('A1');
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A11" value="<?php echo $row1['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl1">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readAlternatif('A2');
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A21" value="<?php echo $row3['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readAlternatif('A1');
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A12" value="<?php echo $row1['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl2">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readAlternatif('A3');
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A32" value="<?php echo $row3['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt2 = $pro1->readAlternatif('A2');
								while ($row1 = $stmt2->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row1['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A25" value="<?php echo $row1['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-6">
						<div class="form-group">
							<select class="form-control" name="nl5">
								<?php
								$stmt1 = $pro2->readAll();
								while ($row2 = $stmt1->fetch(PDO::FETCH_ASSOC)){
								?>
								<option value="<?php echo $row2['jum_nilai'] ?>"><?php echo $row2['jum_nilai'] ?> - <?php echo $row2['ket_nilai'] ?></option>
								<?php
								}
								?>
							</select>
						</div>
					  </div>
					  <div class="col-xs-12 col-md-3">
						<div class="form-group">
							<?php
								$stmt3 = $pro1->readAlternatif('A3');
								while ($row3 = $stmt3->fetch(PDO::FETCH_ASSOC)){
							?>
							<input type="text" class="form-control" value="<?php echo $row3['nama_alternatif'] ?>" readonly />
							<input type="hidden" name="A35" value="<?php echo $row3['id_alternatif'] ?>" />
							<?php
								}
							?>
						</div>
					  </div>
					</div>
					<center>
					<p class="text-muted">Setelah selesai silahkan klik tombol di bawah ini
					</p>
					<button type="submit" name="subankr" class="btn btn-primary"> Proses <span class="fa fa-arrow-right"></span></button></center>
				</form>
			   <center>
			  <h3>CARA PENILAIAN</h3>
			  	<p>Anda disini akan memasukan nilai dari perbandingan setiap Jurusan berdasarkan kriteria</p>
			  	<p>Jika anda memasukan Jurusan 1 & Jurusan 2 # nilai "1" #  maka dapat dikatakan bahwa Kriteria 1 dan 2 memiliki kepentingan yang sama terhadap kriteria</p>
			  	<p>Lalu Jika anda memasukan Jurusan 1 & Jurusan 2 #nilai "0,5" atau nilai < 1 , maka dapat dikatakan bahwa kriteria 1 0,5 mendekati lebih penting dari pada kriteria 2 atau bisa di katakan bawah Kriteria 2 sedikti lebih penting dari pada kriteria 1 terhadap kriteria</p>
			  	<p>Anda melakukan proses ini sebanyak 3 kali sesuai engan kriteria. dilakukan peng inputan 1 persatu</p>
			  </center>
		  </div></div></div>
		</div>
		<?php
include_once 'footer.php';
?>