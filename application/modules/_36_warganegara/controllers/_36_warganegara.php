<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _36_warganegara extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_36_warganegara_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_36_warganegara?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_36_warganegara?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_36_warganegara';
            $config['first_url'] = base_url() . '_36_warganegara';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_36_warganegara_model->total_rows($q);
        $_36_warganegara = $this->_36_warganegara_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_36_warganegara_data' => $_36_warganegara,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
            );
        // $this->load->view('_36_warganegara/t36_warganegara_list', $data);
        $data['_view'] = '_36_warganegara/t36_warganegara_list';
        $data['_caption'] = 'Kewarganegaraan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_36_warganegara_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idwarganegara' => $row->idwarganegara,
        		'WargaNegara' => $row->WargaNegara,
        	    );
            // $this->load->view('_36_warganegara/t36_warganegara_read', $data);
            $data['_view'] = '_36_warganegara/t36_warganegara_read';
            $data['_caption'] = 'Kewarganegaraan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_36_warganegara'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_36_warganegara/create_action'),
            'idwarganegara' => set_value('idwarganegara'),
            'WargaNegara' => set_value('WargaNegara'),
            );
        // $this->load->view('_36_warganegara/t36_warganegara_form', $data);
        $data['_view'] = '_36_warganegara/t36_warganegara_form';
        $data['_caption'] = 'Kewarganegaraan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'WargaNegara' => $this->input->post('WargaNegara',TRUE),
        	    );

            $this->_36_warganegara_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_36_warganegara'));
        }
    }

    public function update($id)
    {
        $row = $this->_36_warganegara_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_36_warganegara/update_action'),
        		'idwarganegara' => set_value('idwarganegara', $row->idwarganegara),
        		'WargaNegara' => set_value('WargaNegara', $row->WargaNegara),
        	    );
            // $this->load->view('_36_warganegara/t36_warganegara_form', $data);
            $data['_view'] = '_36_warganegara/t36_warganegara_form';
            $data['_caption'] = 'Kewarganegaraan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_36_warganegara'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idwarganegara', TRUE));
        } else {
            $data = array(
        		'WargaNegara' => $this->input->post('WargaNegara',TRUE),
        	    );

            $this->_36_warganegara_model->update($this->input->post('idwarganegara', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_36_warganegara'));
        }
    }

    public function delete($id)
    {
        $row = $this->_36_warganegara_model->get_by_id($id);

        if ($row) {
            $this->_36_warganegara_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_36_warganegara'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_36_warganegara'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('WargaNegara', 'warganegara', 'trim|required');

    	$this->form_validation->set_rules('idwarganegara', 'idwarganegara', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t36_warganegara.xls";
        $judul = "t36_warganegara";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "WargaNegara");

    	foreach ($this->_36_warganegara_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->WargaNegara);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t36_warganegara.doc");

        $data = array(
            't36_warganegara_data' => $this->_36_warganegara_model->get_all(),
            'start' => 0
            );

        $this->load->view('_36_warganegara/t36_warganegara_doc',$data);
    }

}

/* End of file _36_warganegara.php */
/* Location: ./application/controllers/_36_warganegara.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 19:06:46 */
/* http://harviacode.com */
