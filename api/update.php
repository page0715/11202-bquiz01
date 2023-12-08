<?php 

include_once "db.php";
$table=$_POST['table'];
$DB=${ucfirst($table)};
$row=$DB->find($_POST['id']);

if(isset($_FILES['img']['tmp_name'])){
    move_uploaded_file($_FILES['img']['tmp_name'],'../img/'.$_FILES['img']['name']);
    $row['img']=$_FILES['img']['name'];
}

$DB->save($row);
to("../back.php?do=$table");