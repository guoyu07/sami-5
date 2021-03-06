<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Engine extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
   is_login();
$this->load->model('Engine_model', 'engine');
    //Codeigniter : Write Less Do More
  }


    public function index(){
        is_login();
        if(CheckPermission("user", "own_read")){
            $this->load->view('include/header');
            $this->load->view('index');
            $this->load->view('include/footer');
        } else {
            $this->session->set_flashdata('messagePr', 'You don\'t have permission to access.');
            redirect( base_url().'user/engine', 'refresh');
        }
    }



  public function ajax_list()

  {

  $this->load->helper('url');
  $list = $this->engine->get_datatables();
  $data = array();
  $no = $_POST['start'];
  foreach ($list as $engine) {
    $no++;
    $row = array();
    $row[] = '<input type="checkbox" class="data-check" value="'.$engine->id.'">';
    $row[] = $engine->nameEngine;
    $row[] = $engine->type;
      $row[] = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" title="Editar" onclick="edit_engine('."'".$engine->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
        <a class="btn btn-danger btn-xs" href="javascript:void(0)" title="Eliminar" onclick="delete_engine('."'".$engine->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
    $data[] = $row;
  }

  $output = array(
          "draw" => $_POST['draw'],
          "recordsTotal" => $this->engine->count_all(),
          "recordsFiltered" => $this->engine->count_filtered(),
          "data" => $data,
      );

  echo json_encode($output);

  }


public function ajax_edit($id)
                {
                  $data = $this->engine->get_by_id($id);
                  echo json_encode($data);
                }

  public function ajax_add()

                    {
                                      //$this->_validate();
                      $data = array(
                                        'nameEngine' => $this->input->post('name'),
                                        'type' => $this->input->post('type'),
                                              );
                      $insert = $this->engine->save($data);
                    echo json_encode(array("status" => TRUE));
                    }

  public function ajax_update()
                      {

                        $data = array(

                          'nameEngine' => $this->input->post('name'),
                          'type' => $this->input->post('type'),

                          );
                        $this->engine->update(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }



          public function ajax_delete($id)
                    {
                        $this->engine->delete_by_id($id);
                      echo json_encode(array("status" => TRUE));
                      }

        public function ajax_bulk_delete()
                      {
                        $list_id = $this->input->post('id');
                        foreach ($list_id as $id) {
                          $this->engine->delete_by_id($id);
                        }
                        echo json_encode(array("status" => TRUE));
                      }

      private function _validate()

                      {
                        $data = array();
                        $data['error_string'] = array();
                        $data['inputerror'] = array();
                        $data['status'] = TRUE;



                        if($this->input->post('name') == '')
                        {
                          $data['inputerror'][] = 'name';
                          $data['error_string'][] = 'El campo Nombre es requerido';
                          $data['status'] = FALSE;

                        }





                        if($data['status'] === FALSE)

                        {
                          echo json_encode($data);
                          exit();
                        }
                      }

///////// Modulo combustibles -----------------

public function ajax_list_fuel(){
$this->load->helper('url');
$list = $this->engine->get_datatables_fuel();
$data = array();
$no = $_POST['start'];
foreach ($list as $fuel) {
  $no++;
  $row = array();
  $row[] = '<input type="checkbox" class="data-check" value="'.$fuel->id.'">';
  $row[] = $fuel->nameFuel;

    $row[] = '<a class="btn btn-primary btn-xs" href="javascript:void(0)" title="Editar" onclick="edit_fuel('."'".$fuel->id."'".')"><i class="glyphicon glyphicon-pencil"></i> </a>
      <a class="btn btn-danger btn-xs" href="javascript:void(0)" title="Eliminar" onclick="delete_fuel('."'".$fuel->id."'".')"><i class="glyphicon glyphicon-trash"></i> </a>';
  $data[] = $row;
}

$output = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $this->engine->count_all_fuel(),
        "recordsFiltered" => $this->engine->count_filtered_fuel(),
        "data" => $data,
    );

echo json_encode($output);

}

public function ajax_edit_fuel($id){
                  $data = $this->engine->get_by_id_fuel($id);
                  echo json_encode($data);
                }

  public function ajax_add_fuel(){
                                      //$this->_validate();
                      $data = array(
                                        'nameFuel' => $this->input->post('name'),
                                                );
                      $insert = $this->engine->save_fuel($data);
                    echo json_encode(array("status" => TRUE));
                    }
  public function ajax_update_fuel(){

                        $data = array(

                          'nameFuel' => $this->input->post('name'),
                                                );
                        $this->engine->update_fuel(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }
  public function ajax_delete_fuel($id){
                        $this->engine->delete_by_id_fuel($id);
                      echo json_encode(array("status" => TRUE));
                      }

/*Configuracion Load**/
public function ajax_edit_load($id){
                  $data = $this->engine->get_by_id_load($id);
                  echo json_encode($data);
                }

  public function ajax_add_load(){                                      //$this->_validate();
                      $data = array(
                            'nameLoad' => $this->input->post('name'),                                                );
                      $insert = $this->engine->save_load($data);
                    echo json_encode(array("status" => TRUE));
                    }

  public function ajax_update_load(){
                        $data = array(
                          'nameLoad' => $this->input->post('name'),                                                );
                        $this->engine->update_load(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }
public function ajax_delete_load($id){
                        $this->engine->delete_by_id_load($id);
                      echo json_encode(array("status" => TRUE));
                      }

/**Fin Configuracion Load*/

/*Configuracion equipment**/
public function ajax_edit_equipment($id){
                  $data = $this->engine->get_by_id_equipmet($id);
                  echo json_encode($data);
                }

  public function ajax_add_equipment(){                                      //$this->_validate();
                      $data = array(
                            'nameType' => $this->input->post('name'),                                                );
                      $insert = $this->engine->save_equipment($data);
                    echo json_encode(array("status" => TRUE));
                    }

  public function ajax_update_equipment(){
                        $data = array(
                          'nameType' => $this->input->post('name'),                                                );
                        $this->engine->update_equipmet(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }
public function ajax_delete_equipment($id){
                        $this->engine->delete_by_id_equipmet($id);
                      echo json_encode(array("status" => TRUE));
                      }

/**Fin Configuracion equipment*/

/*Configuracion mastil**/
public function ajax_edit_mastil($id){
                  $data = $this->engine->get_by_id_mastil($id);
                  echo json_encode($data);
                }

  public function ajax_add_mastil(){                                      //$this->_validate();
                      $data = array(
                            'nameMastil' => $this->input->post('name'),                                                );
                      $insert = $this->engine->save_mastil($data);
                    echo json_encode(array("status" => TRUE));
                    }

  public function ajax_update_mastil(){
                        $data = array(
                          'nameMastil' => $this->input->post('name'),                                                );
                        $this->engine->update_mastil(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }
public function ajax_delete_mastil($id){
                        $this->engine->delete_by_id_mastil($id);
                      echo json_encode(array("status" => TRUE));
                      }

/**Fin Configuracion mastil*/

/*Configuracion Etapa**/
public function ajax_edit_etapa($id){
                  $data = $this->engine->get_by_id_etapa($id);
                  echo json_encode($data);
                }

  public function ajax_add_etapa(){                                      //$this->_validate();
                      $data = array(
                            'nameEtapa' => $this->input->post('name'),                                                );
                      $insert = $this->engine->save_etapa($data);
                    echo json_encode(array("status" => TRUE));
                    }

  public function ajax_update_etapa(){
                        $data = array(
                          'nameEtapa' => $this->input->post('name'),                                                );
                        $this->engine->update_etapa(array('id' => $this->input->post('id')), $data);
                        echo json_encode(array("status" => TRUE));
                      }
public function ajax_delete_etapa($id){
                        $this->engine->delete_by_id_etapa($id);
                      echo json_encode(array("status" => TRUE));
                      }

/**Fin Configuracion Etapa*/




}
