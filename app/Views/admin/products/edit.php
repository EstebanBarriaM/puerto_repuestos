<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Productos <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Editar Producto</h1>
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

    <form action="<?= base_url(route_to('productsUpdate')) ?>" method="post" enctype="multipart/form-data">

      <input type="hidden" value="<?= $product['id'] ?>" name="id">
      <input type="hidden" value="<?= $inventory['id'] ?>" name="inventory_id">

      <div class="form-group">
        <label for="category_id">Categoria</label>
        <select name="category_id" id="category_id" class="form-control">
          <?php foreach ($categories as $key) : ?>
            <option value="<?= $key->id ?>" <?= ($key->id == $product['category_id']) ? 'selected' : '' ?>>
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
        <input class="form-control" value="<?= old('name', $product['name']) ?>" type="text" name="name" placeholder="Ingrese nombre">
        <p class="text-danger">
          <?= session('errors.name') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="description">Descripcion</label>
        <textarea name="description" id="description" cols="30" rows="5" class="form-control"><?= old('description', $product['description']) ?></textarea>
        <p class="text-danger">
          <?= session('errors.description') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="price">Precio</label>
        <input class="form-control" value="<?= old('price', $product['price']) ?>" type="number" name="price" id="price" placeholder="Ingrese precio">
        <p class="text-danger">
          <?= session('errors.price') ?>
        </p>
      </div>

      <div class="form-group">
        <label for="quantity">Cantidad</label>
        <input class="form-control" value="<?= old('quantity', $inventory['quantity']) ?>" type="number" name="quantity" id="quantity" placeholder="Ingrese cantidad">
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