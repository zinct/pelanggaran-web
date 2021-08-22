<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggaran extends CI_Controller {
  function __construct(){
    parent::__construct();
    $this->load->model('Pelanggaran_model');

    if(!$this->session->userdata('login'))
				redirect('login');
        if($this->session->userdata('level') == 'walikelas')
        redirect('login');      
  }

  public function index(){
    $data['halaman'] = "Pelanggaran";
    $data['pelanggaran'] = $this->Pelanggaran_model->get_pelanggaran();
    $data['kategori_pelanggaran'] =  $this->db->get('kategori_pelanggaran')->result();
    $data['jenis_pelanggaran'] = $this->db->get('jenis_pelanggaran')->result();
    $this->template->load('template/admin', 'pelanggaran/index', $data);
  }

  public function show($id) {
    $this->db->select('pelanggaran.id_pelanggaran, pelanggaran.nama_pelanggaran, pelanggaran.id_jenis_pelanggaran, jenis_pelanggaran.id_kategori_pelanggaran, pelanggaran.poin');
    $this->db->join('jenis_pelanggaran', 'pelanggaran.id_jenis_pelanggaran=jenis_pelanggaran.id_jenis_pelanggaran');
    $pelanggaran = $this->db->get_where('pelanggaran', ['id_pelanggaran' => $id])->row();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function search($id_jenis_pelanggaran)
  {
    $pelanggaran = $this->db->get_where(
      'pelanggaran',
      ['id_jenis_pelanggaran'=>$id_jenis_pelanggaran,])
      ->result();
    header('Content-Type: application/json');
    echo json_encode($pelanggaran);
  }

  public function store() {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'id_jenis_pelanggaran' => $this->input->post('jenis_pelanggaran_id'),
      'poin' => $this->input->post('poin'),
    ];

    $this->db->insert('pelanggaran', $data);
    $this->session->set_flashdata('success', 'Berhasil menambahkan data.');
    redirect('/pelanggaran');
  }

  public function update($id) {
    $data = [
      'nama_pelanggaran' => $this->input->post('nama_pelanggaran'),
      'id_jenis_pelanggaran' => $this->input->post('jenis_pelanggaran_id'),
      'poin' => $this->input->post('poin'),
    ];

    $this->db->where('id_pelanggaran', $id);
    $this->db->update('pelanggaran', $data);

    $this->session->set_flashdata('success', 'Berhasil mengubah data.');
    redirect('/pelanggaran');
  }

  public function delete($id) {
    $this->db->where('id_pelanggaran', $id);
    $this->db->delete('pelanggaran');

    $this->session->set_flashdata('success', 'Berhasil menghapus data.');
    redirect('/pelanggaran');
  }

  function cellColor($obj, $cells, $color){
    $obj->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
        'type' => PHPExcel_Style_Fill::FILL_SOLID,
        'startcolor' => array(
             'rgb' => $color
            )
        ));
    }

  public function export() {
    // create file name
    $fileName = 'data-'.time().'.xlsx';  
    $data = $this->get_data();
    // var_dump($data['jurusan']);die;
    // load excel library
    $this->load->library('excel');
    $objPHPExcel = new PHPExcel();

    $objPHPExcel->setActiveSheetIndex(0);
    $objPHPExcel->getActiveSheet()->setTitle('LAPORAN PELANGGARAN');
    // Auto size columns for each worksheet
    foreach(range('A','Z') as $columnID) {
      $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
          ->setAutoSize(true);
    }
    // Center Align
    $style = array(
      'alignment' => array(
          'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
          'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
      )
    );

    $objPHPExcel->getDefaultStyle()->applyFromArray($style);

    // set Header
    $objPHPExcel->getActiveSheet()->SetCellValue('A2', 'Komponen')->getStyle('A2')->getFont()->setBold(true);
    // $this->cellColor($objPHPExcel, 'A2', 'FFFF00');
    $headA = ord('B');
    $headB = ord('C');
    foreach($data['tahun'] as $row) {
      $objPHPExcel->getActiveSheet()->SetCellValue(chr($headA) . 2, $row->year)->getStyle(chr($headA) . 2)->getFont()->setBold(true);      
      // $this->cellColor($objPHPExcel,chr($headA) . 2, 'FFFF00');

      $objPHPExcel->getActiveSheet()->SetCellValue(chr($headA) . 3, 'Pelanggaran');      
      $objPHPExcel->getActiveSheet()->SetCellValue(chr($headB) . 3, 'Sanksi');
      // $this->cellColor($objPHPExcel, chr($headA) . 3, 'FFFF00');
      // $this->cellColor($objPHPExcel, chr($headB) . 3, 'FFFF00');
      $objPHPExcel->getActiveSheet()->mergeCells(chr($headA++) . '2:' . chr($headB++) . '2');      
      $headA++;
      $headB++;
    } 

    $objPHPExcel->getActiveSheet()->mergeCells('A1:' . chr($headA-1) . '1');      
    $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);     
    $objPHPExcel->getActiveSheet()->SetCellValue('A1', 'LAPORAN PELANGGARAN & SANKSI SISWA')->getStyle('A1')->getFont()->setBold(true);
    $this->cellColor($objPHPExcel,'A1', 'FFFF00');

    // Body
    $kelasI = 4;
    foreach($data['jurusan'] as $jur) {
      
      $headA = ord('B');
      $headB = ord('C');
      foreach($data['tahun'] as $row) {
        $pel = @$this->db->query("
          SELECT 
            COUNT(jurusan.id_jurusan) AS pel
          FROM 
            pelanggaran_data
          JOIN
            kelas ON pelanggaran_data.id_kelas = kelas.id_kelas
          JOIN
            jurusan ON kelas.id_jurusan = jurusan.id_jurusan
          WHERE 
            status = 'Disetujui' AND YEAR(tgl) = $row->year AND kelas.id_jurusan = $jur->id_jurusan
          GROUP BY jurusan.id_jurusan
        ")->row()->pel ?? '-';
        $objPHPExcel->getActiveSheet()->SetCellValue(chr($headA) . $kelasI, $pel);      
        $objPHPExcel->getActiveSheet()->SetCellValue(chr($headB) . $kelasI, $pel);
        $headA++;
        $headB++;
        $headA++;
        $headB++;
      }

      $kelasI++;

      foreach($this->db->get_where('kelas', ['id_jurusan' => $jur->id_jurusan])->result() as $kel ) {
        $headA = ord('B');
        $headB = ord('C');
        foreach($data['tahun'] as $row) {  
          $pel = @$this->db->query("SELECT IFNULL(COUNT(id_pelanggaran_data), 0) as pel FROM pelanggaran_data WHERE status = 'Disetujui' AND id_kelas = $kel->id_kelas AND YEAR(tgl) = $row->year GROUP BY id_kelas")->row()->pel ?? '-';
          $objPHPExcel->getActiveSheet()->SetCellValue(chr($headA) . $kelasI, $pel);      
          $objPHPExcel->getActiveSheet()->SetCellValue(chr($headB) . $kelasI, $pel);
          $headA++;
          $headB++;
          $headA++;
          $headB++;
        }
      $kelasI++;
      }

    }
    
    $kelasI = 4;
    foreach($data['jurusan'] as $row) {
      $objPHPExcel->getActiveSheet()->getStyle('A'.$kelasI)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
      $objPHPExcel->getActiveSheet()->SetCellValue('A'.$kelasI++, $row->nama_jurusan);

      foreach($this->db->get_where('kelas', ['id_jurusan' => $row->id_jurusan])->result() as $kel ) {
        $objPHPExcel->getActiveSheet()->getStyle('A'.$kelasI)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);
        $objPHPExcel->getActiveSheet()->SetCellValue('A'.$kelasI++, ' - ' . $kel->nama_kelas);
      }
    }
 
    // die;
    
    $objPHPExcel->getActiveSheet()->SetCellValue('A3', 'Jurusan / Kelas');
    // $this->cellColor($objPHPExcel, 'A3', 'FFFF00');
    $filename = "LAPORAN PELANGGARAN.xlsx";
		@ob_clean();
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); 
		header('Cache-Control: max-age=0'); //no cache
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
		$objWriter->save('php://output');

  }

  public function get_data() {
    $data['tahun'] = $this->db->query("SELECT YEAR(tgl) AS year FROM pelanggaran_data WHERE status = 'Disetujui' GROUP BY YEAR(tgl) ORDER BY YEAR(tgl) ASC")->result();
    $data['jurusan'] = $this->db->get('jurusan')->result();
    return $data;
  }
}