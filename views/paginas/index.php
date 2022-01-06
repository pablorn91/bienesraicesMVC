<main class="contenedor seccion">
    <h2 data-cy="heading-nosotros">Más Sobre Nosotros</h2>
            <?php include 'iconos.php';?>
    </main>

    <section class="seccion contenedor">

        <h2 data-cy="heading-anuncios" >Casas y Depertamentos en Venta</h2>

        <?php 
        include 'listado.php'; 
        ?>

        <div class="alinear-derecha">
            <a href="/propiedades" class="boton-verde" data-cy="todas-propiedades">Ver Todas</a>
        </div>

    </section>

    <section class="imagen-contacto" data-cy="seccion-contacto">
        <h2>Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario de contacto y un asesor se pondrá en contacto en la brevedad</p>
        <a href="/contacto" class="boton-amarillo">Contáctanos</a>
    </section>

    <div class="contenedor seccion seccion-inferior">
        
        <section data-cy="blog" class="blog">
            <?php include 'listadoEntrada.php' ?>
        </section>

        <section data-cy="testimoniales" class="testimoniales">
            <h3>Testimoniales</h3>
           
            <div class="testimonial">
                <blockquote>
                    El personal se comportó de una manera extrañamente amable, por lo que sonreí incómodamente satisfecho con el trato amable, 100% satisfacción garantizada.
                </blockquote>
                <p>-Pablo Rodriguez</p>
            </div>

        </section>
    </div>
