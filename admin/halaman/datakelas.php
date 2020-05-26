<style type="text/css">
  @media screen and (min-width: 768px) {
  
  #modallaporan .modal-dialog  {width:300px;}

}
</style>
<h3><i class="glyphicon glyphicon-th"></i> Kelas </h3>
<hr>

<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right btntbh" data-toggle="modal" data-target="#modaltbhkelas" id="btntbhkelas">
               <i class="glyphicon glyphicon-plus"></i> Tambah</button>
                 <table id="tablekelas" class="table table-bordered">
		                 			<thead>
						                  <tr>
                                  			  <th width="20px">No</th>
						                      <th><center>Kelas</center></th>
						                      <th><center>Status</center></th>
						                      <th width="100px"><center>Aksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Tambah Kelas -->
        <div class="modal fade" id="modaltbhkelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah</h4>
              </div>

              <div class="modal-body">
                  <form action="query/save_datakelas.php" target="_blank" method="POST" id="formtbhkelas">
                    <div class="form-group">
                      <label class="control-label" for="tingkat">Tingkat:</label>
                      <select name="tingkat" class="form-control" id="tingkat" />
                              <option value=""> Pilih tingkat </option>
                              <option value="X"> X </option>
                              <option value="XI"> XI </option>
                              <option value="XII"> XII </option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="jurusan">Jurusan:</label>
                      <select name="jurusan" class="form-control" id="jurusan" />
                              <option value=""> Pilih Jurusan </option>
                              <option value="AK"> Akuntansi </option>
                              <option value="PM"> Pemasaran </option>
                              <option value="TGB"> Teknik Gambar Bangunan </option>
                              <option value="TKR"> Teknik Kendaraan Ringan </option>
                              <option value="TKJ"> Teknik Komputer dan Jaringan </option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="ruang">Ruangan:</label>
                      <input type="number" min="1" name="ruangan" class="form-control" id="ruangan" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">status:</label>
                      <select name="status_kelas" class="form-control" id="status_kelas" />
                              <option value=""> Pilih Status </option>
                              <option value="aktif"> Aktif </option>
                              <option value="nonaktif"> Nonaktif </option>
                      </select>
                    </div>

                    </div>
                    <br/><br/>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="btnbatal">Keluar</button>
                    </div>
                  </form>
              </div>
            </div>

          </div>
        </div>

        <!-- Modal Edit Kelas -->
        <div class="modal fade" id="modaleditkelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Edit</h4>
              </div>

              <div class="modal-body">
                  <form action="query/edit_datakelas.php" target="_blank" method="POST" id="formeditkelas">
				  <p id="editkelas"></p>

                    <div class="form-group">
                      <label class="control-label" for="tingkat">Tingkat:</label>
                      <input type="text" name="edittingkat" class="form-control" placeholder="Tingkat" id="edittingkat" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="jurusan">Jurusan:</label>
                      <input type="text" name="editjurusan" class="form-control" placeholder="Jurusan" id="editjurusan" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="ruang">Ruangan:</label>
                      <input type="text" name="editruangan" class="form-control" placeholder="Ruangan" id="editruangan" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">status:</label>
                      <select name="editstatus_kelas" class="form-control" id="editstatus_kelas" />
                              <option value=""> Pilih Status </option>
                              <option value="aktif"> Aktif </option>
                              <option value="nonaktif"> Nonaktif </option>
                      </select>
                    </div>

                    </div>
                    <br/><br/>
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
              <div class="modal fade" id="modalhpskelas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <button type="submit" class="btn btn-danger" id="btnhpskelas">Ya</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                      </div>

                    </div>
                  </div>

                </div>
              </div>