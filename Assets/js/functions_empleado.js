let tableEmpleados; 
let rowTable = "";
document.addEventListener('DOMContentLoaded', function(){

    tableEmpleados = $('#tableEmpleados').dataTable( {
        "aProcessing":true,
        "aServerSide":true,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
        },
        "ajax":{
            "url": " "+base_url+"/Empleado/getEmpleados",
            "dataSrc":""
        },
        "columns":[
            {"data":"id"},
            {"data":"nombre"},
            {"data":"email"},
            {"data":"sexo"},
            {"data":"area_id"},
            {"data":"boletin"},
            {"data":"descripcion"},
            {"data":"options"}

        ],
        'dom': 'lBfrtip',
        'buttons': [
            {
                "extend": "copyHtml5",
                "text": "<i class='far fa-copy'></i> Copiar",
                "titleAttr":"Copiar",
                "className": "btn btn-secondary"
            },{
                "extend": "excelHtml5",
                "text": "<i class='fas fa-file-excel'></i> Excel",
                "titleAttr":"Esportar a Excel",
                "className": "btn btn-success"
            },{
                "extend": "pdfHtml5",
                "text": "<i class='fas fa-file-pdf'></i> PDF",
                "titleAttr":"Esportar a PDF",
                "className": "btn btn-danger"
            },{
                "extend": "csvHtml5",
                "text": "<i class='fas fa-file-csv'></i> CSV",
                "titleAttr":"Esportar a CSV",
                "className": "btn btn-info"
            }
        ],
        "resonsieve":"true",
        "bDestroy": true,
        "iDisplayLength": 10,
        "order":[[0,"desc"]]  
    });

	if(document.querySelector("#formEmpleado")){
        let formEmpleado = document.querySelector("#formEmpleado");
        formEmpleado.onsubmit = function(e) {
            e.preventDefault();
            let strNombre = document.querySelector('#txtNombre').value;
            let strEmail = document.querySelector('#txtEmail').value;
            const radioButtons = document.querySelectorAll('input[name="sexoRadios"]');
            let selectedSexo;
            for (const radioButton of radioButtons) {
                if (radioButton.checked) {
                    selectedSexo = radioButton.value;
                    break;
                }
            }
            let intArea = document.querySelector('#listArea').value;
            let strDescripcion = document.querySelector('#descripcion').value;
            var isChecked = document.getElementById('checkBoletin').checked;
          
            // let checkProfesional = document.querySelector('#checkProfesional').value;
            // let checkGerente = document.querySelector('#checkGerente').value;
            // let checkAuxiliar = document.querySelector('#checkAuxiliar').value;
            var select = document.getElementById('listArea');
            var value = select.options[select.selectedIndex].value;
            // alert(value)

            if(strNombre == '' || strEmail == '' || selectedSexo == '' || intArea == ''|| strDescripcion == '')
            {
                swal("Atención", "Todos los campos son obligatorios." , "error");
                return false;
            }

            let elementsValid = document.getElementsByClassName("valid");
            for (let i = 0; i < elementsValid.length; i++) { 
                if(elementsValid[i].classList.contains('is-invalid')) { 
                    swal("Atención", "Por favor verifique los campos en rojo." , "error");
                    return false;
                } 
            } 
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Empleado/setEmpleado'; 
            let formData = new FormData(formEmpleado);
            request.open("POST",ajaxUrl,true);
            request.send(formData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        if(rowTable == ""){
                            tableEmpleados.api().ajax.reload();
                        }else{
                           rowTable.cells[1].textContent =  strNombre;
                           rowTable.cells[2].textContent =  strEmail;
                           rowTable.cells[3].textContent =  selectedSexo;
                           rowTable.cells[4].textContent =  intArea;
                           rowTable.cells[5].textContent =  isChecked;
                           rowTable.cells[6].textContent =  strDescripcion;
                        //    rowTable.cells[6].textContent =  intBoletin;
                        //    rowTable.cells[7].textContent =  selectedProfesion;
                           rowTable = "";
                        }
                        $('#modalFormEmpleado').modal("hide");
                        formEmpleado.reset();
                        swal("Usuarios", objData.msg ,"success");
                    }else{
                        swal("Error", objData.msg , "error");
                    }
                }
                divLoading.style.display = "none";
                return false;
            }
        }
    }


}, false);


function fntEditInfo(element, idpersona){
    rowTable = element.parentNode.parentNode.parentNode;
    document.querySelector('#titleModal').innerHTML ="Actualizar Empleado";
    document.querySelector('.modal-header').classList.replace("headerRegister", "headerUpdate");
    document.querySelector('#btnActionForm').classList.replace("btn-primary", "btn-info");
    document.querySelector('#btnText').innerHTML ="Actualizar";

    let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    let ajaxUrl = base_url+'/Empleado/getEmpleado/'+idpersona;
    request.open("GET",ajaxUrl,true);
    request.send();
    request.onreadystatechange = function(){

        if(request.readyState == 4 && request.status == 200){
            let objData = JSON.parse(request.responseText);
            if(objData.status)
            {
                document.querySelector("#idUsuario").value = objData.data.id;
                document.querySelector("#txtNombre").value = objData.data.nombre;
                document.querySelector("#txtEmail").value = objData.data.email
                document.querySelector("#listArea").value = objData.data.area_id
                document.querySelector("#descripcion").value = objData.data.descripcion;
            }
        }
        $('#modalFormEmpleado').modal('show');
    }
}

function fntDelInfo(idpersona){
    swal({
        title: "Eliminar Empleado",
        text: "¿Realmente quiere eliminar al cliente?",
        type: "warning",
        showCancelButton: true,
        confirmButtonText: "Si, eliminar!",
        cancelButtonText: "No, cancelar!",
        closeOnConfirm: false,
        closeOnCancel: true
    }, function(isConfirm) {
        
        if (isConfirm) 
        {
            let request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
            let ajaxUrl = base_url+'/Empleado/delEmpleado';
            let strData = "idUsuario="+idpersona;
            // alert(idpersona);
            request.open("POST",ajaxUrl,true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(strData);
            request.onreadystatechange = function(){
                if(request.readyState == 4 && request.status == 200){
                    let objData = JSON.parse(request.responseText);
                    if(objData.status)
                    {
                        swal("Eliminar!", objData.msg , "success");
                        tableEmpleados.api().ajax.reload();
                    }else{
                        swal("Atención!", objData.msg , "error");
                    }
                }
            }
        }

    });

}

function openModal()
{
    rowTable = "";
    document.querySelector('#idUsuario').value ="";
    document.querySelector('.modal-header').classList.replace("headerUpdate", "headerRegister");
    document.querySelector('#btnActionForm').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btnText').innerHTML ="Guardar";
    document.querySelector('#titleModal').innerHTML = "Nuevo Empleado";
    document.querySelector("#formEmpleado").reset();
    $('#modalFormEmpleado').modal('show');
}