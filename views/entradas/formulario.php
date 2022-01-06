           <fieldset>
                <legend>Información General</legend>
                 
                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="entrada[titulo]" placeholder="Título Entrada" value="<?php echo s($entrada->titulo); ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="entrada[imagen]">

                <?php if ($entrada->imagen): ?>
                
                    <img src="/imagenes/<?php echo $entrada->imagen ?>" class="imagen-actualizar" >

                <?php endif; ?>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="entrada[descripcion]"> <?php echo s($entrada->descripcion); ?> </textarea>
            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>
                <label for="vendedor">Vendedor</label>
                <select name="entrada[vendedorId]" id="vendedor">
                    <option selected value="">--Seleccionar--</option>
                    <?php foreach ( $vendedores as $vendedor ) : ?>
                        <option
                          <?php echo $entrada->vendedorId === $vendedor->id ? 'selected' : ''; ?>
                         value="<?php echo s($vendedor->id) ?>" > <?php echo s( $vendedor->nombre ) . " " .  s( $vendedor->apellido ); ?> </option>
                    <?php endforeach; ?>
                </select>
            </fieldset>
