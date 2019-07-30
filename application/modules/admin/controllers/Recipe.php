<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Recipe extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Recipe_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datarecipe=$this->Recipe_model->get_all();//panggil ke modell
      $datafield=$this->Recipe_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/recipe/recipe_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datarecipe'=>$datarecipe,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'recipe',
        'controller'=>'recipe'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/recipe/recipe_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/recipe/create_action',
        'module'=>'admin',
        'titlePage'=>'recipe',
        'controller'=>'recipe'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Recipe_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/recipe/recipe_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/recipe/update_action',
        'dataedit'=>$dataedit,
        'module'=>'admin',
        'titlePage'=>'recipe',
        'controller'=>'recipe'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_dessert' => $this->input->post('nama_dessert',TRUE),
		'bahan' => $this->input->post('bahan',TRUE),
		'cara' => $this->input->post('cara',TRUE),
		'gambar_dessert' => $this->input->post('gambar_dessert',TRUE),
	    );

            $this->Recipe_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/recipe'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_recipe', TRUE));
        } else {
            $data = array(
		'nama_dessert' => $this->input->post('nama_dessert',TRUE),
		'bahan' => $this->input->post('bahan',TRUE),
		'cara' => $this->input->post('cara',TRUE),
		'gambar_dessert' => $this->input->post('gambar_dessert',TRUE),
	    );

            $this->Recipe_model->update($this->input->post('id_recipe', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/recipe'));
        }
    }

    public function delete($id)
    {
        $row = $this->Recipe_model->get_by_id($id);

        if ($row) {
            $this->Recipe_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/recipe'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/recipe'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('nama_dessert', 'nama dessert', 'trim|required');
	$this->form_validation->set_rules('bahan', 'bahan', 'trim|required');
	$this->form_validation->set_rules('cara', 'cara', 'trim|required');
	$this->form_validation->set_rules('gambar_dessert', 'gambar dessert', 'trim|required');

	$this->form_validation->set_rules('id_recipe', 'id_recipe', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
