<form action="/sanfix/pages/presupuesto.php" method="POST" target="">
  <div>
    <div class="row mt-2">
      <div class="col-6">
        <h1 class="fs-5 mb-1 mt-3"><i class="bi bi-tools me-3"></i>Mano de obra</h1>
      </div>
      <div class="col-6">
        <h1 class="fs-5 mb-1 mt-3"><i class="bi bi-truck me-3"></i> Envío - <span class="text-primary">Proveedor</span></h1>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-2 ">
        <p class="form-control form-form-control-lg bg-dark text-light text-center fw-bold fs-5">$</p>
      </div>
      <div class="col-4">
        <input class="form-control form-control-lg" type="number" name="mano_obra" id="mano_obra">
      </div>
      <div class="col-2 ">
        <p class="form-control form-form-control-lg bg-dark text-light text-center fw-bold fs-5">$</p>
      </div>
      <div class="col-4">
        <input class="form-control form-control-lg" type="number" name="envio_proveedor" id="envio_proveedor">
      </div>
    </div>
  </div>

  <div>
    <div class="row mt-2">
      <div class="col-6">
        <h1 class="fs-5 mb-1 mt-3"><i class="bi bi-phone me-3"></i> Repuesto - <span class="text-primary">Mercadolibre</span></h1>
      </div>
      <div class="col-6">
        <h1 class="fs-5 mb-1 mt-3"><i class="bi bi-phone me-3"></i> Repuesto - <span class="text-primary">Proveedor</span></h1>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-2 ">
        <p class="form-control form-form-control-lg bg-dark text-light text-center fw-bold fs-5">$</p>
      </div>
      <div class="col-4">
        <input class="form-control form-control-lg" type="number" name="rep_mla" id="rep_mla">
      </div>
      <div class="col-2 ">
        <p class="form-control form-form-control-lg bg-dark text-light text-center fw-bold fs-5">$</p>
      </div>
      <div class="col-4">
        <input class="form-control form-control-lg" type="number" name="rep_proveedor" id="rep_proveedor">
      </div>
    </div>
  </div>

  <div>
    <div class="row mt-2">
      <div class="col-12">
        <h1 class="fs-5 mb-1 mt-3"><i class="bi bi-truck me-3"></i> Proveedor / Tienda</h1>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <input class="form-control form-control-lg" type="text" name="proveedor_nombre" id="proveedor_nombre">
      </div>
    </div>
  </div>
  <button class="btn btn-success d-flex justify-content-center w-100 mt-3" type="submit">Generar presupuesto</button>
</form>