<?php 
    include "koneksi.php";

    
    $Id=$_GET['id'];
    // var_dump($Id);
    // die();
    $query2=mysqli_query($koneksi, "SELECT * FROM biodata WHERE id='$Id'") or die(mysqli_error($koneksi));
    $result2=mysqli_fetch_array($query2);
    // var_dump($result);
?>

<!-- Modal -->

        <form method="POST" id="formEdit">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>
                        <input type="hidden" name="id" id="Id" required="" value="<?php echo $result2['id']; ?>" />
                        <input type="text" name="nama" id="Nama" required="" value="<?php echo $result2['nama']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" id="Email" required="" value="<?php echo $result2['email']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Telpon</td>
                    <td>
                        <input type="text" name="telp" id="Telp" required="" value="<?php echo $result2['telp']; ?>" />
                    </td>
                </tr>
                <tr>
                    <td>Komentar</td>
                    <td>
                        <input type="text" name="komentar" id="Komentar" required="" value="<?php echo $result2['komentar']; ?>" />
                    </td>
                </tr>
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="simpan" id="simpan" value="Simpan" data-bs-dismiss="modal" />
                        <!-- <button type="button" id="cancelButton">Batal</button> -->
                    </td>
                </tr>
            </table>
        </form>

        <!-- <script>
            $(document).ready(function() {
                exampleModal.dispose();
            })
        </script> -->