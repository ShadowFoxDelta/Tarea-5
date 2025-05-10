<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Factura de Comida</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <!-- Verificar si hay resultados existentes para imprimir -->
        <?php if ($radio1): ?>
            <p>
              <strong>-Tipo de Carne:</strong> <?php echo htmlspecialchars($radio1); ?>&nbsp;&nbsp;
              <strong> Cantidad:</strong> <?php echo htmlspecialchars($cantidad1); ?>&nbsp;&nbsp;
              <strong> Precio:</strong> <?php echo htmlspecialchars($precio1); ?>
            </p>
        <?php endif; ?>

        <?php if ($radio2): ?>
            <p>
              <strong>-Tipo de Arroz:</strong> <?php echo htmlspecialchars($radio2); ?>&nbsp;&nbsp;
              <strong>Cantidad:</strong> <?php echo htmlspecialchars($cantidad2); ?>&nbsp;&nbsp;
              <strong> Precio:</strong> <?php echo htmlspecialchars($precio2); ?>
            </p>
        <?php endif; ?>
            
       <?php if ($radio3): ?>
            <p>
              <strong>-Tipo de Menestra:</strong> <?php echo htmlspecialchars($radio3); ?>&nbsp;&nbsp;
              <strong>Cantidad:</strong> <?php echo htmlspecialchars($cantidad3); ?>&nbsp;&nbsp;
              <strong> Precio:</strong> <?php echo htmlspecialchars($precio3); ?>
            </p>
        <?php endif; ?>
      
        <?php if ($radio4): ?>
            <p>
              <strong>-Tipo de Postres:</strong> <?php echo htmlspecialchars($radio4); ?>&nbsp;&nbsp;
              <strong>Cantidad:</strong> <?php echo htmlspecialchars($cantidad4); ?>&nbsp;&nbsp;
              <strong> Precio:</strong> <?php echo htmlspecialchars($precio4); ?>
            </p>
        <?php endif; ?>      

        <?php if ($resultado): ?>
            <br><br>
            <p><strong>Edad del Cliente: </strong> <?php echo htmlspecialchars($edadcliente); ?></p>
            
            <p><strong>Descuento: </strong> <?php echo htmlspecialchars($descuento); ?></p>

            <p><strong>Total a Pagar: </strong><?php echo htmlspecialchars(number_format($resultado, 2)); ?></p>
        <?php endif; ?>

      </div>
      <div class="modal-footer">
      </div>
    </div>
  </div>
</div>