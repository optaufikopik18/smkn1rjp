<style type="text/css">
  @media screen and (min-width: 768px) {
  
  #modallaporan .modal-dialog  {width:300px;}

}
</style>
<h3><i class="glyphicon glyphicon-transfer"></i> Data Saldo </h3>
<hr>

<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#modalsaldo" id="btnsaldo">
               <i class="glyphicon glyphicon-plus"></i>  Tambah</button>
                 <table id="tablesaldo" class="table table-bordered">
		                 			<thead>
						                  <tr>
                                  <th width="20px">No</th>
						                      <th><center>Tanggal Transaksi</center></th>
						                      <th><center>NIS</center></th>
						                      <th><center>Nama</center></th>
                                  <th><center>Nominal</center></th>
						                      <th><center>Jenis Transaksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Transaksi -->
        <div class="modal fade" id="modalsaldo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
              </div>

              <div class="modal-body">
                  <form action="query/save_datasaldo.php" method="POST" id="formsaldo">

                    <div class="form-group">
                      <label class="control-label" for="uid">UID:</label>
                      <input type="text" name="uid" class="form-control rfid" placeholder="Tap Kartu" id="uid" readonly />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nis">Nomer induk Siswa:</label>
                      <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" id="nis" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nama">Nama:</label>
                      <input type="hidden" name="id_siswa" class="form-control" placeholder="Nama" id="id_siswa"/>
                      <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama" readonly />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="saldo">Saldo:</label>
                      <input type="text" name="saldo" class="form-control" placeholder="Saldo" id="saldo" readonly/>
                      <input type="hidden" name="nohp" class="form-control" placeholder="Handphone" id="nohp"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="jtransaksi">Jenis Transaksi:</label>
                        <select name="jtransaksi" class="form-control" id="jtransaksi" />
                                <option value=""> Pilih Jenis Transaksi </option>
                                <option value="tambah"> Pengisian Saldo</option>
                                <option value="tarik"> Pencairan Saldo</option>
                        </select>
                      </div>

                    <div class="form-group">
                      <label class="control-label" for="jumlah">Nominal:</label>
                      <select name="nominal" class="form-control" id="nominal" />
                                <option value=""> Nominal </option>
                                <option value="5000"> Rp. 5.000</option>
                                <option value="10000"> Rp. 10.000</option>
                                <option value="25000"> Rp. 25.000</option>
                                <option value="50000"> Rp. 50.000</option>
                                <option value="75000"> Rp. 75.000</option>
                                <option value="100000"> Rp. 100.000</option>
                                <option value="150000"> Rp. 150.000</option>
                                <option value="175000"> Rp. 175.000</option>
                                <option value="200000"> Rp. 200.000</option>
                        </select>
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

        <!-- Modal Laporan -->
        <div class="modal fade" id="modallaporan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Cetak Laporan</h4>
              </div>

              <div class="modal-body">
                  <form action="query/laporan_bankmini.php" target="_blank" method="POST" id="cetaklaporan">
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