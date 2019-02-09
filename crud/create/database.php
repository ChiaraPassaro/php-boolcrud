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

    //Formato data valido 1964-04-02
    $date_format = 'Y-m-d';

    if(!empty($_POST['name'])
        && !empty($_POST['lastname'])
        && !empty($_POST['date_of_birth'])
        && validateDate($_POST['date_of_birth'], $date_format)
        && !empty($_POST['document_type'])
        && !empty($_POST['document_number'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $date_birth = $_POST['date_of_birth'];
        $document_type = $_POST['document_type'];
        $document_number = $_POST['document_number'];
    } else {
        //se c'è un errore creo un form che mi segnala gli input sbagliati
    ?>

     <form action="create.php" method="post" id="updated-form">
         <input type="hidden" name="id" value="<?php echo $guest['id']; ?>">

         <?php
         //se non c'è un campo invio errore altrimenti rinvio il dato

         //NAME
         if(empty($_POST['name'])){ ?>
             <input type="hidden" name="name_error" value="true">
         <?php }
         if (!empty($_POST['name'])) { ?>
             <input type="hidden" name="name" value="<?php echo  $_POST['name']; ?>">
         <? }

         //Last Name
         if(empty($_POST['lastname'])){ ?>
             <input type="hidden" name="lastname_error" value="true">
         <?php }
         if(!empty($_POST['lastname'])){ ?>
             <input type="hidden" name="lastname" value="<?php echo  $_POST['lastname']; ?>">
         <?php }

         //Date of birth
        if(empty($_POST['date_of_birth']) || !validateDate($_POST['date_of_birth'], $date_format)){ ?>
            <input type="hidden" name="date_of_birth_error" value="true">
        <? }
        if (!empty($_POST['date_of_birth'])) { ?>
            <input type="hidden" name="date_of_birth" value="<?php echo $_POST['date_of_birth']; ?>">
        <?php }

        //document type
        if(empty($_POST['document_type'])){ ?>
            <input type="hidden" name="document_type_error" value="true">
        <?php }
        if (!empty($_POST['document_type'])) { ?>
            <input type="hidden" name="document_type" value="<?php echo $_POST['document_type']; ?>">
        <?php }

         //document number
        if(empty($_POST['document_number'])){ ?>
            <input type="hidden" name="document_number_error" value="true">
        <?php }
        if (!empty($_POST['document_number'])) { ?>
            <input type="hidden" name="document_number" value="<?php echo $_POST['document_number']; ?>">
        <?php }
        ?>
            </form>
        </div>
    </div>

    <script src="../../dist/js/main.js"></script>

   <?php return; }

    $connection = connectDB();

    $query = "INSERT INTO `ospiti` (`name`, `lastname`, `date_of_birth`, `document_type`, `document_number`, `created_at`, `updated_at`) VALUES (?, ?, ?, ?, ?, NOW(), NOW());";
    $bind_param_type = "sssss";
    $bind_param_var = [$name, $lastname, $date_birth, $document_type, $document_number];


    $results = modifyData($connection, $query, $bind_param_type, $bind_param_var);

    if($results > 0){
        //se ho risultati prendo l'ultima riga inserita
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
                <input type="hidden" name="message" value="Ospite inserito con ID <?php echo $guest['id']; ?>">
            </form>
        <?php } ?>

        </div>
    </div>

<script src="../../dist/js/main.js"></script>


