<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>siswa</title>
    <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet">

</head>
<style>
    .hapus {
        padding: 2px 10px 2px 10px;
        color: white;
        font-size: 15px;
        margin-left: 7%;
    }

    .edit {
        padding: 2px 10px 2px 10px;
        margin-left: 25%;
        color: white;
        font-size: 15px;
    }

    .create {
        margin-top: 15px;
        margin-left: 15px;
        margin-bottom: 15px;
    }

    .table {
        margin: 3rem 2rem 6rem;
        width: 75%;
        margin-top: -30%;
        margin-left: 15%;
    }
    @media (max-width: 600px) {

        .edit {
            margin-left: 4.5em;
            color: white;
            font-size: 16px;
            width: 3.5em;

        }

        .hapus {
            width: 4.5em;
            padding: 2px 10px 2px 10px;
            font-size: 16px;

            position: relative;
        }

        tbody {
            text-align: left;
        }

        .option-select {
            font-size: 12px;
        }

        .td {
            padding-right: none;
            display: flex;
            justify-content: left;
        }

        .responsive-3 {
            width: 100%;
        }

        th {
            display: none;
        }

        td {
            display: grid;
            gap: 0.5rem;
            grid-template-columns: 15ch auto;
            padding: 0.75em 1rem;
        }

        td:first-child {
            padding-top: 2rem;
        }

        td::before {
            content: attr(data-cell) "  : ";
            font-weight: bold;
        }
    }
</style>

<body class="body">
    <?php include('dasboard.php'); ?>
    <div class="app-theme-white body-tabs-shadow fixed-sidebar" class="siswa">
        <div class="ui-theme-settings">
            <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button>
        </div>
        <div class="app-main">
            <div class="app-main__outer">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Nama Guru</th>
                            <th scope="col" class="text-center">Nik</th>
                            <th scope="col" class="text-center">Gender</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($result as $row) : $no++ ?>
                            <tr>
                                <th data-cell="No" class="text-center" scope="row">
                                    <?php echo $no ?>
                                </th>
                                <td data-cell="Nama Guru" class="text-center">
                                    <?php echo $row->nama_guru; ?>
                                </td>
                                <td data-cell="Nik" class="text-center">
                                    <?php echo $row->nik; ?>
                                </td>
                                <td data-cell="Gender" class="text-center">
                                    <?php echo $row->gender; ?>
                                </td>
                                <td data-cell="Aksi" class="aksi">
                                    <a href="<?php echo base_url('admin/update_guru/') . $row->id ?>" type="button" id="PopoverCustomT-1" class="btn btn-success btn-sm edit">Edit</a>
                                    <button onclick="hapus(<?php echo $row->id ?>)" type="button" id="PopoverCustomT-1" class="btn btn-danger btn-sm hapus">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <a href="<?php echo base_url('admin/tambah_guru/')?>" type="button" id="PopoverCustomT-1" class="btn btn-success btn-sm edit">create</a>
            </div>
        </div>
    </div>
    <script>
        function hapus(id) {
            var yes = confirm('Yakin di hapus?');
            if (yes == true) {
                window.location.href = "<?php echo base_url('admin/hapus_guru/') ?>" + id
            }
        }
    </script>
</body>

</html>