<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="margin-top: 60px; margin-bottom: 60px;">
          <div class="alert alert-danger">
            <h3 style="text-align: center; margin-top: 30px;"><i class="fa fa-close"></i> Ocurrio un error con el pago!</h3>
            <h5 style="text-align: center; margin-top: 30px; margin-bottom: 30px;">Lo sentimos. Favor consultar con su banco el error ocurrido, de lo contrario, intente comprar nuevamente.</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>