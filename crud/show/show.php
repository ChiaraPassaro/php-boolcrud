<?php
    include_once '../../functions.php';
    include_once '../../env.php';

    $path = 'http://' . $path_server . '/' . $path_root . '/';

    include '../../partials/_header.php';

    include_once 'database.php';


    if(!empty($results)){
        $guest = $results;
    } else {
        echo 'Non si sono record';
        die();
    }

    ?>

    <div class="container">
        <div class="row">

            <h1 class="table-title">Ospite - ID  <?php echo $guest['id']; ?> </h1>
            <table class="table table-prenotazioni">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Cognome</th>
                    <th>Data di nascita</th>
                    <th>Tipo di documento</th>
                    <th>Numero di documento</th>
                    <th>Creato</th>
                    <th>Modificato</th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $guest['id']; ?></td>
                            <td><?php echo $guest['name']; ?></td>
                            <td><?php echo $guest['lastname']; ?></td>
                            <td><?php echo $guest['date_of_bird']; ?></td>
                            <td><?php echo $guest['document_type']; ?></td>
                            <td><?php echo $guest['document_number']; ?></td>
                            <td><?php echo $guest['created_at']; ?></td>
                            <td><?php echo $guest['updated_at']; ?></td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include '../../partials/_footer.php';
?>