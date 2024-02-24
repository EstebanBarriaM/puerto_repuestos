<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Autos <?= $this->endSection() ?>

<?= $this->section('content') ?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Modelo</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="<?= base_url(route_to('carModelsCreate')) ?>" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Agregar
                        </a>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?php if (session('message')) { ?>
                        <div class="alert alert-success" role="alert">
                            <strong><?php echo session('message') ?></strong>
                        </div>
                    <?php } ?>

                    <table id="table" class="table table-striped w-100 shadow">
                        <thead>
                            <tr>
                                <th> ID </th>
                                <th> MARCA </th>
                                <th> MODELO </th>
                                <th> CREADO </th>
                                <th class="text text-center"> ACCIONES </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($carModels as $key) : ?>
                                <tr>
                                    <th scope="row"> <?= $key->id ?> </th>
                                    <td> <?= $key->car_brand_title ?> </td>
                                    <td> <?= $key->title ?> </td>
                                    <td> <?= date("d-m-Y", strtotime($key->created_at)) ?> </td>
                                    <td class="text text-center">
                                        <a class="btn btn-sm btn-info" href="<?= base_url(route_to('carModelsEdit', $key->id)) ?>"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-sm btn-danger" href="<?= base_url(route_to('carModelsDelete', $key->id)) ?>" onclick="return confirm('Realmente quiere eliminar el registro?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>

                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
<!-- /.content -->

<?= $this->endSection() ?>

<?= $this->section('js') ?>
    <script>
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
        });
    </script>
<?= $this->endSection() ?>