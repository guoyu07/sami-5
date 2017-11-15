<div class="content-wrapper">
<!-- Content Header (Page header) -->
<!-- Main content -->

  <section class="content">
  <?php if($this->session->flashdata("messagePr")){?>
    <div class="alert alert-info">
      <?php echo $this->session->flashdata("messagePr")?>
    </div>
  <?php } ?>
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Tablero | Ordenes de Trabajo </h3>
            <div class="box-tools">

 <button class="btn btn-primary btn-xs" onclick="add_order()"><i class="glyphicon glyphicon-plus"></i> Nueva Orden de Trabajo</button>

                  <button class="btn btn-default btn-xs" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Recargar</button>
            </div>
          </div

          <!-- /.box-header -->
          <div class="box-body">
            <table id="tblorder" class="table table-striped table-bordered table-responsive" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><input type="checkbox" id="check-all"></th>
                    <th>No.</th>
                    <th>NIT</th>
                    <th>Razon Social</th>
                    <th>Actividad</th>
                    <th>Fecha Servicio</th>
                    <th>Estado</th>
                     <th style="width:150px;">Acciones</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

        </table>

        <?php echo "ultimo".+ $orden; ?>

          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- Modal Crud Start-->
<!-- Bootstrap modal -->

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                <input type="hidden" value="" name="id"/>
                    <div class="form-body">
                        <div id="msgbx_err" class="alert-box error" display="none" style="color:red;"></div>
                        <div class="form-group">
                          <label class="control-label col-md-3">Cliente</label>
                            <div class="col-md-8">
                              <select name="name" class="form-control input-sm" data-validate="required" id="customers"
                                        onchange="return get_equipment_sections(this.value)" required>
                                          <option value="">Seleccione</option>
                                               <?php
                                                 $classes = $this->db->get('customers')->result_array();
                                                 foreach($classes as $row):
                                                   ?>
                                                   <option value="<?php echo $row['id'];?>">
                                                     <?php echo $row['nameCus'];?>
                                                   </option>
                                                   <?php
                                                   endforeach;
                                                   ?>
                          </select>
                                <span class="help-block"></span><span id="name_result"></span>
                            </div>
                        </div>

<div class="row">
<div class="col-md-6">
  <div class="form-group" id="dvequip">
    <label class="control-label col-md-6">Código</label>
      <div class="col-md-6">
        <select name="codigo" id="equipment_selector_holder" class="form-control input-sm"
          onchange="return get_mark_sections(this.value)"
>
                  <option value=""></option>
    </select>
          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>


                          <div class="form-group" id="dvmodel">
                            <label class="control-label col-md-6">Modelo</label>
                              <div class="col-md-6">
                                <select name="model" id="model_selector_holder" class="form-control input-sm"
                                              onchange="return get_serie_sections(this.value)"
                                  >
                                          <option value=""></option>
                                </select>


                                  <span class="help-block"></span><span id="name_result"></span>
                              </div>
                          </div>
</div>

<div class="col-md-6">
  <div class="form-group" id="dvmark">
    <label class="control-label col-md-6">Marca</label>
      <div class="col-md-6">
        <select name="mark" id="mark_selector_holder" class="form-control input-sm"
                      onchange="return get_model_sections(this.value)"  >
                  <option value=""></option>
        </select>


          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>

  <div class="form-group" id="dvserie">
    <label class="control-label col-md-6">Serie</label>
      <div class="col-md-6">
        <select name="serie" id="serie_selector_holder" class="form-control input-sm"
onchange="return get_type_sections(this.value)"
          >
                  <option value=""></option>
        </select>


          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group" id="dvtype">
    <label class="control-label col-md-6">Tipo</label>
      <div class="col-md-6">
        <select name="equipmentType" id="type_selector_holder" class="form-control input-sm"
                          >
                  <option value=""></option>
        </select>
          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>
</div>


<div class="col-md-6">
  <div class="form-group">
      <label class="control-label col-md-6" id="lblState">Fecha</label>
      <div class="col-md-6">
      <input type="date" class="form-control input-sm" name="startActivity" id="startActivity" value="">
          <span class="help-block"></span>
      </div>
  </div>

