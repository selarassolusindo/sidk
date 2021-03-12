<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _05_warga extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_05_warga_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_05_warga/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_05_warga/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_05_warga/index.html';
            $config['first_url'] = base_url() . '_05_warga/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_05_warga_model->total_rows($q);
        $_05_warga = $this->_05_warga_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_05_warga_data' => $_05_warga,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_05_warga/t05_warga_list', $data);
        $data['_view'] = '_05_warga/t05_warga_list';
        $data['_caption'] = 'Warga';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_05_warga_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idwarga' => $row->idwarga,
		'NKK' => $row->NKK,
		'NoUrut' => $row->NoUrut,
		'NIK' => $row->NIK,
		'Nama' => $row->Nama,
		'idagama' => $row->idagama,
		'idwn' => $row->idwn,
		'TempatLahir' => $row->TempatLahir,
		'TanggalLahir' => $row->TanggalLahir,
		'Pendidikan' => $row->Pendidikan,
		'OrangTua' => $row->OrangTua,
		'Darah' => $row->Darah,
		'idusers' => $row->idusers,
		'created_at' => $row->created_at,
		'updated_at' => $row->updated_at,
	    );
            $this->load->view('_05_warga/t05_warga_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_05_warga'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_05_warga/create_action'),
	    'idwarga' => set_value('idwarga'),
	    'NKK' => set_value('NKK'),
	    'NoUrut' => set_value('NoUrut'),
	    'NIK' => set_value('NIK'),
	    'Nama' => set_value('Nama'),
	    'idagama' => set_value('idagama'),
	    'idwn' => set_value('idwn'),
	    'TempatLahir' => set_value('TempatLahir'),
	    'TanggalLahir' => set_value('TanggalLahir'),
	    'Pendidikan' => set_value('Pendidikan'),
	    'OrangTua' => set_value('OrangTua'),
	    'Darah' => set_value('Darah'),
	    // 'idusers' => set_value('idusers'),
	    // 'created_at' => set_value('created_at'),
	    // 'updated_at' => set_value('updated_at'),
	);
        $this->load->view('_05_warga/t05_warga_form', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'NKK' => $this->input->post('NKK',TRUE),
		'NoUrut' => $this->input->post('NoUrut',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'idagama' => $this->input->post('idagama',TRUE),
		'idwn' => $this->input->post('idwn',TRUE),
		'TempatLahir' => $this->input->post('TempatLahir',TRUE),
		'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
		'Pendidikan' => $this->input->post('Pendidikan',TRUE),
		'OrangTua' => $this->input->post('OrangTua',TRUE),
		'Darah' => $this->input->post('Darah',TRUE),
		'idusers' => $this->session->userdata('user_id'),
		// 'created_at' => $this->input->post('created_at',TRUE),
		// 'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_05_warga_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_05_warga'));
        }
    }

    public function update($id)
    {
        $row = $this->_05_warga_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_05_warga/update_action'),
		'idwarga' => set_value('idwarga', $row->idwarga),
		'NKK' => set_value('NKK', $row->NKK),
		'NoUrut' => set_value('NoUrut', $row->NoUrut),
		'NIK' => set_value('NIK', $row->NIK),
		'Nama' => set_value('Nama', $row->Nama),
		'idagama' => set_value('idagama', $row->idagama),
		'idwn' => set_value('idwn', $row->idwn),
		'TempatLahir' => set_value('TempatLahir', $row->TempatLahir),
		'TanggalLahir' => set_value('TanggalLahir', $row->TanggalLahir),
		'Pendidikan' => set_value('Pendidikan', $row->Pendidikan),
		'OrangTua' => set_value('OrangTua', $row->OrangTua),
		'Darah' => set_value('Darah', $row->Darah),
		'idusers' => set_value('idusers', $row->idusers),
		'created_at' => set_value('created_at', $row->created_at),
		'updated_at' => set_value('updated_at', $row->updated_at),
	    );
            $this->load->view('_05_warga/t05_warga_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_05_warga'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idwarga', TRUE));
        } else {
            $data = array(
		'NKK' => $this->input->post('NKK',TRUE),
		'NoUrut' => $this->input->post('NoUrut',TRUE),
		'NIK' => $this->input->post('NIK',TRUE),
		'Nama' => $this->input->post('Nama',TRUE),
		'idagama' => $this->input->post('idagama',TRUE),
		'idwn' => $this->input->post('idwn',TRUE),
		'TempatLahir' => $this->input->post('TempatLahir',TRUE),
		'TanggalLahir' => $this->input->post('TanggalLahir',TRUE),
		'Pendidikan' => $this->input->post('Pendidikan',TRUE),
		'OrangTua' => $this->input->post('OrangTua',TRUE),
		'Darah' => $this->input->post('Darah',TRUE),
		'idusers' => $this->input->post('idusers',TRUE),
		'created_at' => $this->input->post('created_at',TRUE),
		'updated_at' => $this->input->post('updated_at',TRUE),
	    );

            $this->_05_warga_model->update($this->input->post('idwarga', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_05_warga'));
        }
    }

    public function delete($id)
    {
        $row = $this->_05_warga_model->get_by_id($id);

        if ($row) {
            $this->_05_warga_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_05_warga'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_05_warga'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('NKK', 'nkk', 'trim|required');
	$this->form_validation->set_rules('NoUrut', 'nourut', 'trim|required');
	$this->form_validation->set_rules('NIK', 'nik', 'trim|required');
	$this->form_validation->set_rules('Nama', 'nama', 'trim|required');
	$this->form_validation->set_rules('idagama', 'idagama', 'trim|required');
	$this->form_validation->set_rules('idwn', 'idwn', 'trim|required');
	$this->form_validation->set_rules('TempatLahir', 'tempatlahir', 'trim|required');
	$this->form_validation->set_rules('TanggalLahir', 'tanggallahir', 'trim|required');
	$this->form_validation->set_rules('Pendidikan', 'pendidikan', 'trim|required');
	$this->form_validation->set_rules('OrangTua', 'orangtua', 'trim|required');
	$this->form_validation->set_rules('Darah', 'darah', 'trim|required');
	// $this->form_validation->set_rules('idusers', 'idusers', 'trim|required');
	// $this->form_validation->set_rules('created_at', 'created at', 'trim|required');
	// $this->form_validation->set_rules('updated_at', 'updated at', 'trim|required');

	$this->form_validation->set_rules('idwarga', 'idwarga', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t05_warga.xls";
        $judul = "t05_warga";
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
	xlsWriteLabel($tablehead, $kolomhead++, "NKK");
	xlsWriteLabel($tablehead, $kolomhead++, "NoUrut");
	xlsWriteLabel($tablehead, $kolomhead++, "NIK");
	xlsWriteLabel($tablehead, $kolomhead++, "Nama");
	xlsWriteLabel($tablehead, $kolomhead++, "Idagama");
	xlsWriteLabel($tablehead, $kolomhead++, "Idwn");
	xlsWriteLabel($tablehead, $kolomhead++, "TempatLahir");
	xlsWriteLabel($tablehead, $kolomhead++, "TanggalLahir");
	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");
	xlsWriteLabel($tablehead, $kolomhead++, "OrangTua");
	xlsWriteLabel($tablehead, $kolomhead++, "Darah");
	xlsWriteLabel($tablehead, $kolomhead++, "Idusers");
	xlsWriteLabel($tablehead, $kolomhead++, "Created At");
	xlsWriteLabel($tablehead, $kolomhead++, "Updated At");

	foreach ($this->_05_warga_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NKK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NoUrut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->NIK);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idagama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idwn);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TempatLahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->TanggalLahir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Pendidikan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->OrangTua);
	    xlsWriteLabel($tablebody, $kolombody++, $data->Darah);
	    xlsWriteLabel($tablebody, $kolombody++, $data->idusers);
	    xlsWriteLabel($tablebody, $kolombody++, $data->created_at);
	    xlsWriteLabel($tablebody, $kolombody++, $data->updated_at);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t05_warga.doc");

        $data = array(
            't05_warga_data' => $this->_05_warga_model->get_all(),
            'start' => 0
        );

        $this->load->view('_05_warga/t05_warga_doc',$data);
    }

}

/* End of file _05_warga.php */
/* Location: ./application/controllers/_05_warga.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-12 01:53:41 */
/* http://harviacode.com */
