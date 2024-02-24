<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Auto <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Nuevo Modelo</h1>
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

        <form action="<?= base_url(route_to('carModelsSave')) ?>" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="car_brand_id">Categoria</label>
                <select name="car_brand_id" id="car_brand_id" class="form-control">
                    <?php foreach ($carBrands as $key) : ?>
                        <option value="<?= $key->id ?>" <?= ($key->id == old('car_brand_id')) ? 'selected' : '' ?>>
                            <?= $key->title ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <p class="text-danger">
                    <?= session('errors.car_brand_id') ?>
                </p>
            </div>

            <div class="form-group">
                <label for="title">Nombre del Modelo</label>
                <input class="form-control" value="<?= old('title') ?>" type="text" name="title" id="title" placeholder="Nombre del Modelo">
                <p class="text-danger">
                    <?= session('errors.title') ?>
                </p>
            </div>

            <div class="form-group">
                <label for="code">Siglas del Modelo</label>
                <input class="form-control" value="<?= old('name') ?>" type="text" name="code" id="code" placeholder="Siglas - Abreviazion">
                <p class="text-danger">
                    <?= session('errors.code') ?>
                </p>
            </div>

            <button class="btn btn-success" type="submit">Guardar</button>

        </form>

        </p>

    </div>

</div>


<?= $this->endSection() ?>