</div>




                        <div class="form-group">
                          <label class="control-label col-md-3">Tipo de Actividad</label>
                            <div class="col-md-5">
                              <select name="activity" id="activity" class="form-control input-sm" data-validate="required" >
                                          <option value="">Seleccione</option>
                                               <?php
                                                 $classes = $this->db->get('activity')->result_array();
                                                 foreach($classes as $row):
                                                   ?>
                                                   <option value="<?php echo $row['id'];?>">
                                                     <?php echo $row['nameActivity'];?>
                                                   </option>
                                                   <?php
                                                   endforeach;
                                                   ?>
                          </select>
                                <span class="help-block"></span><span id="name_result"></span>
                            </div>
                        </div>

                        <div class="form-group" id="frequency" >
                          <label class="control-label col-md-3">Frecuencia</label>
                            <div class="col-md-5">
                              <select name="frequency" class="form-control input-sm" data-validate="required" >
                                          <option value="">Seleccione</option>
                                               <?php
                                                 $classes = $this->db->get('frequency')->result_array();
                                                 foreach($classes as $row):
                                                   ?>
                                                   <option value="<?php echo $row['id'];?>">
                                                     <?php echo $row['nameFrequency'];?>
                                                   </option>
                                                   <?php
                                                   endforeach;
                                                   ?>
                          </select>
                                <span class="help-block"></span><span id="name_result"></span>
                            </div>
                        </div>

                        <div class="form-group">
                          <label class="control-label col-md-3">Empleado</label>
                            <div class="col-md-5">
                              <select name="employee" class="form-control input-sm" data-validate="required" >
                                          <option value="">Seleccione</option>
                                               <?php
                                                 $classes = $this->db->select('id, names')
                                                                  ->where('type', 'OPERADOR')
                                                                  ->get('employee')
                                                                  ->result_array();
                                                 foreach($classes as $row):
                                                   ?>
                                                   <option value="<?php echo $row['id'];?>">
                                                     <?php echo $row['names'];?>
                                                   </option>
                                                   <?php
                                                   endforeach;
                                                   ?>
                          </select>
                                <span class="help-block"></span><span id="name_result"></span>
                            </div>
                        </div>
<div class="row">
<div class="col-md-6">
  <div class="form-group">
      <label class="control-label col-md-6" id="lblState">Cotizacion No:</label>
      <div class="col-md-6">
    <input type="text" name="cotizacion" class="form-control input-sm">
          <span class="help-block"></span>
      </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
      <label class="control-label col-md-6" id="lblState">Orden Compra</label>
      <div class="col-md-5">
    <input type="text" name="ordencompra" class="form-control input-sm">
          <span class="help-block"></span>
      </div>
  </div>
</div>

</div>

<div class="row">
<div class="col-md-6">
  <div class="form-group">
      <label class="control-label col-md-6" id="lblState">SDC No:</label>
      <div class="col-md-6">
    <input type="text" name="sdc" class="form-control input-sm">
          <span class="help-block"></span>
      </div>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
      <label class="control-label col-md-6" id="lblState">CAPEX No.</label>
      <div class="col-md-5">
    <input type="text" name="capex" class="form-control input-sm">
          <span class="help-block"></span>
      </div>
  </div>
</div>

</div>





                        <div class="form-group">
                            <label class="control-label col-md-3" id="lblState">Observación</label>
                            <div class="col-md-9">
                            <textarea name="observation" rows="4" cols="60"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3" id="lblState">Autorizado Por</label>
                            <div class="col-md-7">
                          <input type="text" name="autorized" class="form-control input-sm">
                                <span class="help-block"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3" id="lblState">Estado</label>
                            <div class="col-md-7">
                                <select name="state" id="state" class="form-control input-sm">
                                    <option value="">--Selecionar Estado--</option>
                                    <option value="ANULADO">ANULADO</option>
                                    <option value="FACTURADO">FACTURADO</option>
                                    <option value="PENDIENTE">PENDIENTE</option>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                                  </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary btn-xs">Grabar</button>
                <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div><!-- /.modal -->




<div class="modal fade" id="modal_print_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Person Form</h3>
            </div>
            <div class="modal-body form">
                <form action="<?php echo base_url('order/ajax_add_liq'); ?>" id="form_print" class="form-horizontal">
                <input type="hidden" value="" name="id" id="id"/>
<div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label class="control-label col-md-4">Orden No.</label>
      <div class="col-md-5">
        <input type="text" name="code" id="code" class="form-control input-sm" >
          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>
</div>

