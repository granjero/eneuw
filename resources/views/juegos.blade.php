   <div class="accordion-item">
      <h2 class="accordion-header" id="juegos">
         <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJuegos"
            aria-expanded="false" aria-controls="collapseJuegos">
            <figure>
               <blockquote class="blockquote">
                  <p>
                     "Los juegos son la forma más elevada de la investigación."
                  </p>
               </blockquote>
               <figcaption class="blockquote-footer">
                  <cite title="Source Title">Albert Einstein</cite>
               </figcaption>
            </figure>
         </button>
      </h2>
      <div id="collapseJuegos" class="accordion-collapse collapse" aria-labelledby="juegos" data-bs-parent="#accordion">
         <div class="accordion-body">
         <p class="my-2">Acá hay un poco de programación, un poco de dev-ops, un poco de sysadmin...</p>
            <div class="list-group">
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                       Por Una Casilla 
                     </h5>
                     <small>2020</small>
                  </div>
                  <p class="mb-2">
                  Este juego fue progrmado durante el 1er aislamiento de la pandemia de COVID-19. 
                  Es la digitalización de un juego de mesa que jugaba con amigos.
                  </p>
                  <small>Esta fue mi primera aproximación a JavaScript, <br>así que el código es medio raro. 
                  <br>En el repositorio no está la lógica de la DB. ¯\_(ツ)_/¯ </small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <a class="btn btn-outline-secondary" href="https://porunacasilla.com.ar" target="_blank" role="button">Jugar</a>
                     </p>
                  </div>
               </div>
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                        Day of Defeat: Source
                     </h5>
                     <small>2020</small>
                  </div>
                  <p class="mb-2">
                  También por la pandemia jugamos Day Of Defeat. 
                  Como éramos malísimos instalé un server para que juguemos en privado sin ser humillados.
                  </p>
                  <small class="mt-4">Lo más complejo fue instalar los bots de <a href="http://rcbot.bots-united.com/" target="_blank">RCBOT </a></small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalEstacionDePoder">
                           + Info 
                        </button>
                     </p>
                  </div>
               </div>
               <div class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                     <h5 class="mb-1">
                        Fuerza Canejo!!!
                     </h5>
                     <small>2016</small>
                  </div>
                  <p class="mb-1">
                  Juego de fuerza física donde se debe presionar un émbolo que mide la presión generada y así
                  intentar obtener el puntaje máximo.
                  El aparato fue fabricado con tapas de caño de pvc para desagote. 
                  La lógica la manejaba un arduino conectado a un sensor de presión BMP085 y un reloj RTC para usarle
                  la memoria para los records. Como display se usaba la terminal serie de una netbook.
                  </p>
                  <small class="mt-4"> Fuerza Canejo fue un Trabajo Práctico de la Tecnicaruta Superior en Robótica que hice." .</small>
                  <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                     <p class="mb-1">
                        <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCodigoFuerzaCanejo">
                            Código
                        </button>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
    <!-- Modal Estacion de Poder -->
    <div class="modal fade" id="modalEstacionDePoder" tabindex="-1" aria-labelledby="modalEstacionDePoder" aria-hidden="true">
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
    <div class="modal fade" id="modalCodigoFuerzaCanejo" tabindex="-1" aria-labelledby="modalCodigoFuerzaCanejo" aria-hidden="true">
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
