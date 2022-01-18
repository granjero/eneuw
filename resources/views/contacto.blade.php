<div class="card">
    <div class="card-body">
        <p class="h5 my-2"> Contactame completando el formulario:<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#modalFormularioContacto">
        <i class="h3 fas fa-edit"></i>
        </button>
    </p>
    @if ($errors->has('nombre') || $errors->has('email') || $errors->has('comentario'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <strong>Error</strong> en el formulario de correo! Intente nuevamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session('correoOK'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle"></i> {{ session('correoOK') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
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
                        @error('nombre')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                        <input name="nombre" value="{{ old('nombre') }}" type="text" class="form-control" id="nombre" placeholder="Cooler O'Connor" required>
                    </div>
                    <div class="my-3">
                        <label for="correo" class="form-label">Mi correo es: </label>
                        @error('email')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="correo" placeholder="cooler@estonoesunaweb.com.ar" required>
                    </div>
                    <div class="my-3">
                        <label for="comentario" class="form-label">Comentarios...</label>
                        @error('comentario')
                            <div class="alert alert-danger my-2">{{ $message }}</div>
                        @enderror
                        <textarea name="comentario" value="{{ old('comentario') }}" class="form-control" id="comentario" rows="3"></textarea required>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar <i class="fas fa-paper-plane"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
