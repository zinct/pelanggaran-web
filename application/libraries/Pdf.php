<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF {

    var $nsi_header = FALSE;
    function __construct() {
        $this->CI =& get_instance();
        parent::__construct();

        $this->SetTopMargin(40);
        $this->setRightMargin(5);
        $this->setLeftMargin(5);
        $this->setFooterMargin(5);

        $this->SetHeaderMargin(5);
        $this->SetAutoPageBreak(true, 8);
        $this->SetAuthor('NSI');
        $this->SetDisplayMode('real', 'default');
        $this->SetFont('helvetica','',10); // default font isi

    }

    public function set_nsi_header($nsi_header) {
        if($nsi_header == TRUE) {
            $nsi_header = '<br><br><table style="width:100%;">
                    <tr>
                        <td style="width:10%;text-align:center; vertical-align:center"><img style="" src="assets/img/smk.png" width="68" height="68"></td>
                         <td style="width:90%;"><strong style="font-size: 20px;"> SMK BAKTI NUSANTARA 666</strong> <br>
                            <table>
                                <tr>
                                    <td>Jl. Percobaan No.65, Cileunyi Kulon, Cileunyi, Bandung, Jawa Barat 40622</td>
                                </tr>
                                <tr>
                                    <td>Tel.(022) 70721934 Email : smkbn666@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Web : www.smkbn666.com</td>
                                </tr>
                            </table>
                         </td>
                     </tr>
                </table>
                <hr>';
        }
        $this->nsi_header = $nsi_header;
    }

    public function nsi_html($html) {
        $this->SetFont('helvetica', '', 9); // default font header
        $this->writeHTML($html, true, false, true, false, '');
    }

    public function nsi_box($text = '', $width = '100%', $spacing = '0', $padding = '10', $border = '0', $align = 'center') {
        $out = '
            <table width="'.$width.'" cellspacing="'.$spacing.'" cellpadding="'.$padding.'" border="'.$border.'">
                <tr>
                    <td align="'.$align.'">'.$text.'</td>
                </tr>
            </table>
        ';
        return $out;
    }


    public function Header() {
        $this->SetFont('helvetica', '', 9); // default font header
        $this->writeHTMLCell(
            $w = 0, $h = 0, $x = '', $y = '',
            $this->nsi_header, $border = 0, $ln = 1, $fill = 0,
            $reseth = true, $align = 'top', $autopadding = true);
        $posisi_y = $this->getY();
        $this->SetTopMargin($posisi_y - 3);
    }

    public function Footer() {
        $x = $this->GetX();
        $y = $this->GetY();
        $pageWidth     = $this->getPageWidth();
        $pageMargins = $this->getMargins();
        $lebar_garis = $pageWidth - ($pageMargins['right']);

        $style = array();
        $this->Line($x, $y, $lebar_garis, $y, $style);
        // Set font
        $this->SetFont('helvetica', 'I', 7); // default font footer
        $this->Cell(0, 0, 'Halaman '.$this->getAliasNumPage().' dari '.$this->getAliasNbPages(), 'T', 0, 'L');
        $this->Cell(0, 0, 'Tanggal Cetak ' . date('d/m/Y H:i:s'), 'T', 0, 'R');
    }
    
} 