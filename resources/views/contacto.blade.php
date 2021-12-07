<div class="card">
    <div class="card-header">
        <h2 class="card-title my-2"><i class="fas fa-code"></i> esto no es una web</h2>
    </div>
    <div class="card-body">
        <p class="h5 my-2">Contactame por correo:
        <a class="btn btn-link" data-bs-toggle="tooltip" data-bs-placement="left" title="jm@estonoesunaweb.com.ar" href="mailto:jm@estonoesunaweb.com.ar?subject=Contacto%20esto%20no%20es%20una%20web">
        <i class="h3 fas fa-envelope"></i></a>o completando el Formulario:<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modalFormularioContacto">
        <i class="h3 fas fa-edit"></i>
        </button>
    </p>
    </div>
</div>

<div class="modal fade" id="modalFormularioContacto" tabindex="-1" aria-labelledby="modalFormularioContactoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title" id="modalFormularioContactoLabel">Formulario de Contacto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/enviarComentarios" method="POST">
                    @csrf
                    <div class="my-3">
                        <label for="nombre" class="form-label">Mi nombre es: </label>
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Cooler O'Connor">
                    </div>
                    <div class="my-3">
                        <label for="correo" class="form-label">Mi correo es: </label>
                        <input name="email" type="email" class="form-control" id="correo" placeholder="cooler@estonoesunaweb.com.ar">
                    </div>
                    <div class="my-3">
                        <label for="comentario" class="form-label">Comentarios...</label>
                        <textarea name="comentario" class="form-control" id="comentario" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
