<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Laboratorio-7-Argenis Salazar</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<center>
    <br>
    <br>
    <div id="form">
        <form method="post">
            <tavle width="100%" border="1" cellpadding="15">
                <tr>
                    <td>
                        <input type="text" name="an" placeholder="Año" value="<?php if(isset($_GET['edit'])) echo $getROW['an']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="autor" placeholder="Autor" value="<?php if(isset($_GET['edit'])) echo $getROW['autor']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="titulo" placeholder="Titulo" value="<?php if(isset($_GET['edit'])) echo $getROW['titulo']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="ur" placeholder="URL" value="<?php if(isset($_GET['edit'])) echo $getROW['ur']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="espe" placeholder="Especialidad" value="<?php if(isset($_GET['edit'])) echo $getROW['espe']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="edito" placeholder="Editorial" value="<?php if(isset($_GET['edit'])) echo $getROW['edito']; ?>">
                    </td>
                </tr>
                <br><br>
                <tr>
                    <td>
                        <?php
                        if(isset($_GET['edit'])){
                            ?>
                            <button type="submit" name="update">Editar</button>
                            <?php
                        }else{
                            ?>
                            <button type="submit" name="save">Agregar</button>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </form>
        <br><br>
    </div>
    <div id="form2">
        <table width="100%" border="1" cellpadding="15" align="center">
            <?php
            $res = $MySQLiconn->query("SELECT * FROM data");
            while ($row=$res->fetch_array()) {
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['an']; ?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['ur']; ?></td>
                <td><?php echo $row['espe']; ?></td>
                <td><?php echo $row['edito']; ?></td>
                <td><a href="<?php echo $row['ur']; ?>" onclick="return confirm('Confirmar leer')">Leer</a></td>
                <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</center>
</body>
</html>