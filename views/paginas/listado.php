<div class="contenedor-anuncios">
         
        <?php foreach ( $propiedades as $propiedad ) : ?>      

            <div class="anuncio" data-cy="anuncio">

                   <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Anuncio">
             

               <div class="contenido-anuncio">
                   <h3><?php echo $propiedad->titulo; ?></h3>
                   <p><?php echo limitar_cadena($propiedad->descripcion , 50, '...') ?></p>
                   <p class="precio">$<?php echo $propiedad->precio; ?></p>
                   <ul class="iconos-caracteristicas">
                       <li>
                           <img class="icono" src="build/img/icono_wc.svg" alt="Icono wc">
                           <p><?php echo $propiedad->wc; ?></p>
                       </li>
                       <li>
                        <img class="icono" src="build/img/icono_estacionamiento.svg" alt="Icono estacionamiento">
                        <p><?php echo $propiedad->estacionamiento; ?></p>
                    </li>
                    <li>
                        <img class="icono" src="build/img/icono_dormitorio.svg" alt="Icono dormitorio">
                        <p><?php echo $propiedad->habitaciones; ?></p>
                    </li>
                   </ul>

                   <a data-cy="enlace-propiedad" href="/propiedad?id=<?php echo $propiedad->id; ?>" class="boton-amarillo-block">Ver Propiedad</a>

               </div> <!--.contenido-anuncio -->

            </div> <!--.anuncio -->
        <?php endforeach; ?>

</div> <!--.contenedor-anuncios-->