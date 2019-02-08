<?php

/*
   2. Pagina con form di creazione di un nuovo ospite, che dia la possibilità di
    inserire i seguenti campi:
    a. Nome
    b. Cognome
    c. Data di nascita
    d. Tipo Documento
    e. Numero Documento
*/
    include_once '../../functions.php';
    include_once '../../env.php';
    $path = 'http://' . $path_server . '/' . $path_root . '/';

    include '../../partials/_header.php';


    $this_file = basename(__FILE__);
    $path = getProjectPath($this_file);

?>
<div class="container">
    <div class="row">
        <form action="<?php echo $path?>database.php" method="post">
            <div class="form-group">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" value="">
            </div>
            <div class="form-group">
                <label for="lastname">Cognome</label>
                <input class="form-control" type="text" name="lastname" id="lastname" value="">
            </div>
            <div class="form-group">
                <label for="date_of_birth">Data di nascita</label>
                <input class="form-control" type="text" name="date_of_birth" id="date_of_birth" value="">
            </div>
            <div class="form-group">
                <label for="document_type">Tipo di documento</label>
                <input class="form-control" type="text" name="document_type" id="document_type" value="">
            </div>
            <div class="form-group">
                <label for="document_number">Numero di documento</label>
                <input class="form-control" type="text" name="document_number" id="document_number" value="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Salva">
            </div>

        </form>
    </div>

</div>
