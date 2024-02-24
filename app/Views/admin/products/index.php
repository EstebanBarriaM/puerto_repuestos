<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Productos <?= $this->endSection() ?>

<?= $this->section('content') ?> 
   <!-- Content Header (Page header) -->
   <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Productos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                        <a href="<?= base_url(route_to('productsCreate'))?>" class="btn btn-primary">
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
            <!-- row de opciones de busqueda -->
            
            <div class="row">
                <div class="col-lg-12">                 
                    <table id="table" class="table table-striped w-100 shadow">
                        <thead>
                            <tr>
                                <th> IMAGEN </th>
                                <th> CATEGORIA </th>
                                <th> NOMBRE </th>
                                <th> PRECIO </th>
                                <th> STOCK </th>
                                <th> AGREGADO EL </th>
                                <th class="text text-center"> ACCIONES </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($products as $key) : ?>
                                <tr>
                                    <td><img src="<?= base_url('uploads/products/' . $key->image) ?>" class="img-fluid img-rounded" style="width: 100px;" alt="<?= $key->name ?>"></td>
                                    <td> <?= $key->category_name ?> </td>
                                    <td> <?= $key->name ?> </td>
                                    <td> <?= $key->price ?> </td>
                                    <td> <?= $key->stock ?> </td>
                                    <td> <?= date("d-m-Y", strtotime($key->created_at)) ?> </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="<?= base_url(route_to('productsEdit', $key->id)) ?>"><i class="fas fa-edit"></i></a>

                                        <a class="btn btn-sm btn-danger" href="<?= base_url(route_to('productsDelete', $key->id)) ?>" onclick="return confirm('Realmente quiere eliminar el registro?')"><i class="fas fa-trash"></i></a>
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
  $(function () {
    $("#table").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#table_wrapper .col-md-6:eq(0)');
  });
</script>

<?= $this->endSection() ?>

