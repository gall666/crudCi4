<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <!-- CONTAINER -->

    <div class="container">
        <!-- CARD -->

        <div class="row">

            <div class="col-md-12 col-sm-12 mb-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Pengguna</h3>
                    </div>

                    <div class="card-body">
                        <!-- LOKASI TEXT PENCARIAN -->
                        <form action="" method="get">

                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Input kata kunci" aria-label="Input kata kunci" aria-describedby="button-addon2" value="<?php echo $katakunci; ?>" name="katakunci">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">cari</button>
                            </div>
                        </form>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            + Tambah Data Pengguna
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" style="display: none" ;>
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Pengguna</h1>
                                        <button type="button" class="btn-close tombol-tutup" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- ALERT KALAU SUKSES -->
                                        <div class="alert alert-success sukses" role="alert" style="display: none;">
                                        </div>
                                        <!-- ALERT KALAU ERROR -->
                                        <div class="alert alert-danger error" role="alert" style="display: none;">
                                        </div>
                                        <!-- FORM INPUT DATA -->
                                        <input type="hidden" id="inputId">
                                        <div class="mb-3">
                                            <label for="inputNama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="inputNama" placeholder="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputEmail" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="inputEmail" placeholder="name@example.com">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="inputPassword">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputBagian" class="form-label">Bagian</label>
                                            <select class="form-select" id="inputBagian">
                                                <option value="kanit">Kanit</option>
                                                <option value="kadiv">Kadiv</option>
                                                <option value="bahan baku">Bahan Baku</option>
                                                <option value="pembentukan">Pembentukan</option>
                                                <option value="glasir">Glasir</option>
                                                <option value="pengontrolan">Pengontrolan</option>
                                                <option value="oven">Oven</option>
                                                <option value="pembakaran">Pembakaran</option>
                                                <option value="dekorasi">Dekorasi</option>
                                                <option value="sanggar">Sanggar</option>
                                                <option value="perawatan">Perawatan</option>
                                                <option value="qc">QC</option>
                                                <option value="laborat">Laborat</option>
                                                <option value="keuangan">Keuangan</option>
                                                <option value="gudang">Gudang</option>
                                                <option value="it">IT</option>
                                                <option value="psdm">PSDM</option>
                                                <option value="tata usaha">Tata Usaha</option>
                                                <option value="umum">Umum</option>
                                                <option value="ppc">PPC</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary tombol-tutup" data-bs-dismiss="modal">Tutup</button>
                                        <button type="button" class="btn btn-primary" id="tbSimpanPgn">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <!-- TABEL PENGGUNA -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Password</th>
                                        <th scope="col">Bagian</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">
                                    <?php
                                    foreach ($dataPengguna as $k => $v) {
                                        $nomor = $nomor + 1;
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $nomor; ?></th>
                                            <td><?php echo $v['nama'] ?></td>
                                            <td><?php echo $v['email'] ?></td>
                                            <td><?php echo $v['password'] ?></td>
                                            <td><?php echo $v['bagian'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop" onclick="edit(<?php echo $v['id'] ?>);">Edit</button>
                                                <button type="button" class="btn btn-danger  btn-sm" onclick="hapus(<?php echo $v['id'] ?>);">Hapus</button>
                                            </td>
                                        </tr>
                                    <?php }  ?>
                                </tbody>
                            </table>

                            <?php
                            $linkPagination = $pager->links();
                            $linkPagination = str_replace('<li class="active">', '<li class="page-item active">', $linkPagination);
                            $linkPagination = str_replace('<li>', '<li class="page-item">', $linkPagination);
                            $linkPagination = str_replace("<a", "<a class='page-link'", $linkPagination);

                            echo $linkPagination;
                            ?>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    <!-- JAVASCRIPT -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <script>
        function hapus($id) {
            var result = confirm("Yakin mau melakukan proses delete");
            if (result) {
                window.location = "pengguna/hapus/" + $id;
            }
        }

        function edit($id) {
            $.ajax({
                url: "pengguna/edit/" + $id,
                type: "GET",
                success: function(hasil) {
                    // alert(hasil);

                    var $obj = $.parseJSON(hasil);
                    if ($obj.id != '') {
                        $('#inputId').val($obj.id);
                        $('#inputNama').val($obj.nama);
                        $('#inputEmail').val($obj.email);
                        $('#inputPassword').val($obj.password);
                        $('#inputBagian').val($obj.$bagian);

                    }
                }
            });
        }

        function bersihkan() {
            $('#inputId').val('');
            $('#inputNama').val('');
            $('#inputEmail').val('');
            $('#inputPassword').val('');

        }

        $('.tombol-tutup').on('click', function() {
            if ($('sukses').is(":visible")) {
                window.location.href = "<?php echo current_url() . "?" . $_SERVER['QUERY_STRING'] ?>";
            }
            $('.alert').hide();
            bersihkan();
        })

        $('#tbSimpanPgn').on('click', function() {

            var $id = $('#inputId').val();
            var $nama = $('#inputNama').val();
            var $email = $('#inputEmail').val();
            var $password = $('#inputPassword').val();
            var $bagian = $('#inputBagian').val();

            $.ajax({
                url: "pengguna/simpan",
                type: "POST",
                data: {
                    id: $id,
                    nama: $nama,
                    email: $email,
                    password: $password,
                    bagian: $bagian
                },

                success: function(hasil) {
                    var $obj = $.parseJSON(hasil);
                    if ($obj.sukses == false) {
                        $('.sukses').hide();
                        $('.error').show();
                        $('.error').html($obj.error);

                    } else {
                        $('.error').hide();
                        $('.sukses').show();
                        $('.sukses').html($obj.sukses);
                    }
                },
                error: function() {
                    alert('error');
                }
            });

            bersihkan();

        });
    </script>
</body>

</html>