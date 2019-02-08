<?php

/*
    Pagina con un form che permetta di aggiornare un ospite nei seguenti campi
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


    if(!empty($_GET['id'])){
        $connection = connectDB();
        $query = "SELECT * from ospiti WHERE id = ?";
        $bind_params_type = "s";
        $bind_params_var = $_GET['id'];
        $result = getData($connection,$query,$bind_params_type, $bind_params_var);
    } else {
        echo 'Id non passato';
        die();
    }

    $this_file = basename(__FILE__);
    $path = getProjectPath($this_file);
?>
<div class="container">
    <div class="row">
        <h2>Modifica Ospite</h2>
    </div>
        <form action="<?php echo $path; ?>database.php" method="post">
             <div class="row">
                <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
                <div class="form-group col-6">
                    <label for="name">Nome</label>
                    <input class="form-control" type="text" name="name" id="name" value="<?php echo $result['name']; ?>">
                </div>
                <div class="form-group col-6 ">
                    <label for="lastname">Cognome</label>
                    <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo $result['lastname']; ?>">
                </div>
             </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="date_of_birth">Data di nascita</label>
                    <input class="form-control" type="text" name="date_of_birth" id="date_of_birth" value="<?php echo $result['date_of_birth']; ?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6">
                    <label for="document_type">Tipo di documento</label>
                    <input class="form-control" type="text" name="document_type" id="document_type" value="<?php echo $result['document_type']; ?>">
                </div>

                <div class="form-group col-6">
                    <label for="document_number">Numero di documento</label>
                    <input class="form-control" type="text" name="document_number" id="document_number" value="<?php echo $result['document_number']; ?>">
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
