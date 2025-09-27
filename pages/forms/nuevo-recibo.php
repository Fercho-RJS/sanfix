<form action="/sanfix/php/pdf/recibo-dispositivo.php" method="POST" target="_blank">
  <h1 class="fs-2 fw-bold mb-3 p-3 text-light bg-dark">Datos del cliente</h1>
  <div class="row mt-2">
    <div class="col-6">
      <label class="form-label" for="cliente">Nombre completo del Cliente</label>
      <input class="form-control form-control-sm" type="text" name="cliente" id="cliente">
    </div>
    <div class="col-6">
      <label class="form-label" for="telefono">Número de teléfono</label>
      <input class="form-control form-control-sm" type="text" name="telefono" id="telefono">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-6">
      <label class="form-label" for="marca">Fabricante / Marca del dispositivo</label>
      <input class="form-control form-control-sm" type="text" name="marca" id="marca">
    </div>
    <div class="col-6">
      <label class="form-label" for="modelo">Modelo</label>
      <input class="form-control form-control-sm" type="text" name="modelo" id="modelo">
    </div>
  </div>
  <div class="row mt-2">
    <div class="col-6">
      <label class="form-label" for="imei">IMEI / ID del producto</label>
      <input class="form-control form-control-sm" type="text" name="imei" id="imei">
    </div>
    <div class="col-6">
      <label class="form-label" for="dni">D.N.I</label>
      <input class="form-control form-control-sm" type="text" name="dni" id="dni">
    </div>
  </div>

  <h1 class="mt-5 mb-3 fs-2 fw-bold p-3 text-light bg-dark">Datos del dispositivo</h1>

  <div class="row">
    <div class="col-12 mb-3">
      <h3>Descripción de entrega</h3>
      <label class="form-label text-secondary" for="descripcion">Detalle de entrega & estado en que se recibe el dispositivo.</label>
      <textarea
        class="form-control form-text"
        id="descripcion"
        name="descripcion"
        rows="3"
        maxlength="350"
        placeholder="Escriba aquí el estado del dispositivo..."></textarea>
    </div>

    <div class="col-12 mb-3">
      <h3>Accesorios & Complementos entregados</h3>
      <label class="form-label text-secondary" for="descripcion">Detalle los dispositivos o elementos adicionales que fueron entregados junto al dispositivo.</label>
      <div class="row p-2 border m-0 rounded-2">
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="cargador" id="cargador">
          <label class="ms-3" for="cargador">Cargador</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="microsd" id="microsd">
          <label class="ms-3" for="microsd">Memoria Micro SD</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="teclado" id="teclado">
          <label class="ms-3" for="teclado">Teclado</label>
        </div>

        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="btusb" id="btusb">
          <label class="ms-3" for="btusb">Antena Bluetooth USB</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="bateria" id="bateria">
          <label class="ms-3" for="bateria">Bateria</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="funda" id="funda">
          <label class="ms-3" for="funda">Funda</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="pendrive" id="pendrive">
          <label class="ms-3" for="pendrive">Pendrive</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="lectora" id="lectora">
          <label class="ms-3" for="lectora">Lectora de Discos DVD</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="simcard" id="simcard">
          <label class="ms-3" for="simcard">Tarjeta SIM</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="mouse" id="mouse">
          <label class="ms-3" for="mouse">Mouse</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="disco" id="disco">
          <label class="ms-3" for="disco">Disco de Almacenamiento SSD/HDD/NVMe o PCIe M.2</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="pila" id="pila">
          <label class="ms-3" for="pila">Pila/s</label>
        </div>
        <div class="col-auto d-flex">
          <input class="form-check" type="checkbox" name="otro" id="otro">
          <label class="ms-3" for="otro">Otro/s</label>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <h3>Información adicional</h3>
        <p class="text-secondary">Datos adicionales y notas de relevancia para el equipo y su correcto diagnóstico y reparación.</p>
      </div>
    </div>

    <div class="col-6 mb-3">
      <label class="form-label text-secondary" for="descripcion">Problema por el que se presenta el equipo</label>
      <textarea
        class="form-control w-100 form-text"
        id="descripcion"
        name="descripcion"
        rows="3"
        maxlength="350"
        placeholder="Escriba aquí..."></textarea>
    </div>
    <div class="col-6 mb-3">
      <label class="form-label text-secondary" for="descripcion">Description de la entrega & estado en que se recibe el dispositivo.</label>
      <textarea
        class="form-control w-100 form-text"
        id="descripcion"
        name="descripcion"
        rows="3"
        maxlength="350"
        placeholder="Escriba aquí..."></textarea>
    </div>
  </div>

  <h3>Seguridad</h3>
  <div class="row">
    <div class="col-4">
      <label class="form-label text-secondary" for="dni">Contraseña del dispositivo</label>
      <input class="form-control form-control-sm" type="text" name="dni" id="dni">
    </div>
    <div class="col-4">
      <label class="form-label text-secondary" for="dni">PIN</label>
      <input class="form-control form-control-sm" type="text" name="dni" id="dni">
    </div>
    <div class="col-4">
      <label class="form-label text-secondary" for="dni">Patrón</label><br>
      <a class="btn btn-sm w-100 btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#dibujar-patron">Dibujar</a>

      <!-- Dibujo del patrón -->
      <div class="modal fade" id="dibujar-patron" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content w-auto mx-auto">
            <div class="modal-header bg-dark">
              <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Diseñar patrón de seguridad</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
              <div id="patron-container">
                <div class="circle" data-id="1"></div>
                <div class="circle" data-id="2"></div>
                <div class="circle" data-id="3"></div>
                <div class="circle" data-id="4"></div>
                <div class="circle" data-id="5"></div>
                <div class="circle" data-id="6"></div>
                <div class="circle" data-id="7"></div>
                <div class="circle" data-id="8"></div>
                <div class="circle" data-id="9"></div>
                <canvas id="canvas-lineas"></canvas>
                <input type="hidden" name="imagenPatron" id="imagenPatron">
              </div>
            </div>
            <div class="modal-footer bg-dark">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-secondary" onclick="guardarPatron()">Guardar</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Estilos fuera del contenedor -->
      <style>
        #patron-container {
          position: relative;
          width: 300px;
          height: 300px;
          display: grid;
          grid-template-columns: repeat(3, 1fr);
          grid-template-rows: repeat(3, 1fr);
          gap: 20px;
          margin: 0 auto;
        }

        .circle {
          width: 60px;
          height: 60px;
          border-radius: 50%;
          background-color: #ccc;
          margin: auto;
          position: relative;
          z-index: 2;
          display: flex;
          align-items: center;
          justify-content: center;
          font-weight: bold;
          font-size: 40px;
          cursor: pointer;
        }

        #canvas-lineas {
          position: absolute;
          top: 0;
          left: 0;
          z-index: 1;
        }
      </style>

      <!-- Script -->
      <script>
        let seleccionados = [];
        let canvas, ctx;

        document.getElementById('dibujar-patron').addEventListener('shown.bs.modal', () => {
          canvas = document.getElementById('canvas-lineas');
          const container = document.getElementById('patron-container');
          canvas.width = container.offsetWidth;
          canvas.height = container.offsetHeight;
          ctx = canvas.getContext('2d');
          seleccionados = [];
          ctx.clearRect(0, 0, canvas.width, canvas.height);

          // Reset círculos
          document.querySelectorAll('.circle').forEach(c => {
            c.style.backgroundColor = '#ccc';
            c.textContent = '';
          });

          // Escuchar clics
          document.querySelectorAll('.circle').forEach(c => {
            c.onclick = () => {
              const id = c.dataset.id;
              if (!seleccionados.includes(id)) {
                seleccionados.push(id);
                actualizarColores();
                if (seleccionados.length > 1) {
                  dibujarLinea(seleccionados);
                }
              }
            };
          });
        });

        function actualizarColores() {
          seleccionados.forEach((id, index) => {
            const c = document.querySelector(`.circle[data-id="${id}"]`);
            if (index === 0) {
              c.style.backgroundColor = 'orange';
            } else if (index === seleccionados.length - 1) {
              c.style.backgroundColor = '#966c2dff';
            } else {
              c.style.backgroundColor = '#ffe4b6ff';
            }
            c.textContent = index + 1;
          });
        }

        function dibujarLinea(ids) {
          const prev = document.querySelector(`.circle[data-id="${ids[ids.length - 2]}"]`);
          const curr = document.querySelector(`.circle[data-id="${ids[ids.length - 1]}"]`);

          const rect1 = prev.getBoundingClientRect();
          const rect2 = curr.getBoundingClientRect();
          const containerRect = canvas.getBoundingClientRect();

          const x1 = rect1.left + rect1.width / 2 - containerRect.left;
          const y1 = rect1.top + rect1.height / 2 - containerRect.top;
          const x2 = rect2.left + rect2.width / 2 - containerRect.left;
          const y2 = rect2.top + rect2.height / 2 - containerRect.top;

          ctx.strokeStyle = '#000';
          ctx.lineWidth = 2;
          ctx.beginPath();
          ctx.moveTo(x1, y1);
          ctx.lineTo(x2, y2);
          ctx.stroke();
        }
      </script>

      <script>
        function guardarPatron() {
          const container = document.getElementById('patron-container');

          html2canvas(container).then(canvas => {
            const dataURL = canvas.toDataURL('image/png');
            document.getElementById('imagenPatron').value = dataURL;

            // Opcional: mostrar preview o cerrar modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('dibujar-patron'));
            modal.hide();
          });
        }
      </script>
    </div>
  </div>

  <button class="btn btn-dark mt-3" type="submit">Generar documento</button>
</form>