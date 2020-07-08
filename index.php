<?php
include ("db.php");
include ("includes/header.php");
?>

<div class="container p-4">
    <div class = "row">
        <div class= "col-md-4">
            <!--Por medio de sessiones de php revisa 
            si tiene algun mensaje (que lo cree en save_task)--> 
            <?php
                if(isset($_SESSION['message'])){
            ?>
                <div class="alert alert-<?= $_SESSION['mesagge_type'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
                </div>

            <!--Cierra llave de validacion de la session
            limpia los datos de session
            -->
            <?php
                session_unset();
                }
            ?>

            <div class= "card card-body">
                <form action = "save_task.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" 
                        placeholder="Escribe el título de una tarea" autofocus/>
                    </div>
                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control"                   placeholder="Escribe la descripcion">
                        </textarea>
                    </div>
                    <input name="save_task" type="submit" class="btn btn-success btn-block" value="Guardar tarea"></input>
                </form>
            </div>
        </div>

        <div class= "col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Creado en </th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM task ";
                        $resultadoTareas = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_array($resultadoTareas)) {
                    ?>
                            <tr>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['description']; ?></td>
                                <td><?php echo $row['created_at']; ?></td>
                                <td> 
                                    <a href = "edit.php?id=<?php echo $row['id']?>" class = "btn btn-secondary btn-sm">
                                        <i class = "fas fa-marker "></i>
                                    </a>

                                    <a href = "delete_task.php?id=<?php echo $row['id']?>" class = "btn btn-danger btn-sm">
                                        <i class = "fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                    <?php }?>

                </tbody>
            </table>
        
        </div>
    </div>

</div>

<?php
include ("includes/footer.php");
?>

