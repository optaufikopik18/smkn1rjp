<style type="text/css">
  @media screen and (min-width: 768px) {
  
  #modallaporan .modal-dialog  {width:300px;}
  #modalbelanja .modal-dialog  {width:900px;}

}
</style>
<h3><i class="glyphicon glyphicon-shopping-cart"></i> Belanja</h3>
<hr>

<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modalbelanja" id="btnbelanja">
               <i class="glyphicon glyphicon-shopping-cart"></i>  Belanja</button>
                 <table id="tablebelanja" class="table table-bordered">
		                 			<thead>
						                  <tr>
                                  <th width="20px">No</th>
						                      <th><center>Tanggal Belanja</center></th>
						                      <th><center>Nomer order</center></th>
						                      <th><center>Nama</center></th>
                                  <th><center>Jumlah Bayar</center></th>
                                  <th><center>Aksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Transaksi -->
        <div class="modal fade" id="modalbelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Belanja</h4>
              </div>

              <div class="modal-body">
                  <form id="formbelanjabarang" action="query/save_databelanja.php" method="POST" >

                    <div class="form-group">
                      <label class="control-label" for="uid">UID:</label>
                      <input type="text" name="uid" class="form-control rfid" placeholder="Tap Kartu" id="uid" style="width: 300px" readonly />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nis">Nomer Induk Siswa:</label>
                      <input type="text" name="nis" class="form-control" placeholder="Nomer Induk Siswa" id="nis" style="width: 300px" readonly />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nama">Nama:</label>
                      <input type="hidden" name="id_siswa" class="form-control" placeholder="Nama" id="id_siswa" />
                      <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama" style="width: 300px" readonly />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="saldo">Saldo:</label>
                      <input type="text" name="saldo" class="form-control" placeholder="Saldo" id="saldo" style="width: 300px" readonly />
                      <input type="hidden" name="nohp" class="form-control" placeholder="Handphone" id="nohp" />
                    </div>

                    <table class="table table-bordered" id="belanjabarang">
                      <thead>
                        <tr>              
                          <th style="width:40%;">Nama Barang | Stok</th>
                          <th style="width:20%;">Harga</th>
                          <th style="width:15%;">Kuantitas</th>              
                          <th style="width:15%;">Total</th>             
                          <th style="width:10%;"></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                      include "./../koneksi.php";
                      $noArray = 0;
                      for ($x = 1; $x < 2; $x++) {
                      ?>
                          <tr id="row<?php echo $x; ?>" value="<?php echo $noArray ?>">                
                            <td style="margin-left:20px;">
                              <div class="form-group">
                                <select class="form-control" name="namabarang[]" id="namabarang<?php echo $x; ?>" onchange="getbarang(<?php echo $x; ?>)">
                                  <option value="">Pilih Barang</option>
                                  <?php 
                                  $query = mysqli_query($conn,"SELECT id_barang, nama_barang, stok FROM barang WHERE status_barang = 'aktif'");
                                  while ($row = mysqli_fetch_assoc($query)) {
                                  ?>
                                  <option value="<?php echo $row['id_barang']; ?>" id="gantibarang<?php echo $row['id_barang']; ?>"><?php echo $row['nama_barang']; ?> | <?php echo $row['stok']; ?></option>
                                  <?php
                                 }
                                ?>
                                </select>
                              </div>
                            </td>
                            <td style="padding-left:20px;">                 
                              <input type="text" name="harga[]" id="harga<?php echo $x; ?>" autocomplete="off" disabled="true" class="form-control" />  
                              <input type="hidden" name="id_barang[]" id="id_barang<?php echo $x; ?>" autocomplete="off" class="form-control" /> 
                              <input type="hidden" name="hargavalue[]" id="hargavalue<?php echo $x; ?>" autocomplete="off" class="form-control" />        
                            </td>
                            <td style="padding-left:20px;">
                              <div class="form-group">
                              <input type="number" name="kuantitas[]" min=1 id="kuantitas<?php echo $x; ?>" onchange="gettotal(<?php echo $x; ?>)" autocomplete="off" class="form-control"/>
                              <input type="hidden" name="stok[]" id="stok<?php echo $x ?>" autocomplete="off" disabled="true" class="form-control" /> 
                              <input type="hidden" name="kuantitasvalue[]" id="kuantitasvalue<?php echo $x ?>" autocomplete="off" class="form-control" /> 
                              </div>
                            </td>
                            <td style="padding-left:20px;">                 
                              <input type="text" name="total[]" id="total<?php echo $x; ?>" autocomplete="off" class="form-control" disabled="true" />
                              <input type="hidden" name="totalvalue[]" id="totalvalue<?php echo $x; ?>" autocomplete="off" class="form-control" />           
                            </td>
                            <td>
                            <button type="button" class="btn btn-default" onclick="tbhbtn()" id="tbhbaris">Tambah</button>
                            </td>
                          </tr>
                          <?php 
                              $noArray++;
                            }
                          ?>
                      </tbody>
                    </table>
                    
                    <div class="form-group" align="right">
                      <label class="control-label" for="jumlah" style="margin-right: 170px">Jumlah:</label>
                        <input type="text" class="form-control" id="jumlah" name="jumlah" disabled="true" style="width: 220px" />
                        <input type="hidden" class="form-control" id="jumlahvalue" name="jumlahvalue" />
                    </div>

                    <div class="modal-footer">                      
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnbatal">Keluar</button>
                    </div>

                  </form>

              </div>
            </div>

          </div>
        </div>

        <!-- Modal Detail belanja -->
          <div class="modal fade" id="modaldetailbelanja" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Detail Belanja</h4>
                </div>

                <div class="modal-body">
                    <form action="query/struk_belanja.php" target="_blank" method="POST">
                            <div class="form-group">
                                <label class="control-label" for="nama">Nomer Order:</label>
                                <input type="text" name="detailorder" class="form-control" placeholder="Nama" id="detailorder" style="width: 300px" readonly/>
                              </div>

                            <div class="form-group">
                                <label class="control-label" for="nis">Nomer Induk Siswa:</label>
                                <input type="text" name="detailnis" class="form-control" placeholder="Nomer Induk Siswa" id="detailnis" style="width: 300px" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="nama">Nama:</label>
                                <input type="text" name="detailnama" class="form-control" placeholder="Nama" id="detailnama" style="width: 300px" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="nis">Tanggal:</label>
                                <input type="text" name="tglbelanja" class="form-control" placeholder="Tanggal" id="tglbelanja" style="width: 300px" readonly/>
                              </div>

                              <table id="tabledetailbelanja" class="table table-bordered" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="20px">No</th>
                                            <th><center>Nama Barang</center></th>
                                            <th>Kuantitas</th>
                                            <th><center>Total</center></th>
                                       </tr>
                                    </thead>
                              </table>
                              
                              <div class="form-group" align="right">
                                <label class="control-label" for="jumlah" style="margin-right: 170px">Jumlah:</label>
                                  <input type="text" class="form-control" id="detailjumlah" name="detailjumlah" disabled="true" style="width: 220px" />
                              </div>
                            </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default">Cetak</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    </div>
  
              </div>
              </div>

            </div>
          </div>

        <!-- Modal Laporan -->
        <div class="modal fade" id="modallaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
              </div>

              <div class="modal-body">
                  <form action="query/laporan_koperasi.php" target="_blank" method="POST" id="cetaklaporan">
                    <div class="form-group">
                      <label class="control-label" for="tgl_awal">Tanggal Awal:</label>
                      <input type="text" name="tgl_awal" class="form-control" id="tgl_awal">
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="tgl_akhir">Tanggal aAkhir:</label>
                      <input type="text" name="tgl_akhir" class="form-control" id="tgl_akhir">
                    </div>
                    </div>
                    <br/><br/>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Cetak</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnbatal">Keluar</button>
                    </div>
                  </form>
              </div>
            </div>

          </div>
        </div>