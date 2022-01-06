<main class="contenedor seccion contenido-centrado">
        <h1 data-cy="titulo-propiedad" ><?php echo $propiedad->titulo; ?></h1>

      
            <img loading="lazy" src="imagenes/<?php echo $propiedad->imagen; ?>" alt="Imagen Anuncio"> 
   

        <div class="resumen-propiedad">
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
            <p><?php echo $propiedad->descripcion; ?></p>
              
        </div>

</main>