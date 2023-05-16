<table id="myTable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telpon</th>
            <th>Komentar</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
            include "koneksi.php";

            $no=1;
            $query=mysqli_query($koneksi, "SELECT * FROM biodata ORDER BY id DESC") or die(mysqli_error($koneksi));
            while ($result=mysqli_fetch_array($query)) {
        ?>
        <tr>
            <td>
                <?php echo $no++; ?>
            </td>
            <td>
                <?php echo $result['nama']; ?>
            </td>
            <td>
                <?php echo $result['email']; ?>
            </td>
            <td>
                <?php echo $result['telp']; ?>
            </td>
            <td>
                <?php echo $result['komentar']; ?>
            </td>
            <td>
                <button type="button" class="btn btn-primary asdwq" id="EditButton" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?php echo $result['id']; ?>" onclick="loadModalContent()">Edit</button>
                <button class="btn btn-danger" id="DeleteButton" value="<?php echo $result['id']; ?>">Delete</button>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalBody">
        <!-- Konten modal akan dimuat melalui AJAX -->
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        // loadModalContent();

        // Mendapatkan elemen-elemen tombol
        var buttons = document.getElementsByClassName('asdwq');

        // Membuat event listener untuk setiap tombol
        for (var i = 0; i < buttons.length; i++) {
            buttons[i].addEventListener('click', function() {
                var buttonValue = this.value;
                console.log(buttonValue); // Output: Nilai tombol yang diklik
                // var val = document.getElementById('EditButton');
                var id = buttonValue;
                // var id = 2;
                
                $.ajax({
                    url: 'form-edit.php',
                    type: 'GET',
                    data: {
                        id: id
                    },
                    success: function(response) {
                    $('#modalBody').html(response);
                    }
                });
            });
        }

    });

</script>