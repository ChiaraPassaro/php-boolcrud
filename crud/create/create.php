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
            <h2>Inserisci Ospite</h2>
        </div>
        <form action="<?php echo $path?>database.php" method="post">
            <div class="row">
                <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input class="form-control" type="text" name="name" id="name" value="">
                </div>
                <div class="form-group col-6">
                    <label for="lastname">Cognome</label>
                    <input class="form-control" type="text" name="lastname" id="lastname" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="date_of_birth">Data di nascita</label>
                    <input class="form-control" type="date" name="date_of_birth" id="date_of_birth" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="document_type">Tipo di documento</label>
                    <input name="document_type" id="document_type" list="document" class="form-control">
                    <datalist id="document">
                        <option value="CI">CI</option>
                        <option value="Driver License">Driver License</option>
                    </datalist>
                </div>
                <div class="form-group col-6">
                    <label for="document_number">Numero di documento</label>
                    <input class="form-control" type="text" name="document_number" id="document_number" value="">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12">
                    <input type="submit" class="btn btn-primary" value="Salva">
                </div>
            </div>
        </form>
    </div>

</div>
