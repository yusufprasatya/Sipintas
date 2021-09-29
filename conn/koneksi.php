 <?php
    $koneksi = mysqli_connect("localhost", "root", "123456", "sipintas2");
    function rupiah($angka)
    {

        $hasil_rupiah = "Rp " . number_format($angka, 2, ',', '.');
        return $hasil_rupiah;
    }
