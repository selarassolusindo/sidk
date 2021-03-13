<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _38_status extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_38_status_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_38_status?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_38_status?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_38_status';
            $config['first_url'] = base_url() . '_38_status';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_38_status_model->total_rows($q);
        $_38_status = $this->_38_status_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_38_status_data' => $_38_status,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_38_status/t38_status_list', $data);
        $data['_view'] = '_38_status/t38_status_list';
        $data['_caption'] = 'Status Kawin';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_38_status_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idstatus' => $row->idstatus,
        		'Status' => $row->Status,
        	    );
            // $this->load->view('_38_status/t38_status_read', $data);
            $data['_view'] = '_38_status/t38_status_read';
            $data['_caption'] = 'Status Kawin';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_38_status'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_38_status/create_action'),
            'idstatus' => set_value('idstatus'),
            'Status' => set_value('Status'),
            );
        // $this->load->view('_38_status/t38_status_form', $data);
        $data['_view'] = '_38_status/t38_status_form';
        $data['_caption'] = 'Status Kawin';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'Status' => $this->input->post('Status',TRUE),
        	    );

            $this->_38_status_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_38_status'));
        }
    }

    public function update($id)
    {
        $row = $this->_38_status_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_38_status/update_action'),
        		'idstatus' => set_value('idstatus', $row->idstatus),
        		'Status' => set_value('Status', $row->Status),
        	    );
            // $this->load->view('_38_status/t38_status_form', $data);
            $data['_view'] = '_38_status/t38_status_form';
            $data['_caption'] = 'Status Kawin';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_38_status'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idstatus', TRUE));
        } else {
            $data = array(
        		'Status' => $this->input->post('Status',TRUE),
        	    );

            $this->_38_status_model->update($this->input->post('idstatus', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_38_status'));
        }
    }

    public function delete($id)
    {
        $row = $this->_38_status_model->get_by_id($id);

        if ($row) {
            $this->_38_status_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_38_status'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_38_status'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Status', 'status', 'trim|required');

    	$this->form_validation->set_rules('idstatus', 'idstatus', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t38_status.xls";
        $judul = "t38_status";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Status");

    	foreach ($this->_38_status_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Status);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t38_status.doc");

        $data = array(
            't38_status_data' => $this->_38_status_model->get_all(),
            'start' => 0
            );

        $this->load->view('_38_status/t38_status_doc',$data);
    }

}

/* End of file _38_status.php */
/* Location: ./application/controllers/_38_status.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 16:20:06 */
/* http://harviacode.com */
