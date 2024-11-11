<?= $this->extend('layouts/main') ?>

<?= $this->section('content') ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Budget /</span> Edit Budget</h4>

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Edit Budget <?= ucfirst($budget['category_name']) ?></h5>
            </div>
            <div class="card-body">
                <form action="<?= base_url('budget/update/' . $budget['id']) ?>" method="post">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label for="amount" class="form-label">Amount</label>
                        <input type="number" class="form-control" id="amount" name="amount" step="0.01" value="<?= esc($budget['amount']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="period" class="form-label">Period</label>
                        <select class="form-select" id="period" name="period" required>
                            <option value="monthly" <?= $budget['period'] == 'monthly' ? 'selected' : '' ?>>Monthly</option>
                            <option value="yearly" <?= $budget['period'] == 'yearly' ? 'selected' : '' ?>>Yearly</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
