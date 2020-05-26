<h3><i class="glyphicon glyphicon-cog"></i> Ubah Password</h3>
<hr>

<div class="row">
    <div class="col-lg-5 col-lg-offset-3">
        <div class="modal-body">
                  <form action="query/editpassword.php" method="POST" id="formeditpassword">

                    <div class="form-group">
                      <label class="control-label" for="password">Password Baru:</label>
                      <input type="password" name="password" class="form-control" placeholder="Password Baru" id="password" />
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="password">Konfirmasi Password:</label>
                      <input type="password" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password" id="konfirmasi_password" />
                    </div>

                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success">Simpan</button>
                      <button type="reset" class="btn btn-danger" data-dismiss="modal" onclick="btnreset()">Reset</button>
                    </div>

                  </form>

              </div>
    </div><!-- /row -->
</div><!-- /col-lg-9 END SECTION MIDDLE -->
