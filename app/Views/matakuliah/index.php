<?= $this->extend('layout/app') ?>
<?= $this->section('content') ?>

<h4 class="mb-3">Data Mata Kuliah</h4>

<a href="/matakuliah/tambah" class="btn btn-primary mb-3">
    <i class="fa fa-plus"></i> Tambah Mata Kuliah
</a>

<div class="card shadow-sm">
    <div class="card-body">
        <table class="table table-bordered table-striped" id="tableMK">
            <thead class="table-dark">
                <tr>
                    <th>Kode</th>
                    <th>Nama Mata Kuliah</th>
                    <th>SKS</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($list as $r): ?>
                <tr>
                    <td><?= esc($r['kode']) ?></td>
                    <td><?= esc($r['nama_mk']) ?></td>
                    <td><?= esc($r['sks']) ?></td>
                    <td>
                        <a href="/matakuliah/edit/<?= $r['id'] ?>" class="btn btn-sm btn-warning">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="/matakuliah/hapus/<?= $r['id'] ?>"
                           class="btn btn-sm btn-danger"
                           onclick="return confirm('Hapus mata kuliah ini?')">
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
    $('#tableMK').DataTable();
</script>
<?= $this->endSection() ?>
