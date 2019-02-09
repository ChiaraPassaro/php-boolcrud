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
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                        <tr>
                            <td><?php echo $guest['id']; ?></td>
                            <td><?php echo $guest['name']; ?></td>
                            <td><?php echo $guest['lastname']; ?></td>
                            <td><?php echo $guest['date_of_birth']; ?></td>
                            <td><?php echo $guest['document_type']; ?></td>
                            <td><?php echo $guest['document_number']; ?></td>
                            <td><?php echo $guest['created_at']; ?></td>
                            <td><?php echo $guest['updated_at']; ?></td>
                            <td>
                                <a class="btn btn-success" href="<?php echo $path ;?>crud/update/update.php/?id=<?php echo $guest['id']; ?>">Modifica</a>
                            </td>
                            <td>
                                <form action="<?php echo $path ;?>crud/delete/database.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $guest['id']; ?>">
                                    <button class="btn btn-danger" type="submit">Elimina</button></form>
                            </td>
                        </tr>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include '../../partials/_footer.php';
?>