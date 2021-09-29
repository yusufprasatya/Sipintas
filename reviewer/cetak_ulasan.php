<?php
require_once '../dosen/dompdf/autoload.inc.php';
require_once '../conn/koneksi.php';

$id_ulasan = $_GET['id_ulasan'];
$ulasan = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN dosen ON pengajuan.nidn=dosen.nidn INNER JOIN ulasan ON pengajuan.id_pengajuan=ulasan.id_pengajuan INNER JOIN petugas ON ulasan.id_petugas=petugas.id_petugas WHERE ulasan.id_ulasan='$id_ulasan'");
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
<TITLE>form_penilaian</TITLE>
<META name="generator" content="BCL easyConverter SDK 5.0.241">
<META name="author" content="James Hafner">
<STYLE type="text/css">

body {margin-top: 0px;margin-left: -20px;}

#page_1 {position:relative; overflow: hidden;margin: 97px 0px 12px 50px;padding: 0px;border: none;width: 698px;}
#page_1 #id1_1 {border:none;margin: 0px 0px 0px 0px;padding: 0px;border:none;width: 698px;overflow: hidden;}
#page_1 #id1_2 {border:none;margin: 115px 0px 0px 165px;padding: 0px;border:none;width: 533px;overflow: hidden;}

#page_1 #p1dimg1 {position:absolute;top:261px;left:0px;z-index:-1;width:663px;height:2px;font-size: 1px;line-height:nHeight;}
#page_1 #p1dimg1 #p1img1 {width:595px;height:2px;}




.ft0{font: bold 16px 'Times New Roman';line-height: 19px;}
.ft1{font: bold 16px 'Times New Roman';margin-left: 36px;line-height: 19px;}
.ft2{font: 16px 'Times New Roman';line-height: 19px;}
.ft3{font: 1px 'Times New Roman';line-height: 2px;}
.ft4{font: 1px 'Times New Roman';line-height: 13px;}
.ft5{font: bold 16px 'Times New Roman';text-decoration: underline;line-height: 19px;}
.ft6{font: bold 16px 'Times New Roman';text-decoration: underline;margin-left: 4px;line-height: 19px;}
.ft7{font: 1px 'Times New Roman';line-height: 12px;}
.ft8{font: 16px 'Times New Roman';line-height: 18px;}
.ft9{font: 1px 'Times New Roman';line-height: 1px;}
.ft10{font: 1px 'Times New Roman';line-height: 2px;}
.ft11{font: 1px 'Times New Roman';line-height: 13px;}
.ft12{font: italic 16px 'Times New Roman';line-height: 19px;}
.ft13{font: 16px 'Times New Roman';text-decoration: underline;line-height: 19px;}
.ft14{font: 8px 'Calibri';line-height: 10px;}

