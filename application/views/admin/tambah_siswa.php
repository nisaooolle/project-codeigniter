<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tambah siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
        <div class="min-vh-100 d-flex align-items-center">
        <div class="card w-50 m-auto p-3 ">
            <h3 class="text-center">Tambah Siswa</h3>
            <form action="<?php echo base_url('admin/aksi_tambah_siswa')?>" enctype="multipart/form-
            " method="post" class="row">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nama Siswa</label>
                    <input type="text" class="form-control" id="nama_siswa" name="nama">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nisn</label>
                    <input type="text" class="form-control" id="nisn" name="nisn">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected>Pilih Gender</option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">TTl</label>
                    <input type="text" class="form-control" id="ttl" name="ttl">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas">
                </div>
                <div class="mb-3 col-6">
                    <label for="kelas" class="form-label">Jurusan</label>
                    <input type="text" class="form-control" id="jurusan" name="jurusan" >
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>