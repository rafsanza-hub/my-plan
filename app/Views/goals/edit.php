<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Goal /</span> Edit Goal</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Target <?= ucfirst($goal['name'])?></h5>
            </div>
            <div class="card-body">
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= session()->getFlashdata('error') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= site_url('goal/update/' . $goal['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Target</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?= esc($goal['name']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="target_amount" class="form-label">Jumlah Target</label>
                        <input type="number" class="form-control" id="target_amount" name="target_amount" value="<?= esc($goal['target_amount']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="due_date" class="form-label">Tanggal Jatuh Tempo</label>
                        <input type="date" class="form-control" id="due_date" name="due_date" value="<?= esc($goal['due_date']) ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
