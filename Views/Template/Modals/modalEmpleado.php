<!-- Modal -->
<div class="modal fade" id="modalFormEmpleado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEmpleado" name="formEmpleado" class="form-horizontal">
        <input type="hidden" id="idUsuario" name="idUsuario" value="">
          
          <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>

          <div class="form-row">
            <!-- <div class="form-group col-md-4">
                  <label for="txtIdentificacion">Identificación <span class="required">*</span></label>
                  <input type="text" class="form-control" id="txtIdentificacion" name="txtIdentificacion" required="">
                </div> -->
            <div class="form-group col-md-4">
              <label for="txtNombre">Nombre Completo <span class="required">*</span></label>
              <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre" required="">
            </div>

          </div>

          <div class="form-row">
            <div class="form-group col-md-4">
              <label for="txtEmail">Correo Electronico <span class="required">*</span></label>
              <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
            </div>

          </div>
          <legend>Sexo</legend>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" id="optionsRadios1" type="radio" name="sexoRadios" value="M" checked="">Masculino
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" id="optionsRadios2" type="radio" name="sexoRadios" value="F">Femenino
            </label>
          </div>
          <label for="listArea">Area</label>
          <select class="form-control" id="listArea" name="listArea">
            <option value="1">Administrativa y Financiera</option>
            <option value="2">Ingeniería</option>
            <option value="3">Desarrollo de Negocio</option>
            <option value="4">Proyectos</option>
            <option value="5">Servicios</option>
            <option value="6">Calidad</option>
          </select>
          <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion de la experiencia del empleado"></textarea>
                  </div>
          <div class="form-check">

            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="checkBoletin"  name="checkBoletin">Deseo recibir boletin Informativo
            </label>
          </div>
          <b>Roles</b>
          <div class="roles-check">
          <div class="form-check">
            <!-- <label class="form-check-label">

              <input class="form-check-input" type="checkbox" id="checkProfesional" name="checkProfesional" >Desarrollador
            </label>

          </div>
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox" id="checkGerente" name="checkGerente">Gerente Estrategico
              </label>

            </div>
          <div class="form-check">
            <label class="form-check-label">
              <input class="form-check-input" type="checkbox" id="checkAuxiliar" name="checkAuxiliar">Auxiliar Administrativo
            </label>
          </div> -->
          </div>

          <hr>
      </div>
      <div class="form-row">

      </div>
      <div class="tile-footer">
        <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
        <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>

<!-- Modal -->
<!-- <div class="modal fade" id="modalViewEmpleado" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Identificación:</td>
              <td id="celIdentificacion">654654654</td>
            </tr>
            <tr>
              <td>Nombres:</td>
              <td id="celNombre">Jacob</td>
            </tr>
            <tr>
              <td>Apellidos:</td>
              <td id="celApellido">Jacob</td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono">Larry</td>
            </tr>
            <tr>
              <td>Email (Usuario):</td>
              <td id="celEmail">Larry</td>
            </tr>
            <tr>
              <td>Identificación Tributaria:</td>
              <td id="celIde">Larry</td>
            </tr>
            <tr>
              <td>Nombre Fiscal:</td>
              <td id="celNomFiscal">Larry</td>
            </tr>
            <tr>
              <td>Dirección Fiscal:</td>
              <td id="celDirFiscal">Larry</td>
            </tr>
            <tr>
              <td>Fecha registro:</td>
              <td id="celFechaRegistro">Larry</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div> -->