<div class="col-md-6">
  <div class="form-group">
    <label class="control-label col-md-3">Cliente</label>
      <div class="col-md-8">
        <select name="name" class="form-control input-sm" data-validate="required" id="name"
                  onchange="return get_equipment_sections(this.value)" required>
                    <option value="">Seleccione</option>
                         <?php
                           $classes = $this->db->get('customers')->result_array();
                           foreach($classes as $row):
                             ?>
                             <option value="<?php echo $row['id'];?>">
                               <?php echo $row['nameCus'];?>
                             </option>
                             <?php
                             endforeach;
                             ?>
    </select>
          <span class="help-block"></span><span id="name_result"></span>
      </div>
  </div>
</div>
</div>

    <input type="button" class="btn btn-lg btn-block btn-primary btn-md " id="addrow" value="Nuevo Item" />
<span id="total_sum_value">Total:</span>
    <table id="myTable" class=" table order-list">
    <thead>
        <tr>
            <td>DETALLE</td>
            <td>PRECIO</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td class="col-sm-8">
                <input type="text" name="detalleold" id="detalleold" class="form-control input-sm" />
            </td>
          <td class="col-sm-3">
                <input type="text" name="precioold" id="precioold"  class="form-control input-sm precio"/>
            </td>
            <td class="col-sm-2"><a class="Borrar"></a>

            </td>
        </tr>

    </tbody>
    <tfoot>

        <tr>
        </tr>
    </tfoot>
</table>
            <div class="modal-footer">
              <button type="button" id="btnSave_liq" onclick="save_liq()" class="btn btn-primary btn-xs">Grabar</button>

            </div>
</form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div><!-- /.modal -->

<script>
var currentLocation = window.location;
var table;
var counter = 0;




$(document).ready(function() {

  $(function() {
    $('#table td:last-child:contains(PENDIENTE)').closest('tr').css('background-color', 'red');
    $('#table td:last-child:contains(2)').closest('tr').css('background-color', 'blue');
    $('#table td:last-child:contains(3)').closest('tr').css('background-color', 'green');
    // Así sucesivamente hasta llegar al 10
  });






$('#frequency').hide();
$('#dvequip').hide();
$('#dvmark').hide();
$('#dvserie').hide();
$('#dvmodel').hide();
$('#dvtype').hide();

$("#customers").change(function(){
$('#dvequip').show();
$('#dvmark').show();
$('#dvserie').show();
$('#dvmodel').show();
$('#dvtype').show();
});


$("#activity").change(function(){
$('#frequency').hide();
if($(this).val()==2){$('#frequency').show();}
});

validate();


    //datatables
    table = $('#tblorder').DataTable({
      "language":
                {
              "sProcessing":     "Procesando...",
                  "sLengthMenu":     "Mostrar _MENU_ registros",
                  "sZeroRecords":    "No se encontraron resultados",
                  "sEmptyTable":     "Ningún dato disponible en esta tabla",
                  "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                  "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                  "sInfoPostFix":    "",
                  "sSearch":         "Buscar:",
                  "searchPlaceholder":		"Dato para buscar",
                  "sUrl":            "",
                  "sInfoThousands":  ",",
                  "sLoadingRecords": "Cargando...",
                  "oPaginate": {
                  "sFirst":    "Primero",
                  "sLast":     "Último",
                  "sNext":     "Siguiente",
                  "sPrevious": "Anterior"
                  },

            "oAria": {
                  "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                  "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                  }
                },

            "lengthMenu":		[[8, 10, 20, 25, 50, -1], [8, 10, 20, 25, 50, "Todos"]],
                  "iDisplayLength":	8,
                    "processing": true, //Feature control the processing indicator.
                    "serverSide": true, //Feature control DataTables' server-side processing mode.
                    "order": [], //Initial no order.
              "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('order/ajax_list')?>",
            "type": "POST",


        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

        //set input/textarea/select event when change value, remove class error and remove text help block

        $("input").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("textarea").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });
        $("select").change(function(){
            $(this).parent().parent().removeClass('has-error');
            $(this).next().empty();
        });

        //check all

        $("#check-all").click(function () {
            $(".data-check").prop('checked', $(this).prop('checked'));
        });



      });

/**Agregar filass liquidacion**/

