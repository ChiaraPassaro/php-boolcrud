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

    if(!empty($_POST['name'])
        && !empty($_POST['lastname'])
        && !empty($_POST['date_of_birth'])
        && !empty($_POST['document_type'])
        && !empty($_POST['document_number'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $date_birth = $_POST['date_of_birth'];
        $document_type = $_POST['document_type'];
        $document_number = $_POST['document_number'];
        $created_at =  NOW();
        $updated_at =  NOW();
    } else {
        die('Parametri non passati');
    }

    $connection = connectDB();

    $query = "INSERT INTO `ospiti` (`name`, `lastname`, `date_of_birth`, `document_type`, `document_number`, `created_at`, `updated_at` VALUES (?, ?, ?, ?, ?, ?, ?)";
    $bind_param_type = "ssssss";
    $bind_param_var = [$name, $lastname, $date_birth, $document_type, $document_number, $created_at, $updated_at];


    $results = modifyData($connection, $query, $bind_param_type, $bind_param_var);

    if($results > 0){
        $query = "SELECT * from `ospiti` ORDER BY `id` DESC LIMIT 1;";
        $bind_param_type = "s";
        $bind_param_var = $id;
        $guest = getData($connection, $query, $bind_param_type, $bind_param_var);
    } else {
        $message = 'Nessuna modifica effettuata';
    }
?>
    <div class="container">
        <div class="row">
            <?php
        if(!empty($message)){ ?>
            <h1><?php echo $message; ?></h1>
        <?php }
        else { ?>
            <form action="<?php echo $path; ?>index.php" method="post" id="updated-form">
                <input type="hidden" name="id" value="<?php echo $guest['id']; ?>">
            </form>
        <?php } ?>

        </div>
    </div>

<script src="../../dist/js/main.js"></script>


