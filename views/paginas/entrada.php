<main class="contenedor seccion contenido-centrado">
    
        <h1><?php echo $entrada->titulo ?></h1>  

        <img loading="lazy" src="imagenes/<?php echo $entrada->imagen; ?>" alt="Imagen Entrada"> 

        <P class="informacion-meta">Escrito el: <span><?php echo $entrada->creado ?> </span> por: <span><?php 
                foreach ( $vendedores as $vendedor ) : ?>
                <?php echo $entrada->vendedorId === $vendedor->id ? $vendedor->nombre ." " . $vendedor->apellido : ''; ?>
                <?php endforeach; ?></span></P>

        <div class="resumen-propiedad">
         
            <p><?php echo $entrada->descripcion ?></p>
                
        </div>
        

    </main>