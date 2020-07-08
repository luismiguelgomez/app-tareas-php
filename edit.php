<?php
    include ("db.php");

    if (isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT * FROM task WHERE id = $id;";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) == 1) {
            //echo 'se puede editar';
            $consultaFila = mysqli_fetch_array($resultado);
            $titulo = $consultaFila['title'];
            $descripcion = $consultaFila['description'];
            //echo "$titulo";
        }
    }

    if (isset($_POST['update'])){
        //echo " Actualizando";
        $id = $_GET['id'];
        $titulo = $_POST['title'];
        $descripcion = $_POST['description'];

        $queryActualizarTarea = "UPDATE task SET id=$id,title='$titulo',description='$descripcion'  WHERE id=$id";
        mysqli_query($conn, $queryActualizarTarea);
        $_SESSION['message'] = "Tarea actualizada";
        $_SESSION['mesagge_type'] = "success";
        header ("Location: index.php");
    }

?>

<?php 
include ("includes/header.php");
?>
    <div class="container p-4">
        <div class = "row">
            <div class = "col-md-4 mx-auto">
                <div class = "card card-body">
                    <form action= "edit.php?id=<?php echo $_GET['id'];?>" method = "POST">
                        <div class = "form-group">
                            <input type="text" name="title" value="<?php echo $titulo; ?>" class="form-control" placeholder = "Actualiza el titulo">
                        </div>
                        <div class = "form-group">
                            <textarea name="description" rows="2" class="form-control" placeholder="Actualiza la descripción"><?php echo $descripcion; ?></textarea>
                        </div>
                        <button class="btn btn-success" name="update">Actualizar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div> 

<?php 
include ("includes/footer.php");
?>