<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_pelanggaran_kelas extends CI_Controller {
  function __construct(){
    parent::__construct();

    if(!$this->session->userdata('login'))
        redirect('login');        

        if($this->session->userdata('level') == 'siswa')
			redirect('pelanggaran_siswa');
        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index() {
    $data['halaman'] = "Laporan Pelanggaran Kelas";
    $data['pelanggaran_data'] = $this->Pelanggaran_data_model->get_laporan_pelanggaran_kelas($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);
    $this->template->load('template/admin', 'laporan_pelanggaran_kelas/index', $data);
  }

  function laporan() {
    $pelanggaran_data = $this->Pelanggaran_data_model->get_laporan_pelanggaran_kelas($this->Pelanggaran_data_model->get_TahunAktif()->id_tahun);


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
				<th>Nama Kelas</th>
				<th>jurusan</th>
							<th>Pelanggaran</th>
							<th>Poin Tercatat</th>
        </tr>
    ';
		$no =1;
		foreach ($pelanggaran_data as $row) {
			$html .= '
			<tr nobr="true">
        <td nowrap>
          '. $row->nama_kelas .'<br>
        </td>
        <td>
          '. $row->nama_jurusan .'
        </td>
        <td>
          '. $row->jumlah_pelanggaran .'
        </td>
        <td>
          '. $row->jumlah_poin .'
        </td>
			</tr>';
		}
		$html .= '</table>';
		$html .= '<br>';
		$html .= '<table width="90%">
		<br><br><br><br><br><br><br><br><br><br><br>
			<tr>
				<td height=""></td>
				<td class="h_tengah">Bandung, '.date('Y-m-d').'</td>
			</tr>
			<br>
			<tr>
				<td height="50px" class="h_tengah"></td>
				<td class="h_tengah">Mengetahui</td>
			</tr>
			<tr>
				<td class="h_tengah"></td>
				<td class="h_tengah">________________</td>
			</tr>
		</table>';
		$pdf->nsi_html($html);
		$pdf->Output('lap_anggota'.date('Ymd_His') . '.pdf', 'I');
	} 
}