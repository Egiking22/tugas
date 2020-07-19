<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Perdata extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_perdata');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'perdata/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'perdata/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'perdata/index.html';
            $config['first_url'] = base_url() . 'perdata/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_perdata->total_rows($q);
        $perdata = $this->M_perdata->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'perdata_data' => $perdata,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('adminlte/header');
        $this->load->view('adminlte/navbar');
        $this->load->view('adminlte/sidebar');        
        $this->load->view('perdata/jadwal_persidangan_perdata_list', $data);
        $this->load->view('adminlte/footer');
    }

    public function read($id) 
    {
        $row = $this->M_perdata->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'nomor_perkara' => $row->nomor_perkara,
		'pihak' => $row->pihak,
		'hakim' => $row->hakim,
		'pp' => $row->pp,
		'keterngan' => $row->keterngan,
	    );
            $this->load->view('adminlte/header');
            $this->load->view('adminlte/navbar');
            $this->load->view('adminlte/sidebar');             
            $this->load->view('perdata/jadwal_persidangan_perdata_read', $data);
            $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perdata'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('perdata/create_action'),
	    'no' => set_value('no'),
	    'nomor_perkara' => set_value('nomor_perkara'),
	    'pihak' => set_value('pihak'),
	    'hakim' => set_value('hakim'),
	    'pp' => set_value('pp'),
	    'keterngan' => set_value('keterngan'),
	);
        $this->load->view('adminlte/header');
        $this->load->view('adminlte/navbar');
        $this->load->view('adminlte/sidebar');         
        $this->load->view('perdata/jadwal_persidangan_perdata_form', $data);
        $this->load->view('adminlte/footer');
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nomor_perkara' => $this->input->post('nomor_perkara',TRUE),
		'pihak' => $this->input->post('pihak',TRUE),
		'hakim' => $this->input->post('hakim',TRUE),
		'pp' => $this->input->post('pp',TRUE),
		'keterngan' => $this->input->post('keterngan',TRUE),
	    );

            $this->M_perdata->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('perdata'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_perdata->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('perdata/update_action'),
		'no' => set_value('no', $row->no),
		'nomor_perkara' => set_value('nomor_perkara', $row->nomor_perkara),
		'pihak' => set_value('pihak', $row->pihak),
		'hakim' => set_value('hakim', $row->hakim),
		'pp' => set_value('pp', $row->pp),
		'keterngan' => set_value('keterngan', $row->keterngan),
	    );
            $this->load->view('adminlte/header');
            $this->load->view('adminlte/navbar');
            $this->load->view('adminlte/sidebar');             
            $this->load->view('perdata/jadwal_persidangan_perdata_form', $data);
            $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perdata'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('no', TRUE));
        } else {
            $data = array(
		'nomor_perkara' => $this->input->post('nomor_perkara',TRUE),
		'pihak' => $this->input->post('pihak',TRUE),
		'hakim' => $this->input->post('hakim',TRUE),
		'pp' => $this->input->post('pp',TRUE),
		'keterngan' => $this->input->post('keterngan',TRUE),
	    );

            $this->M_perdata->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('perdata'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_perdata->get_by_id($id);

        if ($row) {
            $this->M_perdata->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('perdata'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('perdata'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_perkara', 'nomor perkara', 'trim|required');
	$this->form_validation->set_rules('pihak', 'pihak', 'trim|required');
	$this->form_validation->set_rules('hakim', 'hakim', 'trim|required');
	$this->form_validation->set_rules('pp', 'pp', 'trim|required');
	$this->form_validation->set_rules('keterngan', 'keterngan', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jadwal_persidangan_perdata.xls";
        $judul = "jadwal_persidangan_perdata";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nomor Perkara");
	xlsWriteLabel($tablehead, $kolomhead++, "Pihak");
	xlsWriteLabel($tablehead, $kolomhead++, "Hakim");
	xlsWriteLabel($tablehead, $kolomhead++, "Pp");
	xlsWriteLabel($tablehead, $kolomhead++, "Keterngan");

	foreach ($this->M_perdata->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_perkara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pihak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hakim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->keterngan);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jadwal_persidangan_perdata.doc");

        $data = array(
            'jadwal_persidangan_perdata_data' => $this->M_perdata->get_all(),
            'start' => 0
        );
        
        $this->load->view('perdata/jadwal_persidangan_perdata_doc',$data);
    }

}

/* End of file Perdata.php */
/* Location: ./application/controllers/Perdata.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 17:49:18 */
/* http://harviacode.com */