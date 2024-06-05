<?php
$id = $_GET['id'];


if(isset($_POST['JudulFoto'])) {
    $JudulFoto     = $_POST['JudulFoto'];
    $DeskripsiFoto = $_POST['DeskripsiFoto'];
    $AlbumID       = $_POST['AlbumID'];
    $TanggalUnggah = $_POST['TanggalUnggah'];
    $UserID        = $_SESSION['user']['UserID'];

    $query = mysqli_query($koneksi, "UPDATE foto set JudulFoto='$JudulFoto', DeskripsiFoto='$DeskripsiFoto', AlbumID='$AlbumID', TanggalUnggah ='$TanggalUnggah', UserID='$UserID' WHERE FotoID=$id");

    $LokasiFile  = $_FILES['LokasiFile'];

    if ($LokasiFile['name'] !="") {

        $nama_gambar = $LokasiFile['name'];
        move_uploaded_file($LokasiFile['tmp_name'], 'LokasiFile/'.$LokasiFile['name']);
        $query = mysqli_query($koneksi, "UPDATE foto set LokasiFile='$nama_gambar' WHERE FotoID=$id");
    }

   
    
    if($query > 0 ) {
        echo '<script>alert("Ubah data berhasil");location.href="?page=galeri";</script>';
    }else{

        echo '<script>alert("Ubah data gagal");</script>';
    }
}


?>



<div class="container-fluid px-4">
                        <h1 class="mt-4">Galeri Foto</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Galeri Foto</li>
                        </ol>
                        <a href="?page=galeri" class="btn btn-danger">Kembali</a>
                    <form method="post" enctype ="multipart/form-data">
                        <table class="table">
                            <tr>
                                <td  widh="200">Judul</td>
                                <td widh="1">:</td>
                                <td><input type="text" name="JudulFoto" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Deskripsi</td>
                                <td>:</td>
                                <td><input type="text" name="DeskripsiFoto" class="form-control"></td>
                            </tr>
                            <td>Album</td>
                                    <td>:</td>
                                    <td>
                                        <select name="AlbumID" class="form-select form-control">
                                            <?php
                                                $al = mysqli_query($koneksi, "SELECT*FROM album");
                                                while($album = mysqli_fetch_array($al)){
                                                    ?>
                                                    <option value="<?php echo $album['AlbumID']; ?>"><?php echo $album['NamaAlbum']; ?></option>
                                                    <?php
                                                }
                                            ?>
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><input type="date" name="TanggalUnggah" class="form-control"></td>
                            </tr>
                            <tr>
                                <td>Lokasi File</td>
                                <td>:</td>
                                <td><input type="file" name="LokasiFile" class="form-control"></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <button type ="submit" class="btn btn-primary">Simpan</button>
                                    <button type ="reset" class="btn btn-danger">Reset</button>
                            </td>
                            </tr>
                        </table>
                    </form>
                        
</div>