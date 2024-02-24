<?= $this->extend('admin/layout/main') ?>

<?= $this->section('title') ?> Compras <?= $this->endSection() ?>

<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Compras</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <div class="float-sm-right">
          <a href="#" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nueva compra
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
              <td>LEONARDO FARKAS</td>
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
              <td>ADOLF HITLER</td>
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

<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DETALLE COMPRA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="table" class="table table-striped w-100 shadow">
          <thead>
            <tr>
              <th> PRODUCTO </th>
              <th> PRECIO </th>
              <th> CANTIDAD </th>
            </tr>
          </thead>

          <tbody>
          <tr>
              <td>LLANTAS NISSAN</td>
              <td>$30.000</td>
              <td>3</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
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