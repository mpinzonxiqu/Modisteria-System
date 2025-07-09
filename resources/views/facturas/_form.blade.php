@csrf



<div class="card shadow-lg border-0 p-5 big-form" style="background-color:#fffaf9;border-radius:25px;">
  <h2 class="mb-5 text-center" style="color:#a866a5;font-family:'Playfair Display',serif;">
    <i class="fas fa-receipt mr-2"></i> Registro de Factura
  </h2>

  <div class="form-group">
    <label class="form-label">👩 Nombre del cliente</label>
    <input type="text" name="nombre_cliente" value="{{ old('nombre_cliente',$factura->nombre_cliente??'') }}"
           class="form-control big-input" placeholder="Ej: Laura Gómez" required>
  </div>

  <div class="form-group">
    <label class="form-label">📞 Número de contacto</label>
    <input type="text" name="numero_contacto" value="{{ old('numero_contacto',$factura->numero_contacto??'') }}"
           class="form-control big-input" placeholder="Ej: 3001234567" required>
  </div>

  <div class="form-group">
    <label class="form-label">🧵 Prenda</label>
    <input type="text" name="prenda" value="{{ old('prenda',$factura->prenda??'') }}"
           class="form-control big-input" placeholder="Ej: Vestido largo" required>
  </div>

  <div class="form-group">
    <label class="form-label">💰 Valor a pagar</label>
    <input type="number" step="0.01" name="valor_a_pagar" value="{{ old('valor_a_pagar',$factura->valor_a_pagar??'') }}"
           class="form-control big-input" placeholder="Ej: 85000" required>
  </div>

  <div class="form-group">
    <label class="form-label">📅 Fecha y hora de recibido</label>
    <input type="datetime-local" name="fecha_recibido"
           value="{{ old('fecha_recibido', isset($factura)
                ? $factura->fecha_recibido->format('Y-m-d\TH:i')
                : now()->format('Y-m-d\TH:i')) }}"
           class="form-control big-input" required>
  </div>

  <div class="form-group">
    <label class="form-label">🗓️ Fecha de entrega</label>
    <input type="date" name="fecha_entrega"
           value="{{ old('fecha_entrega', isset($factura)
                ? $factura->fecha_entrega->format('Y-m-d')
                : now()->addDays(3)->format('Y-m-d')) }}"
           class="form-control big-input" required>
  </div>

  <div class="form-group">
    <label class="form-label">📝 Observaciones</label>
    <textarea name="observaciones" rows="4"
              class="form-control big-input"
              placeholder="Detalles importantes...">{{ old('observaciones',$factura->observaciones??'') }}</textarea>
  </div>

  <div class="text-center mt-5">
    <button type="submit" class="btn btn-lg btn-block btn-pink shadow">
      <i class="fas fa-save mr-2"></i> Guardar Factura
    </button>
  </div>
</div>

{{-- ----------------- ESTILOS (se mantienen) ----------------- --}}

<style>
  .big-form{max-width:850px;margin:40px auto;}
  .form-label{font-size:1.25rem;font-weight:600;color:#7a5472;margin-bottom:.5rem;}
  .big-input{height:60px;font-size:1.2rem;padding:.75rem 1.25rem;border:2px solid #f7b5d1;border-radius:12px;background:#fffdfd;transition:.3s;}
  .big-input:focus{border-color:#d48dad;box-shadow:0 0 12px rgba(212,141,173,.4);outline:none;}
  .btn-pink{background:#f7b5d1;color:#4a3e4d;font-size:1.3rem;border-radius:35px;padding:.8rem 2rem;transition:.3s;}
  .btn-pink:hover{background:#e49bbf;transform:translateY(-2px);}

</style>
