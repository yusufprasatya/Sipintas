<?php
require_once '../dosen/dompdf/autoload.inc.php';
require_once '../conn/koneksi.php';


$judul_penelitian = "Pengembanganb web aplikasi dengan UML";
$nama_peneliti = "muhammad Yusuf";
$reviewer = "Guntor Barokah, S.Kom, M.Kom";
$nidn = $_GET['nidn'];
// $no = 1;
$ulasan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.nidn=dosen.nidn INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE pengajuan.nidn='$nidn'");
$data = mysqli_fetch_array($ulasan);
// echo mysqli_error($koneksi);
// include autoloader



// Reference the Dompdf namespace 
use Dompdf\Dompdf;

// Instantiate and use the dompdf class 
$dompdf = new Dompdf();

// Load HTML content 
// $dompdf->loadHtml('<h1>Welcome to CodexWorld.com</h1>');
$html = <<<'ENDHTML'
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<HTML>

<HEAD>
    <META http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <TITLE>form_persetujuan Proposal Unitas</TITLE>
    <META name="generator" content="BCL easyConverter SDK 5.0.241">
    <META name="author" content="James Hafner">
    <STYLE type="text/css">
        body {
            margin-top: 0x;
            margin-left: 0px;
        }

        #page_1 {
            position: relative;
            overflow: hidden;
            margin: 50px 0px 0px 50px;
            padding: 0px;
            border: none;
            width: 595px;
        }

        #page_1 #id1_1 {
            border: none;
            margin: 0px 0px 0px 0px;
            padding: 0px;
            border: none;
            width: 699px;
            overflow: hidden;
        }

        #page_1 #id1_2 {
            border: none;
            margin: 550px 0px 0px 166px;
            padding: 0px;
            border: none;
            width: 533px;
            overflow: hidden;
        }





        .ft0 {
            font: bold 16px 'Times New Roman';
            line-height: 19px;
        }

        .ft1 {
            font: 16px 'Times New Roman';
            line-height: 19px;
            
         
        }

        .ft2 {
            font: italic 16px 'Times New Roman';
            line-height: 19px;
        }

        .ft3 {
            font: 8px 'Calibri';
            line-height: 10px;
        }

        .p0 {
            text-align: left;
            padding-left: 169px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p1 {
            text-align: left;
            margin-top: 39px;
            margin-bottom: 0px;
        }

        .p2 {
            text-align: left;
            margin-top: 1px;
            margin-bottom: 0px;
        }

        .p3 {
            text-align: left;
            padding-left: 1px;
            margin-top: 8px;
            margin-bottom: 0px;
        }

        .p4 {
            text-align: left;
            margin-top: 37px;
            margin-bottom: 0px;
        }

        .p5 {
            text-align: left;
            margin-top: 29px;
            margin-bottom: 0px;
        }

        .p6 {
            text-align: left;
            margin-top: 21px;
            margin-bottom: 0px;
        }

        .p7 {
            text-align: left;
            padding-left: 1px;
            margin-top: 80px;
            margin-bottom: 0px;
        }

        .p8 {
            text-align: left;
            margin-top: 0px;
            margin-bottom: 0px;
        }
      
    </STYLE>
</HEAD>
ENDHTML;

$html .= '<BODY>
    <DIV id="page_1">


        <DIV id="id1_1">
            <P class="p0 ft0">Form Persetujuan Proposal Penelitian</P>
            <P class="p1 ft1">Setelah melalui proses pemeriksaan, maka proposal penelitian yang berjudul:</P>
            <br>
            <p style="text-align:justify; font-weight:bold;"; class="p2 ft1">' . $data["judul_penelitian"] . '</p>

            <P class="p4 ft1">dengan peneliti:</P>
            <br>
            <b class="p3 ft1">' . $data["nama"] . '</b>
            <br>
            <P class="p5 ft1">telah dapat disetujui untuk dapat diproses lebih lanjut.</P>
            <P class="p6 ft1">Palembang,</P>
            <P class="p6 ft1">Tim Penilai (<SPAN class="ft2">Reviewer</SPAN>) I,</P>
            <P class="p7 ft1">' . $data["nama_petugas"] . '</P>
        </DIV>
    </DIV>
</BODY>

</HTML>';



$dompdf->loadhtml($html);
$dompdf->setPaper('legal', 'potrait');
$dompdf->render();
$dompdf->stream("surat Persetujuan", array("Attachment" => 0));
