<main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php 

            if ($resultado) {
            $mensaje = mostrarNotificacion(intval($resultado));
             if ($mensaje) {?>
                <p class="alerta exito"> <?php echo s($mensaje); ?> </p>

        <?php }
            }
        ?> 

        <a href="/propiedades/crear" class="boton-verde"> Nueva Propiedad </a>
        <a href="/vendedores/crear" class="boton-amarillo"> Nuevo(a) Vendedor(a) </a>
        <a href="/entradas/crear" class="boton-verde"> Nueva Entrada </a>

        <h2>Propiedades</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la base de datos-->

             <?php foreach( $propiedades as $propiedad ): ?>

                <tr>
                    <th><?php echo $propiedad->id ?></th>
                    <th><?php echo $propiedad->titulo ?></th>
                    <th> <img src="../imagenes/<?php echo $propiedad->imagen ?>" class="imagen-tabla"> </th>
                    <th>$<?php echo $propiedad->precio ?></th>
                    <th>

                        <form method="POST" class="W-100" action="/propiedades/eliminar">
                        <input type="hidden" name="id" value="<?php echo $propiedad->id; ?>">
                        <input type="hidden" name="tipo" value="propiedad">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/propiedades/actualizar?id=<?php echo $propiedad->id ?>" class="boton-amarillo-block">Actualizar</a>
                    </th>
                </tr>
             <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Vendedores</h2>

        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la base de datos-->

             <?php foreach( $vendedores as $vendedor ): ?>

                <tr>
                    <th><?php echo $vendedor->id ?></th>
                    <th><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></th>
                    <th><?php echo $vendedor->telefono ?></th>
                    <th>

                        <form method="POST" class="W-100" action="/vendedores/eliminar">
                        <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                        <input type="hidden" name="tipo" value="vendedor">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id ?>" class="boton-amarillo-block">Actualizar</a>
                    </th>
                </tr>
             <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Entradas</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody> <!-- Mostrar los resultados de la base de datos-->

             <?php foreach( $entradas as $entrada ): ?>

                <tr>
                    <th><?php echo $entrada->id ?></th>
                    <th><?php echo $entrada->titulo ?></th>
                    <th> <img src="../imagenes/<?php echo $entrada->imagen ?>" class="imagen-tabla"> </th>

                    <th>
                        <form method="POST" class="W-100" action="/entradas/eliminar">
                        <input type="hidden" name="id" value="<?php echo $entrada->id; ?>">
                        <input type="hidden" name="tipo" value="entrada">
                        <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>

                        <a href="/entradas/actualizar?id=<?php echo $entrada->id ?>" class="boton-amarillo-block">Actualizar</a>
                    </th>
                </tr>
             <?php endforeach; ?>
            </tbody>
        </table>
</main>