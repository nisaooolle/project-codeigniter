<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>
<body>
    <div class="min-vh-100 d-flex align-items-center">
        <div class="card w-50 m-auto p-3 ">
            <h3 class="text-center">Ubah Guru</h3>
            <?php foreach($guru as $data_siswa ): ?>
            <form action="<?php echo base_url('admin/aksi_update_guru')?>" enctype="multipart/form-data" method="post" class="row">
                <input type="hidden" name="id" value="<?php echo $data_siswa->id?>">
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" class="form-control" id="nama_guru" name="nama" value="<?php echo $data_siswa->nama_guru?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Nik</label>
                    <input type="text" class="form-control" id="nik" name="nik" value="<?php echo $data_siswa->nik?>">
                </div>
                <div class="mb-3 col-6">
                    <label for="nama" class="form-label">Gender</label>
                    <select name="gender" class="form-select">
                        <option selected value="<?php echo $data_siswa->gender?>"><?php echo $data_siswa->gender?></option>
                        <option value="laki-laki">Laki Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>