<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Categorias <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Nueva Categoria</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<div class="card">



  <div class="card-body">

    <?php if (session('msg')) { ?>
      <div class="alert alert-danger" role="alert">
        <?php echo session('msg.body') ?>
      </div>
    <?php } ?>

    <p class="content">

    <form action="<?= base_url(route_to('categoriesSave')) ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="name">Nombre Categoria</label>
        <input class="form-control" value="<?= old('name') ?>" type="text" name="name" placeholder="Ingrese nombre">
        <p class="text-danger">
          <?= session('errors.name') ?>
        </p>
      </div>
      <div class="form-group">
        <label for="image">Imagen</label>
        <input class="form-control-file" type="file" id="image" name="image">
        <p class="text-danger">
          <?= session('errors.image') ?>
        </p>
      </div>
      <button class="btn btn-success" type="submit">Guardar</button>

    </form>

    </p>

  </div>

</div>


<?= $this->endSection() ?>