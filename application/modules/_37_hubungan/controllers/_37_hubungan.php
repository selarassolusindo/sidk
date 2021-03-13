<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _37_hubungan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_37_hubungan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_37_hubungan?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_37_hubungan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_37_hubungan';
            $config['first_url'] = base_url() . '_37_hubungan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_37_hubungan_model->total_rows($q);
        $_37_hubungan = $this->_37_hubungan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            '_37_hubungan_data' => $_37_hubungan,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('_37_hubungan/t37_hubungan_list', $data);
        $data['_view'] = '_37_hubungan/t37_hubungan_list';
        $data['_caption'] = 'Hubungan Keluarga';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_37_hubungan_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'idhubungan' => $row->idhubungan,
        		'Hubungan' => $row->Hubungan,
        	    );
            // $this->load->view('_37_hubungan/t37_hubungan_read', $data);
            $data['_view'] = '_37_hubungan/t37_hubungan_read';
            $data['_caption'] = 'Hubungan Keluarga';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_37_hubungan'));
        }
    }

    public function create()
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('_37_hubungan/create_action'),
            'idhubungan' => set_value('idhubungan'),
            'Hubungan' => set_value('Hubungan'),
            );
        // $this->load->view('_37_hubungan/t37_hubungan_form', $data);
        $data['_view'] = '_37_hubungan/t37_hubungan_form';
        $data['_caption'] = 'Hubungan Keluarga';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'Hubungan' => $this->input->post('Hubungan',TRUE),
        	    );

            $this->_37_hubungan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_37_hubungan'));
        }
    }

    public function update($id)
    {
        $row = $this->_37_hubungan_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('_37_hubungan/update_action'),
        		'idhubungan' => set_value('idhubungan', $row->idhubungan),
        		'Hubungan' => set_value('Hubungan', $row->Hubungan),
        	    );
            // $this->load->view('_37_hubungan/t37_hubungan_form', $data);
            $data['_view'] = '_37_hubungan/t37_hubungan_form';
            $data['_caption'] = 'Hubungan Keluarga';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_37_hubungan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idhubungan', TRUE));
        } else {
            $data = array(
        		'Hubungan' => $this->input->post('Hubungan',TRUE),
        	    );

            $this->_37_hubungan_model->update($this->input->post('idhubungan', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_37_hubungan'));
        }
    }

    public function delete($id)
    {
        $row = $this->_37_hubungan_model->get_by_id($id);

        if ($row) {
            $this->_37_hubungan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_37_hubungan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_37_hubungan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('Hubungan', 'hubungan', 'trim|required');

    	$this->form_validation->set_rules('idhubungan', 'idhubungan', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t37_hubungan.xls";
        $judul = "t37_hubungan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Hubungan");

    	foreach ($this->_37_hubungan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->Hubungan);

    	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=t37_hubungan.doc");

        $data = array(
            't37_hubungan_data' => $this->_37_hubungan_model->get_all(),
            'start' => 0
            );

        $this->load->view('_37_hubungan/t37_hubungan_doc',$data);
    }

}

/* End of file _37_hubungan.php */
/* Location: ./application/controllers/_37_hubungan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-13 18:31:31 */
/* http://harviacode.com */
