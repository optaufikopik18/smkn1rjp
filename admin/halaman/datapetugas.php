<h3><i class="glyphicon glyphicon-user"></i> Data Petugas</h3>
<hr>
				<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right btntbh" data-toggle="modal" data-target="#modaltbhpetugas" id="btntbhpetugas">
               <i class="glyphicon glyphicon-plus"></i> Tambah</button>
                 <table id="tablepetugas" class="table table-bordered">
		                 			<thead>
						                  <tr>
						                      <th width="20px">No</th>
						                      <th><center>NIP</center></th>
                                  <th><center>Nama</center></th>
						                      <th><center>Username</center></th>
						                      <th><center>Hak Akses</center></th>
                                  <th><center>status</center></th>
																	<th width="100px"><center>Aksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modaltbhpetugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
              </div>

              <div class="modal-body">
                  <form action="query/save_datapetugas.php" method="POST" id="formtbhpetugas">
                    <div class="form-group">
                      <label class="control-label" for="nip">Nomor Induk Pegawai:</label>
                      <input type="text" name="nip" class="form-control" placeholder="Nomor Induk Pegawai" id="nip" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nama">Nama:</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="username">Username:</label>
                      <input type="text" name="username" class="form-control" placeholder="Username" id="username" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="password">Password:</label>
                      <input type="password" name="password" class="form-control" placeholder="Password" id="password" />
                    </div>
                    
                    <div class="form-group">
                      <label class="control-label" for="status">Status:</label>
                      <select name="status_petugas" class="form-control" id="status_petugas" />
                              <option value=""> Pilih Status </option>
                              <option value="aktif"> Aktif </option>
                              <option value="nonaktif"> Nonaktif </option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="hak_akses">Hak Akses:</label>
                      <select name="hak_akses" class="form-control" id="hak_akses" />
                              <option value=""> Pilih Hak Akses </option>
                              <option value="admin"> Admin </option>
                              <option value="koperasi"> Koperasi </option>
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
              <div class="modal fade" id="modalhpspetugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <button type="submit" class="btn btn-danger" id="btnhpspetugas">Ya</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                      </div>

                    </div>
                  </div>

                </div>
              </div>

          <!-- Modal Edit Data -->
          <div class="modal fade" id="modaleditpetugas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                    <form action="query/edit_datapetugas.php" method="POST" id="formeditpetugas">

                      <p id="editpetugas"></p>

                      <div class="form-group">
                      <label class="control-label" for="nip">Nomor Induk Pegawai:</label>
                      <input type="text" name="editnip" class="form-control" placeholder="Nomor Induk Pegawai" id="editnip" readonly/>
                    </div>

                      <div class="form-group">
                        <label class="control-label" for="nama">Nama:</label>
                        <input type="text" name="editnama" class="form-control" placeholder="Nama" id="editnama" />
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="username">Username:</label>
                        <input type="text" name="editusername" class="form-control" placeholder="Username" id="editusername" />
                        <p id="editusername1"></p>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="password">Password:</label>
                        <input type="password" name="editpassword" class="form-control" placeholder="Password" id="editpassword" />
                        <p id="editpassword1"></p>
                      </div>

                      <div class="form-group">
                        <label class="control-label" for="status">Status:</label>
                        <select class="form-control" id="editstatus_petugas" name="editstatus_petugas"/>
                                <option value=""> Pilih Status </option>
                                <option value="aktif"> Aktif </option>
                                <option value="nonaktif"> Nonaktif </option>
                        </select>
                      </div>

                      <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                      </div>

                    </form>

                </div>
              </div>

            </div>
          </div>
