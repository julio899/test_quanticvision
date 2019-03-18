
<div class="modal fade" id="loginModal" tabindex="-1" role="">
    <div class="modal-dialog modal-login" role="document">
        <div class="modal-content">
            <div class="card card-signup card-plain">
                <div class="modal-header">
                  <div class="card-header card-header-warning text-center" style="
                    position: absolute;
                    align-items: center;
                    border-radius: 3px;
                    margin-top: -46px;
                    padding: 15px;
                    width: 100%;
                    margin-left: -16px;
                    ">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      <i class="material-icons">clear</i>
                    </button>

                    <h3 class="card-title">Account Edition</h3>
                  </div>
                </div>
                <div class="modal-body">

                    <div id="edit_success" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                      <strong>Excelente!</strong> Datos actualizados correctamente.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    
                    <form class="form" method="" action="">
                        <p class="description text-center">Panel de Edici&oacute;n de Cuenta</p>
                        <div class="card-body">
                          
                          <div class="row">
                            
                            <div class="form-group bmd-form-group col-lg-12">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">face</i></div>
                                  </div>
                                  <input id="edit_name" type="text" class="form-control" placeholder="Nombre">
                                </div>
                            </div>

                            <div class="form-group bmd-form-group col-lg-12">
                                <div class="input-group">
                                  <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="material-icons">library_books</i></div>
                                  </div>
                                  <input id="edit_last_name" type="text" class="form-control" placeholder="Apellido">
                                </div>
                            </div>

                          </div>

                          <div class="row">
                            
                              <div class="form-group bmd-form-group col-lg-12">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text"><i class="material-icons">email</i></div>
                                    </div>
                                    <input id="edit_email" type="text" class="form-control" placeholder="Email">
                                  </div>
                              </div>

                              <div class="form-group bmd-form-group col-lg-12">
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <div class="input-group-text"><i class="material-icons">phone</i></div>
                                    </div>
                                    <input id="edit_phone" type="text" placeholder="Telefono" class="form-control">
                                  </div>
                              </div>

                          </div>
                        </div>
                    </form>
                    

                </div>
                <input type="hidden" id="edit_id">
                <div class="modal-footer justify-content-center">
                    <a id="btn_update_account" href="#update_account" class="btn btn-success btn-wd btn-lg" style="width: 100%;">Guardar Cambios</a>
                </div>
                <div class="container" id="progress_update_edit" style="display: none;">
                  <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>