<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _39_pekerjaan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_39_pekerjaan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_39_pekerjaan?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_39_pekerjaan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_39_pekerjaan';
            $config['first_url'] = base_url() . '_39_pekerjaan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_39_pekerjaan_model->total_rows($q);
        $_39_pekerjaan = $this->_39_pekerjaan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_39_pekerjaan_data' => $_39_pekerjaan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        // $this->load->view('_39_pekerjaan/t39_pekerjaan_list', $data);
        $data['_view'] = '_39_pekerjaan/t39_pekerjaan_list';
        $data['_caption'] = 'Pekerjaan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_39_pekerjaan_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idpekerjaan' => $row->idpekerjaan,
        		'Pekerjaan' => $row->Pekerjaan,
        	    );
            // $this->load->view('_39_pekerjaan/t39_pekerjaan_read', $data);
            $data['_view'] = '_39_pekerjaan/t39_pekerjaan_read';
            $data['_caption'] = 'Pekerjaan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_39_pekerjaan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_39_pekerjaan/create_action'),
            'idpekerjaan' => set_value('idpekerjaan'),
            'Pekerjaan' => set_value('Pekerjaan'),
            );
        // $this->load->view('_39_pekerjaan/t39_pekerjaan_form', $data);
        $data['_view'] = '_39_pekerjaan/t39_pekerjaan_form';
        $data['_caption'] = 'Pekerjaan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'Pekerjaan' => $this->input->post('Pekerjaan',TRUE),
        	    );

            $this->_39_pekerjaan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_39_pekerjaan'));
        }
    }

    public function update($id)
    {
        $row = $this->_39_pekerjaan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_39_pekerjaan/update_action'),
        		'idpekerjaan' => set_value('idpekerjaan', $row->idpekerjaan),
        		'Pekerjaan' => set_value('Pekerjaan', $row->Pekerjaan),
        	    );
            // $this->load->view('_39_pekerjaan/t39_pekerjaan_form', $data);
            $data['_view'] = '_39_pekerjaan/t39_pekerjaan_form';
            $data['_caption'] = 'Pekerjaan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_39_pekerjaan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpekerjaan', TRUE));
        } else {
            $data = array(
        		'Pekerjaan' => $this->input->post('Pekerjaan',TRUE),
        	    );

            $this->_39_pekerjaan_model->update($this->input->post('idpekerjaan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_39_pekerjaan'));
        }
    }

    public function delete($id)
    {
        $row = $this->_39_pekerjaan_model->get_by_id($id);

        if ($row) {
            $this->_39_pekerjaan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_39_pekerjaan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_39_pekerjaan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Pekerjaan', 'pekerjaan', 'trim|required');

    	$this->form_validation->set_rules('idpekerjaan', 'idpekerjaan', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t39_pekerjaan.xls";
        $judul = "t39_pekerjaan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Pekerjaan");

    	foreach ($this->_39_pekerjaan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Pekerjaan);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t39_pekerjaan.doc");

        $data = array(
            't39_pekerjaan_data' => $this->_39_pekerjaan_model->get_all(),
            'start' => 0
            );

        $this->load->view('_39_pekerjaan/t39_pekerjaan_doc',$data);
    }

}

/* End of file _39_pekerjaan.php */
/* Location: ./application/controllers/_39_pekerjaan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 12:55:55 */
/* http://harviacode.com */
