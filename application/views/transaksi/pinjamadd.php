        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
            <div class="card">

                <div class="card-body ">
                    <?= $this->session->flashdata('message'); ?>
                    <form method="post" action="<?= base_url('transaksi/pinjamadd'); ?>">
                        <div class="form-row">
                            <div class="col">
                                <b><label for="nama_peminjam">Nama Peminjam</label></b>
                                <select class="form-control" id="nama_peminjam" name="nama_peminjam">
                                    <option>Pilih Peminjam</option>
                                    <?php foreach ($peminjam as $p) : ?>
                                        <option value="<?= $p['id']; ?>"><?= $p['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nama_peminjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="col">
                                <b><label for="nama_buku">Nama Buku</label></b>
                                <select class="form-control" id="nama_buku" name="nama_buku">
                                    <option>Pilih Buku </option>
                                    <?php foreach ($buku as $b) : ?>
                                        <option value="<?= $b['id']; ?>"><?= $b['nama_buku']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('nama_peminjam', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col">
                                <b><label for="pengarang">Nama Pengarang</label></b>
                                <input type="text" class="form-control" placeholder="Pengarang" id="pengarang" name="pengarang" value="<?= set_value('pengarang'); ?>">
                                <?= form_error('pengarang', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="col">
                                <b><label for="penerbit">Nama Penerbit</label></b>
                                <input type="text" class="form-control" placeholder="Penerbit" id="penerbit" name="penerbit" value="<?= set_value('penerbit'); ?>">
                                <?= form_error('penerbit', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-6">
                                <b><label for="tahun">Tahun Terbit</label></b>
                                <input type="text" class="form-control" placeholder="Tahun" id="tahun" name="tahun" value="<?= set_value('tahun'); ?>">
                                <?= form_error('tahun', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                            <div class="col">
                                <b><label for="status">Status Buku</label></b>
                                <select class="form-control" id="status" name="status">
                                    <option>Status</option>
                                    <option value="Ada">Ada</option>
                                    <option value="Kosong">Kosong</option>
                                </select>
                                <?= form_error('status', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div><br>
                        <div class="form-row">
                            <div class="col-lg-6">
                                <b><label for="keterangan">Keterangan</label></b>
                                <select class="form-control" id="ket" name="ket">
                                    <option>Pilih Keterangan</option>
                                    <option value="Sumbangan">Sumbangan</option>
                                    <option value="Pembelian">Pembelian</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                <?= form_error('ket', '<small class="text-danger pl-3">', '</small>'); ?>

                            </div>
                        </div>
                </div>
            </div>
            <br>

            <div class="text-right">
                <button type="submit" class="btn btn-sm btn-success btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-user-edit"></i></span>
                    <span class="btn-inner--text">Tambah Buku</span>
                </button>
                <a href=" <?= base_url('buku') ?>" class="btn btn-sm btn-danger btn-round btn-icon" data-toggle="tooltip" data-original-title="Tambah Data">
                    <span class="btn-inner--icon"><i class="fas fa-reply"></i></span>
                    <span class="btn-inner--text">Kembali</span>
                </a>
            </div>

            </form>
        </div>



        <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->