<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _41_agama extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_41_agama_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_41_agama?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_41_agama?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_41_agama';
            $config['first_url'] = base_url() . '_41_agama';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_41_agama_model->total_rows($q);
        $_41_agama = $this->_41_agama_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_41_agama_data' => $_41_agama,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_41_agama/t41_agama_list', $data);
        $data['_view'] = '_41_agama/t41_agama_list';
        $data['_caption'] = 'Agama';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_41_agama_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idagama' => $row->idagama,
        		'Agama' => $row->Agama,
        	    );
            // $this->load->view('_41_agama/t41_agama_read', $data);
            $data['_view'] = '_41_agama/t41_agama_read';
            $data['_caption'] = 'Agama';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_41_agama'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_41_agama/create_action'),
            'idagama' => set_value('idagama'),
            'Agama' => set_value('Agama'),
            );
        // $this->load->view('_41_agama/t41_agama_form', $data);
        $data['_view'] = '_41_agama/t41_agama_form';
        $data['_caption'] = 'Agama';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'Agama' => $this->input->post('Agama',TRUE),
        	    );

            $this->_41_agama_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_41_agama'));
        }
    }

    public function update($id)
    {
        $row = $this->_41_agama_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_41_agama/update_action'),
        		'idagama' => set_value('idagama', $row->idagama),
        		'Agama' => set_value('Agama', $row->Agama),
        	    );
            // $this->load->view('_41_agama/t41_agama_form', $data);
            $data['_view'] = '_41_agama/t41_agama_form';
            $data['_caption'] = 'Agama';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_41_agama'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idagama', TRUE));
        } else {
            $data = array(
        		'Agama' => $this->input->post('Agama',TRUE),
        	    );

            $this->_41_agama_model->update($this->input->post('idagama', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_41_agama'));
        }
    }

    public function delete($id)
    {
        $row = $this->_41_agama_model->get_by_id($id);

        if ($row) {
            $this->_41_agama_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_41_agama'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_41_agama'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Agama', 'agama', 'trim|required');

    	$this->form_validation->set_rules('idagama', 'idagama', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t41_agama.xls";
        $judul = "t41_agama";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Agama");

    	foreach ($this->_41_agama_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Agama);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t41_agama.doc");

        $data = array(
            't41_agama_data' => $this->_41_agama_model->get_all(),
            'start' => 0
            );

        $this->load->view('_41_agama/t41_agama_doc',$data);
    }

}

/* End of file _41_agama.php */
/* Location: ./application/controllers/_41_agama.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 11:30:46 */
/* http://harviacode.com */
