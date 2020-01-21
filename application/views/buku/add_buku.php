        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Judul Buku" id="judul_buku" name="judul_buku">
                            </div>
                            <div class="col">
                                <select class="form-control" id="supplier" name="supplier">
                                    <option>------ Pilih Supplier ---------</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select> </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Pengarang" id="pengarang" name="pengarang">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Penerbit" id="penerbit" name="penerbit">
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-6">
                                <input type="text" class="form-control" placeholder="Tahun" id="tahun" name="tahun">
                            </div>
                            <div class="col">
                                <select class="form-control" id="status" name="status">
                                    <option value="">Status</option>
                                    <option>Ada</option>
                                    <option>Kosong</option>
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <br>

            <div class="text-right">
                <a href="#" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                    <span class="btn-inner--text">Tambah Buku</span>
                </a>
                <a href="#" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>

            </form>
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->