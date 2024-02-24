<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-12" style="margin-top: 60px; margin-bottom: 60px;">
          <div class="alert alert-success">
            <h3 style="text-align: center; margin-top: 30px;"><i class="fa fa-check"></i> Pago realizado con exito!</h3>
            <h5 style="text-align: center; margin-top: 30px; margin-bottom: 30px;">Puede ver el detalle de su compra en el siguiente <a href="#">enlace</a> o ingresando a seccion <a href="#">Mi Cuenta</a>.</h5>
          </div>
        </div>
      </div>
    </div>
  </div>
<?= $this->endSection() ?>