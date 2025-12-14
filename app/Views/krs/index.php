<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Data KRS</h4>

<a href="/krs/tambah" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah KRS
</a>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-striped table-bordered" id="tableKRS">
            <thead class="table-dark">
                <tr>
                    <th>Mahasiswa</th>
                    <th>Mata Kuliah</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th width="100">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $r): ?>
                <tr>
                    <td><?= esc($r['nama_mahasiswa']) ?></td>
                    <td><?= esc($r['nama_mk']) ?></td>
                    <td><?= esc($r['tahun_akademik']) ?></td>
                    <td><?= esc($r['semester']) ?></td>
                    <td>
                        <a href="/krs/hapus/<?= $r['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus KRS ini?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
    $('#tableKRS').DataTable();
</script>
<?= $this->endSection() ?>
