<h3><i class="glyphicon glyphicon-user"></i> Data Siswa</h3>
<hr>
				<div class="row">
	         <div class="col-md-12">
              <button class="btn btn-primary btn-sm pull-right btntbh" data-toggle="modal" data-target="#modaltbhsiswa" id="btntbhsiswa" >
               <i class="glyphicon glyphicon-plus"></i> Tambah</button>
                 <table id="tablesiswa" class="table table-bordered">
		                 			<thead>
						                  <tr>
						                      <th width="20px">No</th>
						                      <th><center>NIS</center></th>
						                      <th><center>Nama</center></th>
                                  <th><center>Kelas</center></th>
						                      <th><center>Status</center></th>
																	<th width="100px"><center>Aksi</center></th>
						                 </tr>
		                      </thead>
		            </table>
	      </div><!-- /col-md-12 -->

        <!-- Modal Tambah Data -->
        <div class="modal fade" id="modaltbhsiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
              </div>

              <div class="modal-body">
                  <form action="query/save_datasiswa.php" method="POST" id="formtbhsiswa">

                    <div class="form-group">
                      <label class="control-label" for="uid">UID:</label>
                      <input type="text" name="uid" class="form-control rfid" placeholder="Tap Kartu" id="uid" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nis">Nomor Induk Siswa:</label>
                      <input type="text" name="nis" class="form-control" placeholder="Nomor Induk Siswa" id="nis" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nama">Nama:</label>
                      <input type="text" name="nama" class="form-control" placeholder="Nama" id="nama" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nohp">Nomer Handphone:</label>
                      <input type="text" name="nohp" class="form-control" placeholder="Nomer Handphone" id="nohp" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="kelas">Kelas:</label>
                      <select name="kelas" class="form-control" id="kelas" />
                              <option value=""> Pilih Kelas </option>
                              <?php
                              include "./../koneksi.php";

                              $querykelas = mysqli_query($conn, "SELECT id_kelas, CONCAT(tingkat,' - ',jurusan,' - ',ruangan) AS kelas FROM kelas WHERE status_kelas = 'aktif' ORDER BY id_kelas");

                              while ($row = mysqli_fetch_assoc($querykelas)) {
                              ?>
                                <option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['kelas'] ?> </option>
                              <?php
                              }
                              ?>                            
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">Status:</label>
                      <select name="status_siswa" class="form-control" id="status_siswa" />
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
              <div class="modal fade" id="modalhpssiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                        <button type="submit" class="btn btn-danger" id="btnhpssiswa">Ya</button>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                      </div>

                    </div>
                  </div>

                </div>
              </div>

          <!-- Modal Edit Data -->
          <div class="modal fade" id="modaleditsiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                </div>

                <div class="modal-body">
                  <form action="query/edit_datasiswa.php" method="POST" id="formeditsiswa">

                    <p id="editsiswa"></p>

                    <div class="form-group">
                      <label class="control-label" for="nis">Nomer Induk Siswa:</label>
                      <input type="text" name="editnis" class="form-control" placeholder="Nomer Induk Siswa" id="editnis" readonly/>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nama">Nama:</label>
                      <input type="text" name="editnama" class="form-control" placeholder="Nama" id="editnama" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="nohp">Nomer Handphone:</label>
                      <input type="text" name="editnohp" class="form-control" placeholder="Nomer Handphone" id="editnohp" />
                      <p id="editnohp2"></p>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="kelas">Kelas:</label>
                      <select name="editkelas" class="form-control" id="editkelas" />
                              <option value=""> Pilih Kelas </option>
                              <?php
                              include "./../koneksi.php";

                              $querykelas = mysqli_query($conn, "SELECT id_kelas, CONCAT(tingkat,' - ',jurusan,' - ',ruangan) AS kelas FROM kelas WHERE status_kelas = 'aktif' ORDER BY id_kelas");

                              while ($row = mysqli_fetch_assoc($querykelas)) {
                              ?>
                                <option value="<?php echo $row['id_kelas'] ?>"> <?php echo $row['kelas'] ?> </option>
                              <?php
                              }
                              ?>                            
                      </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="status">Status:</label>
                      <select name="editstatus_siswa" class="form-control" id="editstatus_siswa" />
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

          <!-- Modal Detail Siswa -->
          <div class="modal fade" id="modaldetailsiswa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Detail Siswa</h4>
                </div>

                <div class="modal-body">
                  <div>

                        <div class="tab-content">
                          <div id="siswa" class="tab-pane fade in active">
                            <div class="form-group">
                                <label class="control-label" for="nis">Nomer Induk Siswa:</label>
                                <input type="text" name="detailnis" class="form-control" placeholder="Nomer Induk Siswa" id="detailnis" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="nama">Nama:</label>
                                <input type="text" name="detailnama" class="form-control" placeholder="Nama" id="detailnama" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="nama">Waktu Pembuatan:</label>
                                <input type="text" name="detailwaktu" class="form-control" placeholder="Nama" id="detailwaktu" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="nohp">Nomer Handphone:</label>
                                <input type="text" name="detailnohp" class="form-control" placeholder="Nomer Handphone" id="detailnohp" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="kelas">Kelas:</label>
                                <input type="text" name="detailkelas" class="form-control" placeholder="Kelas" id="detailkelas" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="status">Status:</label>
                                <input type="text" name="detailstatus" class="form-control" placeholder="Status" id="detailstatus" readonly/>
                              </div>

                              <div class="form-group">
                                <label class="control-label" for="saldo">Saldo:</label>
                                <input type="text" name="detailsaldo" class="form-control" placeholder="Saldo" id="detailsaldo" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
                    </div>

              </div>
              </div>

            </div>
          </div>