<style type="text/css">
  @media screen and (min-width: 768px) {
  
  #modaltambahstok .modal-dialog  {width:300px;}

}
</style>
<h3><i class="glyphicon glyphicon-th-large"></i> Data barang</h3>
<hr>
				<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right btntbh" data-toggle="modal" data-target="#modaltbhbarang" id="btntbhbarang">
               <i class="glyphicon glyphicon-plus"></i> Tambah</button>
                 <table id="tablebarang" class="table table-bordered">
		                 			<thead>
						                  <tr>
						                      <th width="20px">No</th>
						                      <th><center>Nama Barang</center></th>
						                      <th><center>Harga</center></th>
                                  <th><center>Stok</center></th>
                                  <th><center>Status</center></th>
																	<th width="100px"><center>Aksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modaltbhbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
              </div>

              <div class="modal-body">
                  <form action="query/save_databarang.php" method="POST" id="formtbhbarang">

                    <div class="form-group">
                      <label class="control-label" for="nmbarang">Nama Barang:</label>
                      <input type="text" name="nmbarang" class="form-control" placeholder="Nama Barang" id="nmbarang" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="hrgbarang">Harga Barang:</label>
                      <input type="text" name="hrgbarang" class="form-control" placeholder="Harga Barang" id="hrgbarang" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="stok">Stok Barang:</label>
                      <input type="number" min="1" name="stokbarang" class="form-control" id="stokbarang" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">Status:</label>
                      <select name="status_barang" class="form-control" id="status_barang" />
                              <option value=""> Pilih Status </option>
                              <option value="aktif"> Aktif </option>
                              <option value="nonaktif"> Nonaktif </option>
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

            <!-- Modal Hapus Data -->
              <div class="modal fade" id="modalhpsbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Konfirmasi</h4>
                    </div>

                    <div class="modal-body">

                      <div>
                        <h3 align="center">Apakah yakin data ini akan di hapus?</h3>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" id="btnhpsbarang">Ya</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                      </div>

                    </div>
                  </div>

                </div>
              </div>

          <!-- Modal Edit Data -->
          <div class="modal fade" id="modaleditbarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                  <form action="query/edit_databarang.php" method="POST" id="formeditbarang">

                    <p id="editbarang"></p>

                    <div class="form-group">
                      <label class="control-label" for="nmbarang">Nama Barang:</label>
                      <input type="text" name="editnmbarang" class="form-control" id="editnmbarang" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nohp">Harga Barang:</label>
                      <input type="text" name="edithrgbarang" class="form-control" id="edithrgbarang" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">Status:</label>
                      <select name="editstatus_barang" class="form-control" id="editstatus_barang" />
                              <option value=""> Pilih Status </option>
                              <option value="aktif"> Aktif </option>
                              <option value="nonaktif"> Nonaktif </option>
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

          <!-- Modal Tambah Stok -->
          <div class="modal fade" id="modaltambahstok" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Tambah Stok Barang</h4>
                </div>

                <div class="modal-body">
                  <form action="query/tambah_stok.php" method="POST" id="formtambahstok">

                    <p id="tambahstok"></p>

                    <div class="form-group">
                      <label class="control-label" for="norek">Tambah Stok Barang:</label>
                      <input type="number" min="1" name="tbhstok" class="form-control" id="tbhstok" />
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