<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class _44_kecamatan extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('_44_kecamatan_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));

        if ($q <> '') {
            $config['base_url'] = base_url() . '_44_kecamatan?q=' . urlencode($q);
            $config['first_url'] = base_url() . '_44_kecamatan?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . '_44_kecamatan';
            $config['first_url'] = base_url() . '_44_kecamatan';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->_44_kecamatan_model->total_rows($q);
        $_44_kecamatan = $this->_44_kecamatan_model->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
                '_44_kecamatan_data' => $_44_kecamatan,
                'q' => $q,
                'pagination' => $this->pagination->create_links(),
                'total_rows' => $config['total_rows'],
                'start' => $start,
            );
        // $this->load->view('_44_kecamatan/t44_kecamatan_list', $data);
        $data['_view'] = '_44_kecamatan/t44_kecamatan_list';
        $data['_caption'] = 'Kecamatan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function read($id)
    {
        $row = $this->_44_kecamatan_model->get_by_id($id);
        if ($row) {
            $data = array(
        		'id' => $row->id,
        		'kabupaten_id' => $row->kabupaten_id,
        		'nama' => $row->nama,
                'namaKabupaten' => $row->namaKabupaten,
        	    );
            // $this->load->view('_44_kecamatan/t44_kecamatan_read', $data);
            $data['_view'] = '_44_kecamatan/t44_kecamatan_read';
            $data['_caption'] = 'Kecamatan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_kecamatan'));
        }
    }

    public function create()
    {
        $this->load->model('_43_kabupaten/_43_kabupaten_model');
        $kabupaten = $this->_43_kabupaten_model->get_all();
        $data = array(
            'button' => 'Create',
            'action' => site_url('_44_kecamatan/create_action'),
            'id' => set_value('id'),
            'kabupaten_id' => set_value('kabupaten_id'),
            'nama' => set_value('nama'),
            'kabupaten_data' => $kabupaten,
            );
        // $this->load->view('_44_kecamatan/t44_kecamatan_form', $data);
        $data['_view'] = '_44_kecamatan/t44_kecamatan_form';
        $data['_caption'] = 'Kecamatan';
        $this->load->view('_00_dashboard/_00_dashboard', $data);
    }

    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'kabupaten_id' => $this->input->post('kabupaten_id',TRUE),
        		'nama' => $this->input->post('nama',TRUE),
        	    );

            $this->_44_kecamatan_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('_44_kecamatan'));
        }
    }

    public function update($id)
    {
        $row = $this->_44_kecamatan_model->get_by_id($id);

        if ($row) {
            $this->load->model('_43_kabupaten/_43_kabupaten_model');
            $kabupaten = $this->_43_kabupaten_model->get_all();
            $data = array(
                'button' => 'Update',
                'action' => site_url('_44_kecamatan/update_action'),
        		'id' => set_value('id', $row->id),
        		'kabupaten_id' => set_value('kabupaten_id', $row->kabupaten_id),
        		'nama' => set_value('nama', $row->nama),
                'kabupaten_data' => $kabupaten,
        	    );
            // $this->load->view('_44_kecamatan/t44_kecamatan_form', $data);
            $data['_view'] = '_44_kecamatan/t44_kecamatan_form';
            $data['_caption'] = 'Kecamatan';
            $this->load->view('_00_dashboard/_00_dashboard', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_kecamatan'));
        }
    }

    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
        		'kabupaten_id' => $this->input->post('kabupaten_id',TRUE),
        		'nama' => $this->input->post('nama',TRUE),
        	    );

            $this->_44_kecamatan_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('_44_kecamatan'));
        }
    }

    public function delete($id)
    {
        $row = $this->_44_kecamatan_model->get_by_id($id);

        if ($row) {
            $this->_44_kecamatan_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('_44_kecamatan'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('_44_kecamatan'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('kabupaten_id', 'kabupaten id', 'trim|required');
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');

    	$this->form_validation->set_rules('id', 'id', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "t44_kecamatan.xls";
        $judul = "t44_kecamatan";
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
    	xlsWriteLabel($tablehead, $kolomhead++, "Kabupaten Id");
    	xlsWriteLabel($tablehead, $kolomhead++, "Nama");

    	foreach ($this->_44_kecamatan_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
    	    xlsWriteLabel($tablebody, $kolombody++, $data->kabupaten_id);
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
        header("Content-Disposition: attachment;Filename=t44_kecamatan.doc");

        $data = array(
            't44_kecamatan_data' => $this->_44_kecamatan_model->get_all(),
            'start' => 0
            );

        $this->load->view('_44_kecamatan/t44_kecamatan_doc',$data);
    }

}

/* End of file _44_kecamatan.php */
/* Location: ./application/controllers/_44_kecamatan.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2021-03-12 16:47:38 */
/* http://harviacode.com */
