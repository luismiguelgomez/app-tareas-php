<?php
include("db.php");

if(isset($_POST['save_task'])){
    $title = $_POST['title'];
    $descripcion = $_POST['description'];
    echo 'este es el titulo:'.$title;
    echo 'esta es la descripcion:'.$descripcion;
    
    //inserta en base de datos el titulo y descripcion
    $query = "INSERT INTO task (title, description) VALUES ('$title','$descripcion')";
    
    //Realiza una consulta de la anterior insercion
    $result = mysqli_query ($conn, $query);

    //Si NO trajo resultado la consulta abre el if
    if(!$result){
        echo 'No se ha realizado la inserción';
    } //si trajo algo de la consulta mostrará el mensaje

    //Mostrar mensaje de que la tarea fue guardada
    $_SESSION['message'] = 'Tarea guardada exitosamente';
    $_SESSION['mesagge_type'] = 'success';

    header("Location: index.php");


} else {
    echo 'No he recibido nada del formulario';
}
?>