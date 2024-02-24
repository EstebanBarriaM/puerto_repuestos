<?= $this->extend('front/layout/main') ?>

<?= $this->section('content') ?>
<!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col-md-7">
        <!-- Billing Details -->
        <div class="billing-details">
          <div class="section-title">
            <h3 class="title">Carro</h3>
          </div>

          <table class="table table-bordered">
            <tbody>
              <tr>
                <td style="width: 25%;">
                  <img src="https://www.repuestodo.cl/pub/media/catalog/product/cache/38c33a87ced4126ef430dbf3a98faaeb/d/_/d_854771-mlc46026180044_052021-o_vztslmicqkcwyvtw.jpg" alt="" class="img-responsive img-rounded" style="width: 120px; height: 120px;">
                </td>
                <td>
                  <p>Sensor oxigeno</p>
                  <strong>$25.000</strong>
                </td>
                <td style="width: 20%;">
                  <div class="form-group">
                    <label>Cantidad</label>
                    <select name="asd" class="form-control">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-danger" style="margin-top: 27px;"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td style="width: 25%;">
                  <img src="https://www.repuestodo.cl/pub/media/catalog/product/cache/38c33a87ced4126ef430dbf3a98faaeb/d/_/d_904486-mlc41904455877_052020-o_ftvrwxhhgeayogfi.jpg" alt="" class="img-responsive img-rounded" style="width: 120px; height: 120px;">
                </td>
                <td>
                  <p>Bomba agua</p>
                  <strong>$10.000</strong>
                </td>
                <td style="width: 20%;">
                  <div class="form-group">
                    <label>Cantidad</label>
                    <select name="asd" class="form-control">
                      <option value="1" selected>1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-danger" style="margin-top: 27px;"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
              <tr>
                <td style="width: 25%;">
                  <img src="https://www.repuestodo.cl/pub/media/catalog/product/cache/38c33a87ced4126ef430dbf3a98faaeb/a/0/a0166897-38357.jpg" alt="" class="img-responsive img-rounded" style="width: 120px; height: 120px;">
                </td>
                <td>
                  <p>Ampolleta 2C Nissan</p>
                  <strong>$2.000</strong>
                </td>
                <td style="width: 20%;">
                  <div class="form-group">
                    <label>Cantidad</label>
                    <select name="asd" class="form-control">
                      <option value="1">1</option>
                      <option value="2" selected>2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                  </div>
                </td>
                <td style="text-align: center;">
                  <button class="btn btn-sm btn-danger" style="margin-top: 27px;"><i class="fa fa-trash"></i></button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- /Billing Details -->
      </div>

      <!-- Order Details -->
      <div class="col-md-5 order-details">
        <div class="section-title text-center">
          <h3 class="title">Detalle</h3>
        </div>
        <div class="order-summary">
          <div class="order-col">
            <div><strong>TOTAL</strong></div>
            <div><strong class="order-total">$39.000</strong></div>
          </div>
        </div>
        <div class="payment-method">
          <h5 style="margin-bottom: 20px;">Metodo pago</h5>
          <div class="input-radio">
            <input type="radio" name="payment_media" id="payment_media_debit" value="Debit">
            <label for="payment_media_debit">
              <span></span>
              Debito
            </label>
          </div>
          <div class="input-radio">
            <input type="radio" name="payment_media" id="payment_media_credit" value="Credit">
            <label for="payment_media_credit">
              <span></span>
              Credito
            </label>
          </div>
        </div>
        <a href="#" class="primary-btn order-submit">Pagar</a>
      </div>
      <!-- /Order Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
<!-- /SECTION -->
<?= $this->endSection() ?>