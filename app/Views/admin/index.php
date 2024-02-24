<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Principal <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Principal</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3><?= $customersCount ?></h3>

            <p>Clientes totales</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $productsCount ?></h3>

            <p>Productos en sistema</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>12</h3>
            <p>Compras</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
        </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Ultimas ventas</h3>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th> # </th>
                  <th>CLIENTE</th>
                  <th> METODO PAGO </th>
                  <th> TOTAL </th>
                  <th> ESTADO </th>
                  <th> FECHA COMPRA </th>
                  <th class="text text-center"> DETALLE </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>25</td>
                  <td>Persona 1</td>
                  <td>DEBITO</td>
                  <td>$72.000</td>
                  <td><span class="badge badge-success">PAGADO</span></td>
                  <td>25-07-2022</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#orderModal">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>

                <tr>
                  <td>26</td>
                  <td>Persona 2</td>
                  <td>CREDITO</td>
                  <td>$140.000</td>
                  <td><span class="badge badge-danger">RECHAZADO</span></td>
                  <td>21-07-2022</td>
                  <td>
                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#orderModal">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>