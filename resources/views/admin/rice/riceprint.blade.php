<div  class="modal fade" id="riceprint-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <<div class="modal-content" style="width: 500px;left:190px;top:150px;">
        <div class="modal-header" style="height: 10px;">
          <h4 class="modal-title" id="RicePrintModal"></h4>
        </div>
        <div class="modal-body">
          <form action="javascript:void(0)" id="RicePrintForm" name="RicePrintForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
            
          <div class="form-group">
            <label for="barangay" class="col-sm-8 control-label">Barangay</label>
            <div class="col-sm-12">
                <select class="form-control" id="barangay" name="barangay">
                    <option value="All">All</option>
                    <option value="Alegria">Alegria</option>
                    <option value="Bicao">Bicao</option>
                    <option value="Buenavista">Buenavista</option>
                    <option value="Buenos Aires">Buenos Aires</option>
                    <option value="Calatrava">Calatrava</option>
                    <option value="El Progreso">El Progreso</option>
                    <option value="El Salvador">El Salvador</option>
                    <option value="Guadalupe">Guadalupe</option>
                    <option value="Katipunan">Katipunan</option>
                    <option value="La Libertad">La Libertad</option>
                    <option value="La Paz">La Paz</option>
                    <option value="La Salvacion">La Salvacion</option>
                    <option value="La Victoria">La Victoria</option>
                    <option value="Matin ao">Matin ao</option>
                    <option value="Montehermoso">Montehermoso</option>
                    <option value="Montesuerte">Montesuerte</option>
                    <option value="Montesunting">Montesunting</option>
                    <option value="Montevideo">Montevideo</option>
                    <option value="Nueva Fuerza">Nueva Fuerza</option>
                    <option value="Nueva Vida Este">Nueva Vida Este</option>
                    <option value="Nueva Vida Norte">Nueva Vida Norte</option>
                    <option value="Nueva Vida Sur">Nueva Vida Sur</option>
                    <option value="Poblacion Norte">Poblacion Norte</option>
                    <option value="Poblacion Sur">Poblacion Sur</option>
                    <option value="Tambo an">Tambo an</option>
                    <option value="Vallehermoso">Vallehermoso</option>
                    <option value="Villaflor">Villaflor</option>
                    <option value="Villafuerte">Villafuerte</option>
                    <option value="Villacayo">Villacayo</option>
                </select>
            </div>
        </div>
            <div class="col-sm-offset-2 col-sm-10" style="margin-top: 20px;">
              <button type="button" class="btn btn-success" onclick="printDatas()">Print</button>
            </div>
          </form>
        </div>
        <div class="modal-footer">
        </div>
      </div>
    </div>
  </div>