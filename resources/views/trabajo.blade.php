<div class="accordion-item">
    @if ($errors->has('oracion'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-triangle"></i> <strong>Error</strong> en el cadáver! Intente nuevamente.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <h2 class="accordion-header" id="trabajo">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTrabajo" aria-expanded="false" aria-controls="collapseTrabajo">
        <figure>
            <blockquote class="blockquote">
                <p> "Mira si será malo el trabajo, que deben pagarte para que lo hagas." </p>
            </blockquote>
            <figcaption class="blockquote-footer">
                <cite title="Source Title">Facundo Cabral</cite>
            </figcaption>
        </figure>
    </button>
    </h2>
    <div id="collapseTrabajo" class="accordion-collapse collapse" aria-labelledby="trabajo" data-bs-parent="#accordion">
        <div class="accordion-body">
            <h6 class="my-1"> La gran mayoría de lo que sigue lo hice para la empresa que trabajo.  </h6>
            <div class="list-group">
                <div class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                        Uso de la API de Google
                        </h5>
                        <small>2022</small>
                    </div>
                    <p class="mb-2">
                        Necesitaban actualizar automáticamente una hoja de cálculo que compratían en la cuenta de google. 
                        <br>Hice un script que se ejecutaba con cron y consultaba la base de datos. 
                        <br>Con el resultado de esa consulta se actualizaba el documento con la API de google. 
                        <br>Acá hice un cadaver exquisito, me pareció más divertido.
                        <br>Para participar tenés que escribir una oración que empiece con la palabra que ya vas a ver escrita. 
                    </p>
                    <small> <a href="https://es.wikipedia.org/wiki/Cad%C3%A1ver_exquisito" target="_blank">¿Qué es un Cadaver Exquisito?</a> </small>
                    <p class="my-2"> <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseCadaver" role="button" aria-expanded="false" aria-controls="collapseCadaver"> Participar </a> </p>
                    <div class="collapse my-2" id="collapseCadaver">
                        <div class="card card-body">
                            <form action="cadaverExquisito" method="POST">
                                @csrf
                                <label class="sr-only" for="inlineFormInputGroup">...</label>
                                <div class="input-group mb-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">{{ $cadaver["ultimaPalabra"] }}</div>
                                    </div>
                                    <input type="text" class="form-control" name="oracion" id="oracion" value="{{ old('oracion') }}"  placeholder="...">
                                </div>
                            <button type="submit" class="btn btn-primary mb-2">Enviar mi oración y ver el cadáver</button>
                            </form>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    </div>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"> PDFs  </h5>
                        <small>2021</small>
                    </div>
                    <p class="mb-2">
                        En la empresa necesitaban generar muchos documentos en PDF para comprartir con otros empleados o clientes.
                        También trabajar con PDFs codificados en Base64 provenientes de la API de la AFIP.
                        Las facturación de la empresa y diversos comprobantes.
                    </p>
                    <small>Acá hice popurrí de PDFs</small>
                    <p class="my-2"> <a href="preciosDelMercadoDeGranos" class="btn btn-outline-secondary">Ver</a> </p>
                </div>
            </div>
            <div class="list-group">
                <div class="list-group-item list-group-item-action" aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">
                        Precios del Mercado de Granos.
                        </h5>
                        <small>2020</small>
                    </div>
                    <p class="mb-2">
                        Necesitaban cargar las cotizaciones de los granos en los diferentes puertos.
                        Sólo la Cámara Arbitral de la Bolsa de Cereales de Bs As tiene API para consultarlos. 
                        Las Cámaras de Bahía Blanca y Rosario no. Hice un script para escrapear los valores directo
                        de las paginas las cámaras.
                    </p>
                    <small>En la empresa los precios iban a parar a una base de datos, acá hice unas tablas para verlos.</small>
                    <p class="my-2"> <a href="preciosDelMercadoDeGranos" class="btn btn-outline-secondary">Ver Precios</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