$("#addrow").on("click", function () {
        var newRow = $("<tr>");
        var cols = "";

        cols += '<td><input type="text" class="form-control input-sm  " name="detalleold' + counter + '"/></td>';
        cols += '<td><input type="text" class="form-control input-sm precio" name="precioold' + counter + '"/></td>';

        cols += '<td><input type="button" class="ibtnDel btn btn-md btn-danger "  value="Borrar"></td>';
        newRow.append(cols);
        $("table.order-list").append(newRow);
        counter++;
    });

    $("table.order-list").on('input', '.precio', function () {
           var calculated_total_sum = 0;

           $("table.order-list .precio").each(function () {
               var get_textbox_value = $(this).val();
               if ($.isNumeric(get_textbox_value)) {
                  calculated_total_sum += parseFloat(get_textbox_value);
                  }
                });
                  $("#total_sum_value").html(calculated_total_sum);
           });



    $("table.order-list").on("click", ".ibtnDel", function (event) {
        $(this).closest("tr").remove();
        counter -= 1
    });



function calculateRow(row) {
    var price = +row.find('input[name^="price"]').val();

}

function calculateGrandTotal() {
    var grandTotal = 0;
    $("table.order-list").find('input[name^="price"]').each(function () {
        grandTotal += +$(this).val();
    });
    $("#grandtotal").text(grandTotal.toFixed(2));
}



function add_order(){
    save_method = 'add';

    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Registro de Nueva Orden de Trabajo'); // Set Title to Bootstrap modal title
}

function add_liq(){
    save_method = 'add';

    $('#form_print')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_print_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Liquidacion de Orden de Trabajo'); // Set Title to Bootstrap modal title
}

function edit_order(id)
{
    save_method = 'update';

    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string



    $.ajax({
         //url: "<?php echo site_url('order/ajax_edit')?>"/+id,
       url : currentLocation + "/order/ajax_edit/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.name);
            $('[name="frequency"]').val(data.frequency);
            $('[name="activity"]').val(data.activity);
            $('[name="employee"]').val(data.employee);
            $('[name="observation"]').val(data.observation);
            $('[name="autorized"]').val(data.autorized);
            $('[name="startActivity"]').val(data.startActivity);
          /*  $('[name="contact"]').val(data.contact);
            $('[name="phone1"]').val(data.phone1);
            $('[name="phone2"]').val(data.phone2);
            $('[name="address"]').val(data.address);
            $('[name="email"]').val(data.email);*/
            $('[name="state"]').val(data.state);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Orden'); // Set title to Bootstrap modal title
        },

        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

}

function print_order(id)
{
   save_method = 'update';

    $('#form_print')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string



    $.ajax({
         //url: "<?php echo site_url('order/ajax_print')?>"/+id,
       url : currentLocation + "/order/ajax_edit/"+id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="name"]').val(data.name);
            $('[name="frequency"]').val(data.frequency);
            $('[name="activity"]').val(data.activity);
            $('[name="employee"]').val(data.employee);
            $('[name="observation"]').val(data.observation);
            $('[name="code"]').val(data.code);
            $('[name="state"]').val(data.state);
            $('#modal_print_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Liquidar Orden de Trabajo'); // Set title to Bootstrap modal title
        },

        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });

}

function save_liq()
{

      $('#btnSave_liq').text('saving...'); //change button text
      $('#btnSave_liq').attr('disabled',true); //set button disable
      var url;

          url = currentLocation + "/order/ajax_add_liq/";


      var formData = new FormData($('#form_print')[0]);
      $.ajax({
          url : url,
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          dataType: "JSON",
          success: function(data)
          {
              if(data.status) //if success close modal and reload ajax table
              {
                  $('#modal_print_form').modal('hide');
                  reload_table();
              }
              else
              {
                  for (var i = 0; i < data.inputerror.length; i++)
                  {
                      $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                      $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                  }
              }
              $('#btnSave_liq').text('Grabar'); //change button text
              $('#btnSave_liq').attr('disabled',false); //set button enable
          },
          error: function (jqXHR, textStatus, errorThrown)
          {
              alert('Error al Guardar ó  Actualizar la Información');
              $('#btnSave_liq').text('Grabar'); //change button text
              $('#btnSave_liq').attr('disabled',false); //set button enable
          }

      });

}




function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax
}

