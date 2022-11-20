<?php

if (isset ($_GET['resultado'])){
    
    ?>
    <div class="alert alert-success my-1" role="alert">
        Se han guardado los cambios!
    </div>
<?php
}

if (isset ($_GET['error'])){
    
    ?>
    <div class="alert alert-danger my-1" role="alert">
        Ha ocurrido un error (<?php echo $_GET['error'] ?>)
    </div>
<?php
}
