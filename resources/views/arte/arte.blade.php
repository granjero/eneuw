   <div class="accordion-item">
      <h2 class="accordion-header" id="arte">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseArte"
            aria-expanded="false" aria-controls="collapseArte">
            <figure>
               <blockquote class="blockquote">
                  <p>
                     "Me gusta el arte; todo tipo de arte."
                  </p>
               </blockquote>
               <figcaption class="blockquote-footer">
                  <cite title="Source Title">Juan Sanchez</cite>
               </figcaption>
            </figure>
         </button>
      </h2>
      <div id="collapseArte" class="accordion-collpse collapse" aria-labelledby="arte" data-bs-parent="#accordion">
         <div class="accordion-body">
            <h6 class="my-1">
               Me gustaría poder decir que soy un artista y que lo que sigue es arte. Pero no sé si me animo.
            </h6>
            <p class="my-2">
               Llamaré <i>artegramas</i> a estos pequeños programas. 
               Empezaron siendo ideas en <a href="https://processing.org/">Processing</a> pero las reescribí en 
               <a href="https://p5js.org/" target="_blank">p5.js</a> para poder ponerlas acá.
               <br>
               Una de las características compartidas de estos <i>artegramas</i> es que cada generación es única e irrepetible. 
            </p>
            <div class="list-group">
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                        Obscur
                     </h5>
                     <small>2021</small>
                  </div>
                  <p class="mb-2">
                     Lineas que deciden su sentido y su largo. 
                  </p>
                  <small class="mt-4">
                  pixels sobre dispositivo <br>
                  </small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <a class="btn btn-outline-secondary" href="obscur" target="_blank" role="button">Artegrama</a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCodigoObscur">
                            Código
                        </button>
                     </p>
                  </div>
               </div>
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                        Circulos en un Círculo
                     </h5>
                     <small>2019</small>
                  </div>
                  <p class="mb-2">
                     Un humilde homenaje a W. Kandinsky.
                  </p>
                  <small class="mt-4">Inspirado en <a href="https://commons.wikimedia.org/wiki/File:Wassily_Kandinsky_Circles_in_a_Circle.jpg" target="_blank">Circles in a Circle</a>.</small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <a class="btn btn-outline-secondary" href="circulos" target="_blank" role="button">Artegrama</a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCodigoCirculos">
                            Código
                        </button>
                     </p>
                  </div>
               </div>
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                        Floralis
                     </h5>
                     <small>2019</small>
                  </div>
                  <p class="mb-1">
                  Taraxacum officinale. 
                  </p>
                  <small>O casi.</small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <a class="btn btn-outline-secondary" href="floralis" target="_blank" role="button">Artegrama</a>
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCodigoFloralis">
                            Código
                        </button>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

    <!-- Modal Obscur -->
    <div class="modal fade" id="modalCodigoObscur" tabindex="-1" aria-labelledby="modalCodigoObscur" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Obscur</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <pre><code class="language-javascript">{{ $codigo['obscur'] }}</code></pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Circulos -->
    <div class="modal fade" id="modalCodigoCirculos" tabindex="-1" aria-labelledby="modalCodigoCirculos" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Circulos en un Círculo</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <pre><code class="language-javascript">{{ $codigo['circulos'] }}</code></pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Floralis -->
    <div class="modal fade" id="modalCodigoFloralis" tabindex="-1" aria-labelledby="modalCodigoFloralis" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Floralis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <pre><code class="language-javascript">{{ $codigo['floralis'] }}</code></pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
