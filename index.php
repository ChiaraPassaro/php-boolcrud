<?php
    include_once 'functions.php';
    include_once 'database.php';

    $this_file = basename(__FILE__);
    $path = getProjectPath($this_file);
    $guests = $results;

    include 'partials/_header.php';
    ?>



<?php
    include 'partials/_footer.php';
?>