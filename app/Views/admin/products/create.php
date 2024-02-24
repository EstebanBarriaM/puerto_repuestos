<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Productos <?= $this->endSection() ?>

<?= $this->section('css') ?>
<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Nuevo Producto</h1>
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


    <form action="<?= base_url(route_to('productsSave')) ?>" method="post" enctype="multipart/form-data">

      <div class="form-group">
        <label for="images">Imagenes</label>
        <input type="file" id="images" name="images[]" multiple>
        <p class="text-danger">
          <?= session('errors.images') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" class="form-control">
          <?php foreach ($categories as $key) : ?>
            <option value="<?= $key->id ?>" <?= ($key->id == old('category_id')) ? 'selected' : '' ?>>
            <?= $key->name ?>
            </option>
          <?php endforeach; ?>
        </select>
        <p class="text-danger">
          <?= session('errors.category_id') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="name">Nombre Producto</label>
        <input class="form-control" value="<?= old('name') ?>" type="text" name="name" placeholder="Ingrese nombre">
        <p class="text-danger">
          <?= session('errors.name') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?= old('description') ?></textarea>
        <p class="text-danger">
          <?= session('errors.description') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="price">Precio</label>
        <input class="form-control" value="<?= old('price') ?>" type="number" name="price" id="price" placeholder="Ingrese precio">
        <p class="text-danger">
          <?= session('errors.price') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="quantity">Cantidad</label>
        <input class="form-control" value="<?= old('quantity') ?>" type="number" name="quantity" id="quantity" placeholder="Ingrese cantidad">
        <p class="text-danger">
          <?= session('errors.quantity') ?>
        </p>
      </div>




      <button class="btn btn-success" type="submit">Guardar</button>

    </form>




    </p>

  </div>

</div>


<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/piexif.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/sortable.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/themes/fa5/theme.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/es.js"></script>
<script>
  $(function() {
    $('#images').fileinput({
      language: 'es',
      showUpload: false,
      showRemove: false,
      allowedFileExtensions: ['jpg']
    });
  });
</script>




<?= $this->endSection() ?>