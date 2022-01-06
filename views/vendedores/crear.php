<main class="contenedor seccion">
        <h1>Regristrar Vendedor(a)</h1>
        <a href="/admin" class="boton-verde"> Volver </a>

        <?php foreach($errores as $error): ?>

        <div class="alerta error">
             <?php echo $error; ?>
        </div>

        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/vendedores/crear">
            <?php include __DIR__ . '/formulario.php' ?>
            <input type="submit" value="Registrar Vendedor(a)" class="boton-verde">
        </form>
    </main>