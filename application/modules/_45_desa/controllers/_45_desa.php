<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _45_desa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_45_desa_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '_45_desa/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_45_desa/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_45_desa/index.html';
            $config['first_url'] = base_url() . '_45_desa/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_45_desa_model->total_rows($q);
        $_45_desa = $this->_45_desa_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_45_desa_data' => $_45_desa,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_45_desa/t45_desa_list', $data);
    }

    public function read($id) 
    {
        $row = $this->_45_desa_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'kecamatan_id' => $row->kecamatan_id,
		'nama' => $row->nama,
	    );
            $this->load->view('_45_desa/t45_desa_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_desa'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_45_desa/create_action'),
	    'id' => set_value('id'),
	    'kecamatan_id' => set_value('kecamatan_id'),
	    'nama' => set_value('nama'),
	);
        $this->load->view('_45_desa/t45_desa_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->_45_desa_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_45_desa'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->_45_desa_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_45_desa/update_action'),
		'id' => set_value('id', $row->id),
		'kecamatan_id' => set_value('kecamatan_id', $row->kecamatan_id),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->load->view('_45_desa/t45_desa_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_desa'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'kecamatan_id' => $this->input->post('kecamatan_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->_45_desa_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_45_desa'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->_45_desa_model->get_by_id($id);

        if ($row) {
            $this->_45_desa_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_45_desa'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_45_desa'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('kecamatan_id', 'kecamatan id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t45_desa.xls";
        $judul = "t45_desa";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Kecamatan Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->_45_desa_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kecamatan_id);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t45_desa.doc");

        $data = array(
            't45_desa_data' => $this->_45_desa_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('_45_desa/t45_desa_doc',$data);
    }

}

/* End of file _45_desa.php */
/* Location: ./application/controllers/_45_desa.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-12 16:47:51 */
/* http://harviacode.com */