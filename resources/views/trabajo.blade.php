   <div class="accordion-item">
    @if ($errors->has('oracion'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle"></i> <strong>Error</strong> en el cadáver! Intente nuevamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
      <h2 class="accordion-header" id="trabajo">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTrabajo"
            aria-expanded="false" aria-controls="collapseTrabajo">
            <figure>
               <blockquote class="blockquote">
                  <p>
                  "Mira si será malo el trabajo, que deben pagarte para que lo hagas."
                  </p>
               </blockquote>
               <figcaption class="blockquote-footer">
                  <cite title="Source Title">Facundo Cabral</cite>
               </figcaption>
            </figure>
         </button>
      </h2>
      <div id="collapseTrabajo" class="accordion-collapse collapse" aria-labelledby="trabajo" data-bs-parent="#accordion">
         <div class="accordion-body">
            <div class="list-group">
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                     API de Google
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
                     <p class="my-2">
                            <a class="btn btn-outline-secondary" data-bs-toggle="collapse" href="#collapseCadaver" role="button" aria-expanded="false" aria-controls="collapseCadaver">
                            Participar
                            </a>
                            </p>
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
                     <h5 class="mb-1">
                     Precios del Mercado de Granos.
                     </h5>
                     <small>2020</small>
                  </div>
                  <p class="mb-2">
                  Necesitaban cargar las corizaciones de los granos en los diferentes puertos.
                  Sólo la Cámara Arbitral de la Bolsa de Cereales de Bs As tiene API para consultar los precios. 
                  Las Cámaras de Bahía Blanca y Rosario no. Hice un script para escrapearlas directo de las paginas
                  las cámaras.
                  </p>
                     <small>En la empresa los precios iban a parar a una base de datos acá hice unas tablas para verlos.</small>
                     <p class="my-2">
                     <a href="preciosDelMercadoDeGranos" class="btn btn-outline-secondary">Ver Precios</a>
                            </p>
               </div>
            </div>
         </div>
      </div>
   </div>
    <!-- Modal fuerzaCanejo -->
    <div class="modal fade" id="modalCodigoFuerzaCanejo" tabindex="-1" aria-labelledby="modalCodigoFuerzaCanejo" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Estación de Poder.</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <p>La estación de poder se encendía a las 22hs. Todavía se enciende cada tanto.</p>
          <p>El server lo instalé con linuxGSM. Le puse también varios plugins de AlliedMods. Un Medic, Informacion sobre daño. Etc.</p>
          <pre><code>dodsserver@ath ~
🕹  $ ./dodsserver st
[  OK  ] Starting dodsserver: Estacion De Poder »» 22hs UTC -3 «« || »» 01hs UTC ««
dodsserver@ath ~
🕹  $ ./dodsserver dt

Distro Details
=================================
Distro:    Ubuntu 20.04.3 LTS
Arch:      x86_64
Kernel:    5.11.0-41-generic
Hostname:  ath
Uptime:    0d, 20h, 25m
tmux:      tmux 3.0a
glibc:     2.31

Server Resource
=================================
CPU         
Model:      Intel(R) Core(TM) i5 CPU         760  @ 2.80GHz
Cores:      4
Frequency:  1275.083MHz
Avg Load:   0,20, 0,06, 0,02

Memory     
Mem:       total  used   free   cached  available
Physical:  7,8GB  1,5GB  6,0GB  2,7GB   6,0GB
Swap:      2,0GB  0B     2,0GB

Storage
Filesystem:  /dev/sda5
Total:       219G
Used:        138G
Available:   71G

Network
IP:           0.0.0.0
Internet IP:  181.47.108.180

Game Server Resource Usage
=================================
CPU Used:  14%
Mem Used:  1%   134MB

Storage
Total:        3,8G
Serverfiles:  3,4G

Day of Defeat: Source Server Details
=================================
Server name:      Estacion De Poder »» 22hs UTC -3 «« || »» 01hs UTC ««
App ID:           232290
Server IP:        0.0.0.0:27015
Internet IP:      xxx.xxx.xxx.xxx:27015
Server password:  sopa
RCON password:    clave_secreta
Maxplayers:       16
Default map:      dod_flash
Master server:    listed
Status:           ONLINE

dodsserver Script Details
=================================
Script name:            dodsserver
LinuxGSM version:       v21.1.3
glibc required:         2.14
Discord alert:          off
Email alert:            off
IFTTT alert:            off
Mailgun (email) alert:  off
Pushbullet alert:       off
Pushover alert:         off
Rocketchat alert:       off
Slack alert:            off
Telegram alert:         off
Update on start:        off
User:                   dodsserver
Location:               /home/dodsserver
Config file:            /home/dodsserver/serverfiles/dod/cfg/dodsserver.cfg

Backups
=================================
No Backups created

Command-line Parameters
=================================
 ./srcds_run -game dod -strictportbind -ip 0.0.0.0 -port 27015 +clientport 27005 +tv_port 27020 +map dod_flash +servercfgfile dodsserver.cfg -maxplayers 16

Ports
=================================
Change ports by editing the parameters in:
/home/dodsserver/lgsm/config-lgsm/dodsserver

Useful port diagnostic command:
netstat -atunp | grep srcds_linux

DESCRIPTION  DIRECTION  PORT   PROTOCOL
> Game/RCON  INBOUND    27015  tcp/udp
> SourceTV   INBOUND    27020  udp
< Client     OUTBOUND   27005  udp

Status:	ONLINE

dodsserver@ath ~
🕹  $ 


          </code></pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal DoD -->
    <div class="modal fade" id="modalDoD" tabindex="-1" aria-labelledby="modalDoD" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Fuerza Canejo!!!</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <h5>Codigo escrito hace muchos años.</h5>
          <pre><code class="language-c">{{ $codigo['fuerzaCanejo'] }}</code></pre>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
