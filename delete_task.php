<?php
    include('db.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM task WHERE id = $id";
        $resultado = mysqli_query($conn, $query);
        
        if (!$resultado) {
            die ("Consulta fallada");
        }

        $_SESSION ['message'] = "Tarea eliminada exitosamente";
        $_SESSION ['mesagge_type'] = "danger";

        header ('Location: index.php');
                
    }

?>