.p0{text-align: left;padding-left: 177px;margin-top: 0px;margin-bottom: 0px;}
.p1{text-align: left;padding-left: 7px;margin-top: 19px;margin-bottom: 0px;}
.p2{text-align: right;padding-right: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p3{text-align: left;padding-left: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p4{text-align: left;padding-left: 19px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p5{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p6{text-align: left;margin-top: 30px;margin-bottom: 0px;}
.p7{text-align: left;padding-left: 8px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p8{text-align: left;padding-left: 55px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p9{text-align: left;padding-left: 83px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p10{text-align: left;padding-left: 7px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p11{text-align: left;padding-left: 6px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p12{text-align: center;padding-right: 2px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p13{text-align: center;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p14{text-align: right;padding-right: 4px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
.p15{text-align: left;padding-left: 24px;margin-top: 0px;margin-bottom: 0px;}
.p16{text-align: left;padding-left: 25px;padding-right: 209px;margin-top: 0px;margin-bottom: 0px;}
.p17{text-align: left;padding-left: 24px;margin-top: 21px;margin-bottom: 0px;}
.p18{text-align: left;padding-left: 24px;margin-top: 1px;margin-bottom: 0px;}
.p19{text-align: left;padding-left: 23px;margin-top: 20px;margin-bottom: 0px;}
.p20{text-align: left;padding-left: 23px;margin-top: 1px;margin-bottom: 0px;}
.p21{text-align: left;padding-left: 24px;margin-top: 9px;margin-bottom: 0px;}
.p22{text-align: left;padding-left: 24px;margin-top: 28px;margin-bottom: 0px;}
.p23{text-align: left;padding-left: 24px;margin-top: 60px;margin-bottom: 0px;}
.p24{text-align: left;margin-top: 0px;margin-bottom: 0px;}

.td0{padding: 0px;margin: 0px;width: 14px;vertical-align: bottom;}
.td1{padding: 0px;margin: 0px;width: 159px;vertical-align: bottom;}
.td2{padding: 0px;margin: 0px;width: 108px;vertical-align: bottom;}
.td3{padding: 0px;margin: 0px;width: 72px;vertical-align: bottom;}
.td4{padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;}
.td5{padding: 0px;margin: 0px;width: 0px;vertical-align: bottom;}
.td6{border-left: #000000 1px solid;border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td7{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 169px;vertical-align: bottom;}
.td8{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 301px;vertical-align: bottom;}
.td9{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 56px;vertical-align: bottom;}
.td10{border-right: #000000 1px solid;border-top: #000000 1px solid;padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
.td11{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 56px;vertical-align: bottom;}
.td12{border-left: #000000 1px solid;border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 38px;vertical-align: bottom;}
.td13{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 169px;vertical-align: bottom;}
.td14{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 187px;vertical-align: bottom;}
.td15{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
.td16{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
.td17{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 169px;vertical-align: bottom;}
.td18{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 301px;vertical-align: bottom;}
.td19{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 56px;vertical-align: bottom;}
.td20{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 46px;vertical-align: bottom;}
.td21{padding: 0px;margin: 0px;width: 187px;vertical-align: bottom;}
.td22{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 114px;vertical-align: bottom;}
.td23{border-right: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 301px;vertical-align: bottom;}
.td24{padding: 0px;margin: 0px;width: 170px;vertical-align: bottom;}
.td25{border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 170px;vertical-align: bottom;}

.tr0{height: 22px;}
.tr1{height: 30px;}
.tr2{height: 31px;}
.tr3{height: 33px;}
.tr4{height: 19px;}
.tr5{height: 29px;}
.tr6{height: 9px;}
.tr7{height: 12px;}
.tr8{height: 18px;}
.tr9{height: 2px;}
.tr10{height: 20px;}
.tr11{height: 13px;}

.t0{width: 281px;margin-left: 24px;margin-top: 8px;font: 16px 'Times New Roman';}
.t1{width: 662px;font: 16px 'Times New Roman';}

</STYLE>
</HEAD>
ENDHTML;

$html .= '<BODY>

<DIV id="page_1">
<DIV id="p1dimg1">
<IMG src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAgGBgcGBQgHBwcJCQgKDBQNDAsLDBkSEw8UHRofHh0aHBwgJC4nICIsIxwcKDcpLDAxNDQ0Hyc5PTgyPC4zNDL/2wBDAQkJCQwLDBgNDRgyIRwhMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjL/wAARCAABApcDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD1/wACf8k88Nf9gq1/9FLXQUUUAFFFFAHP+Mv+QHbf9hXTf/S2GugoooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKACiiigAooooAKKKKAOf8AAn/JPPDX/YKtf/RS10FFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFAHP+O/+SeeJf+wVdf8Aopq6CiigAooooAKKKKAPP/jb/wAkh13/ALd//SiOiiigD//Z" id="p1img1"></DIV>


<DIV id="id1_1">
<P class="p0 ft0">Form Penilaian Proposal Penelitian</P>
<P class="p1 ft0"><SPAN class="ft0">I.</SPAN><SPAN class="ft1">Identitas Penelitian</SPAN></P>
<TABLE cellpadding=0 cellspacing=0 class="t0">
<TR>
	<TD class="tr1 td0"><P class="p2 ft2">1.</P></TD>
	<TD class="tr1 td1"><P class="p3 ft2">Judul Penelitian</P></TD>
	<TD class="tr2 td3"><P  style="color:blue;text-align:justify;" class="p4 ft2">: ' . $data["judul_penelitian"] . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
</TR>
<TR>
	<TD class="tr1 td0"><P class="p2 ft2">2.</P></TD>
	<TD class="tr1 td1"><P class="p3 ft2">Ketua Tim Peneliti</P></TD>
	<TD class="tr2 td3"><P class="p4 ft2">: ' . $data["nama"] . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
    </TR>
<TR>
	<TD class="tr2 td0"><P class="p2 ft2">3.</P></TD>
	<TD class="tr2 td1"><P class="p3 ft2">Bidang Ilmu</P></TD>
    <TD class="tr2 td3"><P class="p4 ft2">: ' . $data["bidang_ilmu"] . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
	</TR>
<TR>
	<TD class="tr2 td0"><P class="p2 ft2">4.</P></TD>
	<TD class="tr2 td1"><P class="p3 ft2">Jumlah Anggota</P></TD>
	<TD class="tr2 td3"><P class="p4 ft2">: ' . $data["jmlh_anggota"] . " Orang" . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
</TR>
<TR>
	<TD class="tr3 td0"><P class="p2 ft2">5.</P></TD>
	<TD class="tr3 td1"><P class="p3 ft2">Biaya yang diusulkan</P></TD>
	<TD class="tr2 td3"><P class="p4 ft2">: ' . rupiah($data["biaya_diusulkan"]) . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
    </TR>
<TR>
	<TD class="tr3 td0"><P class="p2 ft2">6.</P></TD>
	<TD class="tr3 td1"><P class="p3 ft2">Biaya yang Disetujui</P></TD>
	<TD class="tr2 td3"><P class="p4 ft2">: ' . rupiah($data["biaya_disetujui"]) . '</P></TD>
	<TD class="tr2 td4"><P class="p5 ft2"></P></TD>
    </TR>
</TABLE>
<P class="p6 ft0"><SPAN class="ft5">II.</SPAN><SPAN class="ft6">Kr</SPAN>iteria dan Indikator</P>
<TABLE cellpadding=0 cellspacing=0 class="t1">
<TR>
	<TD class="tr4 td5"></TD>
	<TD rowspan=2 class="tr1 td6"><P class="p7 ft0">No.</P></TD>
	<TD rowspan=2 class="tr5 td7"><P class="p8 ft0">Kriteria</P></TD>
	<TD colspan=2 rowspan=2 class="tr5 td8"><P class="p9 ft0">Indikator Penilaian</P></TD>
	<TD class="tr4 td9"><P class="p10 ft0">Bobot</P></TD>
	<TD rowspan=2 class="tr5 td10"><P class="p11 ft0">Skor</P></TD>
	<TD rowspan=2 class="tr5 td10"><P class="p11 ft0">Nilai</P></TD>
</TR>
<TR>
	<TD class="tr6 td5"></TD>
	<TD rowspan=2 class="tr0 td11"><P class="p12 ft0">(%)</P></TD>
</TR>
<TR>
	<TD class="tr7 td5"></TD>
	<TD class="tr7 td12"><P class="p5 ft7">&nbsp;</P></TD>
	<TD class="tr7 td13"><P class="p5 ft7">&nbsp;</P></TD>
	<TD class="tr7 td14"><P class="p5 ft7">&nbsp;</P></TD>
	<TD class="tr7 td15"><P class="p5 ft7">&nbsp;</P></TD>
	<TD class="tr7 td16"><P class="p5 ft7">&nbsp;</P></TD>
	<TD class="tr7 td16"><P class="p5 ft7">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p13 ft8">1</P></TD>
	<TD class="tr8 td17"><P class="p11 ft8">Perumusan masalah</P></TD>
	<TD colspan=2 class="tr8 td18"><P class="p11 ft8">Ketajaman perumusan masalah dan tujuan</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">30</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["skor1"] . '</center><</TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["nilai1"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr4 td5"></TD>
	<TD class="tr4 td6"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr4 td17"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr4 td21"><P class="p11 ft2">penelitian</P></TD>
	<TD class="tr4 td22"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr4 td19"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr4 td20"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr4 td20"><P class="p5 ft9">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr9 td5"></TD>
	<TD class="tr9 td12"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td13"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td14"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td15"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p13 ft8">2</P></TD>
	<TD class="tr8 td17"><P class="p11 ft8">Manfaat hasil penelitian</P></TD>
	<TD class="tr8 td21"><P class="p11 ft8">Pengembangan IPTEKS,</P></TD>
	<TD class="tr8 td22"><P class="p14 ft8">pembangunan,</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">20</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["skor2"] . '</center></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["nilai2"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr10 td5"></TD>
	<TD class="tr10 td6"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td17"><P class="p5 ft9">&nbsp;</P></TD>
	<TD colspan=2 class="tr10 td18"><P class="p11 ft2">dan/atau pengembangan kelembagaan</P></TD>
	<TD class="tr10 td19"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr9 td5"></TD>
	<TD class="tr9 td12"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td13"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td14"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td15"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p13 ft8">3</P></TD>
	<TD class="tr8 td17"><P class="p11 ft8">Tinjauan pustaka</P></TD>
	<TD class="tr8 td21"><P class="p11 ft8">Relevansi, kemutakhiran,</P></TD>
	<TD class="tr8 td22"><P class="p14 ft8">dan penyusunan</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">15</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["skor3"] . '</center><</TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["nilai3"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr10 td5"></TD>
	<TD class="tr10 td6"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td17"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td21"><P class="p11 ft2">daftar pustaka</P></TD>
	<TD class="tr10 td22"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td19"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr9 td5"></TD>
	<TD class="tr9 td12"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td13"><P class="p5 ft10">&nbsp;</P></TD>
	<TD colspan=2 class="tr9 td23"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p13 ft8">4</P></TD>
	<TD class="tr8 td17"><P class="p11 ft8">Metode penelitian</P></TD>
	<TD colspan=2 class="tr8 td18"><P class="p11 ft8">Ketepatan metode yang digunakan</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">25</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["skor4"] . '</center><</TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["nilai4"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr9 td5"></TD>
	<TD class="tr9 td12"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td13"><P class="p5 ft10">&nbsp;</P></TD>
	<TD colspan=2 class="tr9 td23"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p13 ft8">5</P></TD>
	<TD class="tr8 td17"><P class="p11 ft8">Kelayakan penelitian</P></TD>
	<TD colspan=2 class="tr8 td18"><P class="p11 ft8">Kesesuaian jadwal, keahlian personalia,</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">10</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["skor5"] . '</center><</TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["nilai5"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr10 td5"></TD>
	<TD class="tr10 td6"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td17"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td21"><P class="p11 ft2">kewajaran biaya</P></TD>
	<TD class="tr10 td22"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td19"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr10 td20"><P class="p5 ft9">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr9 td5"></TD>
	<TD class="tr9 td12"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td13"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td14"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td15"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td11"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
	<TD class="tr9 td16"><P class="p5 ft10">&nbsp;</P></TD>
</TR>
<TR>
	<TD class="tr8 td5"></TD>
	<TD class="tr8 td6"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr8 td24"><P class="p11 ft8">T o t a l</P></TD>
	<TD class="tr8 td21"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr8 td22"><P class="p5 ft9">&nbsp;</P></TD>
	<TD class="tr8 td19"><P class="p12 ft8">100</P></TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["total_skor"] . '</center><</TD>
	<TD class="tr8 td20"><P class="p5 ft9">&nbsp;</P><center>' . $data["total_nilai"] . '</center><</TD>
</TR>
<TR>
	<TD class="tr11 td5"></TD>
	<TD class="tr11 td12"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td25"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td14"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td15"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td11"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td16"><P class="p5 ft11">&nbsp;</P></TD>
	<TD class="tr11 td16"><P class="p5 ft11">&nbsp;</P></TD>
</TR>
</TABLE>
<P class="p15 ft2">Keterangan:</P>
<P class="p16 ft2">Skor: 1, 2, 4, atau 5 ( 1 = sangat kurang, 2 = kurang, 4 = baik, 5 = sangat baik) Nilai = Bobot x Skor; Batas penerimaan (<SPAN class="ft12">passing grade</SPAN>) = 350 <SPAN class="ft13">tanpa</SPAN> skor i</P>
<P class="p17 ft2">Rekomendasi: <SPAN class="ft0">Diterima </SPAN>/ <SPAN class="ft0">Ditolak </SPAN>(coret yang tidak perlu)</P>
<P class="p18 ft2">Alasan penolakan<SPAN class="ft0">: ' . $data['alasan'] . '</SPAN> (lihat halaman selanjutnya)</P>
<P class="p19 ft0">Saran perbaikan:</P>
<br>
<P class="p20 ft2">' . $data["ulasan"] . '</P>
<P class="p21 ft0">.............................................................................................................................................</P>
<P class="p22 ft2">Palembang,</P>
<P class="p18 ft2">Tim Penilai (<SPAN class="ft12">Reviewer</SPAN>) I,</P>
<P class="p23 ft2">' . $data['nama_petugas'] . '</P>
</DIV>
<DIV id="id1_2">
</DIV>
</DIV>
</BODY>
</HTML>';



$dompdf->loadhtml($html);
$dompdf->setPaper('legal', 'potrait');
$dompdf->render();
$dompdf->stream("surat Persetujuan", array("Attachment" => 0));
