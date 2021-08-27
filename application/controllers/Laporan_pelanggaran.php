<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
        redirect('login');      
				if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');
        
        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
    
    $this->load->model('Pelanggaran_Data_model');
  }

  public function index() {
    $data['halaman'] = "Laporan Pelanggaran";
    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
    $this->template->load('template/admin', 'laporan_pelanggaran/index', $data);
  }

  function laporan() {
    $pelanggaran_data = $this->Pelanggaran_data_model->get_pelanggaran($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);

		$this->load->library('Pdf');
		$pdf = new Pdf('L', 'mm', 'A4', true, 'UTF-8', false);
		$pdf->set_nsi_header(TRUE);
		$pdf->AddPage('L');
		$html = '';
		$html .= '
		<style>
			.h_tengah {text-align: center;}
			.h_kiri {text-align: left;}
			.h_kanan {text-align: right;}
			.txt_judul {font-size: 15pt; font-weight: bold; padding-bottom: 12px;}
			.header_kolom {background-color: #cccccc; text-align: center; font-weight: bold;}
		</style>
		'.$pdf->nsi_box($text = '<span class="txt_judul">LAPORAN PELANGGARAN SISWA</span>', $width = '100%', $spacing = '0', $padding = '1', $border = '0', $align = 'center').'
			<table width="100%" cellspacing="0" cellpadding="3" border="1" nobr="true">
				<tr class="header_kolom" style="vertical-align: middle;">
				<th style="width: 10%;">Nama Siswa</th>
				<th style="width: 40%;">Pelanggaran</th>
				<th style="width: 4%;">Poin</th>
				<th style="width: 20%;">Sanksi</th>
				<th style="width: 10%;">Pencatat</th>
				<th style="width: 10%;">Tanggal</th>
				<th style="width: 6%;">Status</th>
        </tr>
    ';
		$no =1;
		foreach ($pelanggaran_data as $row) {
			$html .= '
			<tr nobr="true">
				<td nowrap>
					'. $row->nama_siswa .'<br>
					<span>'. $row->nis .'<br>
					Kelas: '. $row->nama_kelas .'</span><br>
				</td>
				<td nowrap>
					<strong>'. $row->nama_kategori_pelanggaran." - ".$row->nama_jenis_pelanggaran .'</strong> <br> 
					'. $row->nama_pelanggaran." - ".$row->nama_jenis_pelanggaran .' <br>
					<span><em>'. $row->catatan.'</em></span>
				</td>
				<td class="text-center">'. $row->poin .'</td>
				<td nowrap>
					<span><em>'. $row->nama_kategori_sanksi.'</em></span><br>
					'. $row->nama_sanksi .'
				</td>
				<td nowrap>'. $row->nama_ptk .'</td>
				<td nowrap>'. $row->tgl .'</td>
				<td nowrap>'. $row->status .'</td>
			</tr>';
		}
		$html .= '</table>';
		$pdf->nsi_html($html);
		$pdf->Output('lap_anggota'.date('Ymd_His') . '.pdf', 'I');
	} 
}