<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Cliente <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Nuevo Cliente</h1>
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

    <form action="<?= base_url(route_to('customersSave')) ?>" class="border p-3 form" method="POST">

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= old('name') ?>">
                <p class="text-danger"><?= session('errors.name') ?></p>
            </div>
            <div class="form-group">
                <label for="surname">Apellido</label>
                <input type="text" name="surname" id="surname" class="form-control" value="<?= old('surname') ?>">
                <p class="text-danger"><?= session('errors.surname') ?></p>
            </div>
            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= old('email') ?>">
                <p class="text-danger"><?= session('errors.email') ?></p>
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control">
                <p class="text-danger"><?= session('errors.password') ?></p>
            </div>
            <div class="form-group">
                <label for="c-password">Repite tu Contraseña</label>
                <input type="password" name="c-password" id="c-password" class=" form-control">
            </div>


            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>

    </p>

  </div>

</div>


<?= $this->endSection() ?>