<?php
include "koneksi.php";

switch ($_GET['action'])
{

    case 'save':

        $Nama = $_POST['nama'];
        $Email = $_POST['email'];
        $Telp = $_POST['telp'];
        $Komentar = $_POST['komentar'];

        $query = mysqli_query($koneksi, "INSERT INTO biodata(nama, email, telp, komentar) VALUES('$Nama', '$Email', '$Telp', '$Komentar')");
        if ($query)
        {
            echo "Simpan Data Berhasil";
        }
        else
        {
            echo "Simpan Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'edit':

        $Id = $_POST['id'];
        $Nama = $_POST['nama'];
        $Email = $_POST['email'];
        $Telp = $_POST['telp'];
        $Komentar = $_POST['komentar'];

        $query = mysqli_query($koneksi, "UPDATE biodata SET nama='$Nama', email='$Email', telp='$Telp', komentar='$Komentar' WHERE id='$Id'");
        if ($query)
        {
            echo "Edit Data Berhasil";
        }
        else
        {
            echo "Edit Data Gagal :" . mysqli_error($koneksi);
        }
    break;

    case 'delete':

        $Id = $_POST['id'];
        $query = mysqli_query($koneksi, "DELETE FROM biodata WHERE id='$Id'");
        if ($query)
        {
            echo "Hapus Data Berhasil";
        }
        else
        {
            echo "Hapus Data Gagal :" . mysqli_error($koneksi);
        }
    break;
}
?>