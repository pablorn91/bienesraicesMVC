
        <h3>Nuestro Blog</h3>

    <?php foreach ( $entradas as $entrada ) : ?>

    <article class="entrada-blog">
        <div class="imagen">        
        <img loading="lazy" src="imagenes/<?php echo $entrada->imagen; ?>" alt="Imagen de Entrada">            
        </div>

        <div class="texto-entrada">
            <a href="/entrada?id=<?php echo $entrada->id; ?>">
                <h4><?php echo $entrada->titulo ?></h4>

                <P class="informacion-meta">Escrito el: <span><?php echo $entrada->creado ?> </span> por: <span><?php 
                foreach ( $vendedores as $vendedor ) : ?>
                <?php echo $entrada->vendedorId === $vendedor->id ? $vendedor->nombre ." " . $vendedor->apellido : ''; ?>
                <?php endforeach; ?></span></P>
              
            <p>
               <?php echo limitar_cadena($entrada->descripcion , 50, '...') ?>
            </p>
            </a>
        </div>

    </article>
    <?php endforeach; ?>

    