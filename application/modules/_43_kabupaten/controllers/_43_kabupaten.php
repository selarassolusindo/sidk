<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _43_kabupaten extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_43_kabupaten_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . '_43_kabupaten/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_43_kabupaten/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_43_kabupaten/index.html';
            $config['first_url'] = base_url() . '_43_kabupaten/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_43_kabupaten_model->total_rows($q);
        $_43_kabupaten = $this->_43_kabupaten_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_43_kabupaten_data' => $_43_kabupaten,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('_43_kabupaten/t43_kabupaten_list', $data);
    }

    public function read($id) 
    {
        $row = $this->_43_kabupaten_model->get_by_id($id);
        if ($row) {
            $data = array(
		'id' => $row->id,
		'provinsi_id' => $row->provinsi_id,
		'nama' => $row->nama,
	    );
            $this->load->view('_43_kabupaten/t43_kabupaten_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_43_kabupaten'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_43_kabupaten/create_action'),
	    'id' => set_value('id'),
	    'provinsi_id' => set_value('provinsi_id'),
	    'nama' => set_value('nama'),
	);
        $this->load->view('_43_kabupaten/t43_kabupaten_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'provinsi_id' => $this->input->post('provinsi_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->_43_kabupaten_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_43_kabupaten'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->_43_kabupaten_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_43_kabupaten/update_action'),
		'id' => set_value('id', $row->id),
		'provinsi_id' => set_value('provinsi_id', $row->provinsi_id),
		'nama' => set_value('nama', $row->nama),
	    );
            $this->load->view('_43_kabupaten/t43_kabupaten_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_43_kabupaten'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
		'provinsi_id' => $this->input->post('provinsi_id',TRUE),
		'nama' => $this->input->post('nama',TRUE),
	    );

            $this->_43_kabupaten_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_43_kabupaten'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->_43_kabupaten_model->get_by_id($id);

        if ($row) {
            $this->_43_kabupaten_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_43_kabupaten'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_43_kabupaten'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('provinsi_id', 'provinsi id', 'trim|required');
	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

	$this->form_validation->set_rules('id', 'id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t43_kabupaten.xls";
        $judul = "t43_kabupaten";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Provinsi Id");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

	foreach ($this->_43_kabupaten_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->provinsi_id);
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
        header("Content-Disposition: attachment;Filename=t43_kabupaten.doc");

        $data = array(
            't43_kabupaten_data' => $this->_43_kabupaten_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('_43_kabupaten/t43_kabupaten_doc',$data);
    }

}

/* End of file _43_kabupaten.php */
/* Location: ./application/controllers/_43_kabupaten.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-12 16:47:21 */
/* http://harviacode.com */