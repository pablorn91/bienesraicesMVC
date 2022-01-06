<?php 
    if (!isset($_SESSION)) { //si la session ya esta iniciada no la vuelve a iniciar
        session_start();
    }

    $auth = $_SESSION['login'] ?? false;

    if (!isset($inicio)){
        $inicio = false;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">

</head>
<body>

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">

        <div class="contenedor contenido-header">

            <div class="barra">
                <a href="/">
                    <img src="../build/img/logo.svg" alt="Logo Bienes Raices">
                </a>
                <div class="movil-menu">
                    <img src="../build/img/barras.svg" alt="Menú Salchichas">
                </div>
                <div class="derecha">

                    <img class="modo-oscurito" src="../build/img/dark-mode.svg" alt="Modo oscurito">

                    <nav data-cy="navegacion-header" class="navegacion">
                        <a href="/nosotros">Nosotros</a>
                        <a href="/propiedades">Propiedades</a>
                        <a href="/blog">Blog</a>
                        <a href="/contacto">Contacto</a>
                        <?php if ($auth): ?>
                            <a href="/logout">Cerrar Sesión</a>
                        <?php endif; ?>
                        <?php if (!$auth): ?>
                            <a href="/login">Iniciar Sesión</a>
                        <?php endif; ?>
                    </nav> 
                </div>
                
            </div> <!-- .barra -->
 
        
            <?php  echo $inicio ? "<h1 data-cy='heading-sitio' >Venta de Casas y Departamentos de Lujo</h1>" : ''; ?>

        </div>
    </header>

    <?php echo $contenido ?>

    <footer class="footer seccion">
            <div class="contenedor contenido-footer">
                <nav data-cy="navegacion-footer" class="navegacion">
                    <a href="/nosotros">Nosotros</a>
                    <a href="/propiedades">Propiedades</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                </nav>
            </div>

            <p data-cy="copyright" class="copyright">Todos los derechos reservados <?php echo date('Y');?> &copy</p>
    </footer>
    
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>