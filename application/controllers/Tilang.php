<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tilang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_tilang');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'tilang/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'tilang/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'tilang/index.html';
            $config['first_url'] = base_url() . 'tilang/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->M_tilang->total_rows($q);
        $tilang = $this->M_tilang->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'tilang_data' => $tilang,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        $this->load->view('adminlte/header');
        $this->load->view('adminlte/navbar');
        $this->load->view('adminlte/sidebar');
        $this->load->view('tilang/jadwal_persidangan_tilang_list', $data);
        $this->load->view('adminlte/footer');
    }

    public function read($id) 
    {
        $row = $this->M_tilang->get_by_id($id);
        if ($row) {
            $data = array(
		'no' => $row->no,
		'nomor_perkara' => $row->nomor_perkara,
		'terdakwa' => $row->terdakwa,
		'hakim' => $row->hakim,
		'pp' => $row->pp,
	    );
            $this->load->view('adminlte/header');
            $this->load->view('adminlte/navbar');
            $this->load->view('adminlte/sidebar');            
            $this->load->view('tilang/jadwal_persidangan_tilang_read', $data);
            $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tilang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('tilang/create_action'),
	    'no' => set_value('no'),
	    'nomor_perkara' => set_value('nomor_perkara'),
	    'terdakwa' => set_value('terdakwa'),
	    'hakim' => set_value('hakim'),
	    'pp' => set_value('pp'),
	);
        $this->load->view('adminlte/header');
        $this->load->view('adminlte/navbar');
        $this->load->view('adminlte/sidebar');
        $this->load->view('tilang/jadwal_persidangan_tilang_form', $data);
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
		'terdakwa' => $this->input->post('terdakwa',TRUE),
		'hakim' => $this->input->post('hakim',TRUE),
		'pp' => $this->input->post('pp',TRUE),
	    );

            $this->M_tilang->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('tilang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->M_tilang->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('tilang/update_action'),
		'no' => set_value('no', $row->no),
		'nomor_perkara' => set_value('nomor_perkara', $row->nomor_perkara),
		'terdakwa' => set_value('terdakwa', $row->terdakwa),
		'hakim' => set_value('hakim', $row->hakim),
		'pp' => set_value('pp', $row->pp),
	    );
            $this->load->view('adminlte/header');
            $this->load->view('adminlte/navbar');
            $this->load->view('adminlte/sidebar');
            $this->load->view('tilang/jadwal_persidangan_tilang_form', $data);
            $this->load->view('adminlte/footer');
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tilang'));
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
		'terdakwa' => $this->input->post('terdakwa',TRUE),
		'hakim' => $this->input->post('hakim',TRUE),
		'pp' => $this->input->post('pp',TRUE),
	    );

            $this->M_tilang->update($this->input->post('no', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('tilang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->M_tilang->get_by_id($id);

        if ($row) {
            $this->M_tilang->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('tilang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('tilang'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nomor_perkara', 'nomor perkara', 'trim|required');
	$this->form_validation->set_rules('terdakwa', 'terdakwa', 'trim|required');
	$this->form_validation->set_rules('hakim', 'hakim', 'trim|required');
	$this->form_validation->set_rules('pp', 'pp', 'trim|required');

	$this->form_validation->set_rules('no', 'no', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "jadwal_persidangan_tilang.xls";
        $judul = "jadwal_persidangan_tilang";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Terdakwa");
	xlsWriteLabel($tablehead, $kolomhead++, "Hakim");
	xlsWriteLabel($tablehead, $kolomhead++, "Pp");

	foreach ($this->M_tilang->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nomor_perkara);
	    xlsWriteLabel($tablebody, $kolombody++, $data->terdakwa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->hakim);
	    xlsWriteLabel($tablebody, $kolombody++, $data->pp);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=jadwal_persidangan_tilang.doc");

        $data = array(
            'jadwal_persidangan_tilang_data' => $this->M_tilang->get_all(),
            'start' => 0
        );
        
        $this->load->view('tilang/jadwal_persidangan_tilang_doc',$data);
    }

}

/* End of file Tilang.php */
/* Location: ./application/controllers/Tilang.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2020-07-18 17:49:46 */
/* http://harviacode.com */