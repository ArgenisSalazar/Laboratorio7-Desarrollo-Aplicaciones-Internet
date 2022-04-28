<?php
include_once 'db.php';

if(isset($_POST['save']))
{
    $an = $MySQLiconn->real_escape_string($_POST['an']);
    $autor = $MySQLiconn->real_escape_string($_POST['autor']);
    $titulo = $MySQLiconn->real_escape_string($_POST['titulo']);
    $ur = $MySQLiconn->real_escape_string($_POST['ur']);
    $espe = $MySQLiconn->real_escape_string($_POST['espe']);
    $edito = $MySQLiconn->real_escape_string($_POST['edito']);

    $SQL = $MySQLiconn->query("INSERT INTO data(an,autor,titulo,ur,espe,edito) VALUES('$an','$autor','$titulo','$ur','$espe','$edito')");

    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}

if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM data WHERE id =".$_GET['del']);
    header("Location: index.php");
}

if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM data WHERE id =".$_GET['edit']);
    $getROW = $SQL->fetch_array();
}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE data SET an='".$_POST['an']."', autor='".$_POST['autor']."', titulo='".$_POST['titulo']."', ur='".$_POST['ur']."', espe='".$_POST['espe']."', edito='".$_POST['edito']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}

?>