function save()
{
  validate();
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;
    if(save_method == 'add') {
        url = currentLocation + "/order/ajax_add/";
    } else {
        url = currentLocation + "/order/ajax_update/";
    }

    var formData = new FormData($('#form')[0]);
    $.ajax({
        url : url,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {
            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('Grabar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error al Guardar ó  Actualizar la Información');
            $('#btnSave').text('Grabar'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable
        }

    });

}






function delete_order(id)
{
    if(confirm('Esta seguro de borrar esta información?'))
    {
        // ajax delete data to database
        $.ajax({
            url : currentLocation + "/order/ajax_delete/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                        $('#modal_form').modal('hide');
                reload_table();
            },
          error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error al tratar de borrar la información');
            }
        });
    }
}

function bulk_delete()
{
    var list_id = [];
    $(".data-check:checked").each(function() {
            list_id.push(this.value);
    });
    if(list_id.length > 0)
    {
        if(confirm('Are you sure delete this '+list_id.length+' data?'))
        {
            $.ajax({
                type: "POST",
                data: {id:list_id},
                url: currentLocation + "/order/ajax_bulk_delete_order",
                dataType: "JSON",
                success: function(data)
                {
                    if(data.status)
                    {
                      reload_table();
                    }
                    else
                    {
                        alert('Failed.');
                    }
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error deleting data');
                }
            });
        }
    }
    else
    {
        alert('no data selected');
    }
}

function validate(){

  $('#msgbx_err').hide();
     $('#nit').blur(function(){
        var email_val = $("#nit").val();
        if(email_val){
            $('#msgbx_err').show();
            $.post("http://apphoruscloud.com/sami/order/nit_check_order", {
                nit: email_val
            }, function(response){
                $('#loading').hide();
                $('#msgbx_err').html('').html(response.message).show().delay(6000).fadeOut();
            });
            return false;
        }
    });

}

function detail_order(id)
{
  $('#form')[0].reset(); // reset form on modals
  $('.form-group').removeClass('has-error'); // clear error class
  $('.help-block').empty(); // clear error string
  $('#modal_detail').modal('show'); // show bootstrap modal

  //Ajax Load data from ajax

  $.ajax({
      url : currentLocation + "/order/ajax_edit/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data)
      {
        $('[name="id"]').val(data.id);
        $('[name="name"]').val(data.name);
        $('[name="frequency"]').val(data.frequency);
        $('[name="activity"]').val(data.activity);
        $('[name="employee"]').val(data.employee);
        $('[name="observation"]').val(data.observation);
        $('[name="sdc"]').val(data.sdc);
        $('[name="ordencompra"]').val(data.ordencompra);
        $('[name="cotizacion"]').val(data.cotizacion);
        /*  $('[name="capex"]').val(data.capex);
        $('[name="phone2"]').val(data.phone2);
        $('[name="address"]').val(data.address);
        $('[name="email"]').val(data.email);*/
        $('[name="state"]').val(data.state);
         $('.modal-title').text('Movimientos del orderos'); // Set Title to Bootstrap modal title

      },

      error: function (jqXHR, textStatus, errorThrown)
      {
          alert('Error get data from ajax');
      }
  });
}


function get_equipment_sections(id) {

  $.ajax({
        url: '<?php echo base_url();?>order/get_equipment_sections/' + id ,
        success: function(response)
        {
            jQuery('#equipment_selector_holder').html(response);
        }
    });

  };

function get_mark_sections() {

var id = $("#equipment_selector_holder").val();

 $.ajax({
          url: '<?php echo base_url();?>order/get_mark_sections/' + id ,
          success: function(response)
          {

              jQuery('#mark_selector_holder').html(response);
          }
      });

    };

    function get_model_sections() {

    var id = $("#equipment_selector_holder").val();

     $.ajax({
              url: '<?php echo base_url();?>order/get_model_sections/' + id ,
              success: function(response)
              {

                  jQuery('#model_selector_holder').html(response);
              }
          });

        };

        function get_serie_sections() {

        var id = $("#equipment_selector_holder").val();

         $.ajax({
                  url: '<?php echo base_url();?>order/get_serie_sections/' + id ,
                  success: function(response)
                  {

                      jQuery('#serie_selector_holder').html(response);
                  }
              });

            };

            function get_type_sections() {

            var id = $("#equipment_selector_holder").val();

             $.ajax({
                      url: '<?php echo base_url();?>order/get_type_sections/' + id ,
                      success: function(response)
                      {

                          jQuery('#type_selector_holder').html(response);
                      }
                  });

                };





</script>
