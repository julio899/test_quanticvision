<div class="row">
            <div class="col"></div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon contenedor_adduser" id="contenedor_adduser">
                    <i class="material-icons btn_add_user" style="cursor: pointer;">person_add</i>
                  </div>
                  <p class="card-category">Nuevo Usuario</p>
                  <h5 class="card-title"></h5>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">person_add</i> Registro de Cuenta
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <?php if(isset($users)): ?>
              <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                  <div class="card-icon">
                    <i class="fa fa-group"></i>
                  </div>
                  <p class="card-category">Registrados</p>
                  <h3 class="card-title">+<?php echo count($users); ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i> Actualizaci&oacute;n Actual
                  </div>
                </div>
              </div>
              <?php endif; ?>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">store</i>
                  </div>
                  <p class="card-category">Bienvenido</p>
                    <h3 class="card-title"><?php echo $this->session->userdata('account')->nombres.' '.$this->session->userdata('account')->apellidos; ?></h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons text-danger">warning</i>
                    <a href="#pablo">Tu cuenta posee el Rol <?php echo $this->session->userdata('user_type');?> </a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col"></div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-success">
                  <div class="ct-chart" id="dailySalesChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Daily Sales</h4>
                  <p class="card-category">
                    <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> updated 4 minutes ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-warning">
                  <div class="ct-chart" id="websiteViewsChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Email Subscriptions</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-chart">
                <div class="card-header card-header-danger">
                  <div class="ct-chart" id="completedTasksChart"></div>
                </div>
                <div class="card-body">
                  <h4 class="card-title">Completed Tasks</h4>
                  <p class="card-category">Last Campaign Performance</p>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">access_time</i> campaign sent 2 days ago
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12">
              <div class="card">
                <div class="card-header card-header-warning">
                  <h4 class="card-title">Usuarios Registrados</h4>
                  <p class="card-category">M&aacute;s recientes en TOP position, order DESC, click sobre cada columna para ordenar a gusto.</p>
                </div>
                <div class="card-body table-responsive">
                  <table id="users_table" class="table table-hover">
                    <thead class="text-warning">
                      <th>ID</th>
                      <th>Full Name</th>
                      <th>User Name</th>
                      <th>Email</th>
                      <th>ROL</th>
                      <th>Creation</th>
                      <th>OPCIONS</th>
                    </thead>
                    <tbody>
                      <?php if(isset($users)): ?>
                        <?php foreach ($users as $key => $u): ?>
                          <tr id="cr_tr_<?php echo $u->id; ?>">
                            <td id="cr_id_<?php echo $u->id; ?>"><?php echo $u->id; ?></td>
                            <td id="cr_name_<?php echo $u->id; ?>"><?php echo $u->nombres.' '.$u->apellidos; ?></td>
                            <td id="cr_username_<?php echo $u->id; ?>"><?php echo $u->username; ?></td>
                            <td id="cr_email_<?php echo $u->id; ?>">
                              <?php echo $u->email; ?>
                            </td>
                            <td id="cr_rol_<?php echo $u->id; ?>">
                              <label style="padding: 4px 10px;min-width: 75px;" class="btn <?php if($u->nombre=='ADMIN'){ echo 'btn-success';}else{echo 'btn-default';} ?> btn-round"><?php echo $u->nombre; ?></label>
                            </td>
                            <td id="cr_date_<?php echo $u->id; ?>">
                              <?php echo $u->fecha_creacion; ?>
                            </td>

                            <td class="td-actions text-right">
                              <button type="button" rel="tooltip" title="Editar" class="btn btn-primary btn-link btn-sm custom_edit"
                                data-id="<?php echo $u->id; ?>"
                                data-name="<?php echo $u->nombres; ?>"
                                data-last-name="<?php echo $u->apellidos; ?>"
                                data-email="<?php echo $u->email; ?>"
                                data-telefono="<?php echo $u->telefono; ?>"
                                data-username="<?php echo $u->username; ?>"
                                data-rol-name="<?php echo $u->nombre; ?>"
                                data-avatar="<?php echo $u->avatar; ?>"
                                data-key="<?php echo $u->id; ?>"
                              >
                                <i class="material-icons">edit</i>
                              </button>
                              <button data-id="<?php echo $u->id; ?>" data-key="<?php echo $u->id; ?>" onclick="confirm_delete_account(this)" type="button" rel="tooltip" title="Eliminar" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                              </button>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>