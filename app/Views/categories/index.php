<?= $this->extend('layouts/main.php') ?>

<?= $this->section('content') ?>


<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Transaksi /</span> Kategori</h4>

        <div id="flash-message" data-message="<?= session()->getFlashdata('message') ?>"></div>

        <div class="card">
            <div class="card-header">
                <h5 >Table Basic</h5>
                <button type="button" class="btn btn-primary btn-sm float-end" data-bs-toggle="modal" data-bs-target="#smallModal">
                    Tambah Kategori
                </button>
            </div>

            <div class="card-body">
                <?php if (!empty($categories)): ?>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($categories as $category) : ?>
                                    <tr>
                                        <td><strong><?= $i++ ?></strong></td>
                                        <td id="category_<?= $category['id'] ?>"><?= $category['name'] ?></td>
                                        <td>
                                            <a href="/category/delete/<?= $category['id'] ?>" class="btn btn-danger btn-sm">
                                                Hapus
                                            </a>
                                            <button type="button" class="btn btn-warning btn-sm btnEdit"
                                                data-id="<?= $category['id'] ?>"
                                                data-name="<?= $category['name'] ?>"
                                                data-bs-toggle="modal" data-bs-target="#editModal">
                                                Edit
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <div class="alert alert-warning" role="alert">
                        Tidak ada kategori yang ditambahkan.
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<!--/ Basic Bootstrap Table -->


</div>

<div class="modal fade" id="smallModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">Tambah Kategori</h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/category/save" method="post">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="category" class="form-label">Nama Kategori</label>
                            <input type="text" id="category" name="category" class="form-control" placeholder="Enter Name" required autofocus />
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Di bagian modal -->
            <div class="modal-body">
                <?= csrf_field() ?>
                <input type="hidden" id="category_id">
                <div class="row">
                    <div class="col mb-3">
                        <label class="form-label">Nama Kategori</label>
                        <input type="text" id="category_name" class="form-control" />
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="saveEdit">Save changes</button>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    const parentData = document.querySelector('.parentData')
    const inputCategory = document.querySelector('.inputCategory')
    const btnEdit = document.querySelector('.btnEdit')
</script> -->



<script>
    $(document).ready(function() {
        $('.btnEdit').on('click', function() {
            const id = $(this).data('id');
            const name = $(this).data('name');

            $('#category_id').val(id);
            $('#category_name').val(name);
        });

        $('#saveEdit').on('click', function() {
            const id = $('#category_id').val();
            const name = $('#category_name').val();

            $.ajax({
                url: '/category/update/' + id,
                type: 'POST',
                dataType: 'json',
                data: {
                    category: name,
                    <?= csrf_token() ?>: '<?= csrf_hash() ?>'
                },
                success: function(response) {
                    if (response.status) {
                        $('#editModal').modal('hide');
                        $(`#category_${id}`).text(name);

                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Gagal mengupdate kategori'
                    });
                }
            });
        });
    });
</script>
<?= $this->endSection() ?>