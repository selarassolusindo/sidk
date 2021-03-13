<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _40_pendidikan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_40_pendidikan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_40_pendidikan?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_40_pendidikan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_40_pendidikan';
            $config['first_url'] = base_url() . '_40_pendidikan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_40_pendidikan_model->total_rows($q);
        $_40_pendidikan = $this->_40_pendidikan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_40_pendidikan_data' => $_40_pendidikan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_40_pendidikan/t40_pendidikan_list', $data);
        $data['_view'] = '_40_pendidikan/t40_pendidikan_list';
        $data['_caption'] = 'Pendidikan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_40_pendidikan_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idpendidikan' => $row->idpendidikan,
        		'Pendidikan' => $row->Pendidikan,
        	    );
            // $this->load->view('_40_pendidikan/t40_pendidikan_read', $data);
            $data['_view'] = '_40_pendidikan/t40_pendidikan_read';
            $data['_caption'] = 'Pendidikan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_40_pendidikan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_40_pendidikan/create_action'),
            'idpendidikan' => set_value('idpendidikan'),
            'Pendidikan' => set_value('Pendidikan'),
            );
        // $this->load->view('_40_pendidikan/t40_pendidikan_form', $data);
        $data['_view'] = '_40_pendidikan/t40_pendidikan_form';
        $data['_caption'] = 'Pendidikan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'Pendidikan' => $this->input->post('Pendidikan',TRUE),
        	    );

            $this->_40_pendidikan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_40_pendidikan'));
        }
    }

    public function update($id)
    {
        $row = $this->_40_pendidikan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_40_pendidikan/update_action'),
        		'idpendidikan' => set_value('idpendidikan', $row->idpendidikan),
        		'Pendidikan' => set_value('Pendidikan', $row->Pendidikan),
        	    );
            // $this->load->view('_40_pendidikan/t40_pendidikan_form', $data);
            $data['_view'] = '_40_pendidikan/t40_pendidikan_form';
            $data['_caption'] = 'Pendidikan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_40_pendidikan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpendidikan', TRUE));
        } else {
            $data = array(
        		'Pendidikan' => $this->input->post('Pendidikan',TRUE),
        	    );

            $this->_40_pendidikan_model->update($this->input->post('idpendidikan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_40_pendidikan'));
        }
    }

    public function delete($id)
    {
        $row = $this->_40_pendidikan_model->get_by_id($id);

        if ($row) {
            $this->_40_pendidikan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_40_pendidikan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_40_pendidikan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Pendidikan', 'pendidikan', 'trim|required');

    	$this->form_validation->set_rules('idpendidikan', 'idpendidikan', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t40_pendidikan.xls";
        $judul = "t40_pendidikan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Pendidikan");

    	foreach ($this->_40_pendidikan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Pendidikan);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t40_pendidikan.doc");

        $data = array(
            't40_pendidikan_data' => $this->_40_pendidikan_model->get_all(),
            'start' => 0
            );

        $this->load->view('_40_pendidikan/t40_pendidikan_doc',$data);
    }

}

/* End of file _40_pendidikan.php */
/* Location: ./application/controllers/_40_pendidikan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 11:56:01 */
/* http://harviacode.com */
