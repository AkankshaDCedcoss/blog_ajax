<?php
session_start();

if(!isset($_SESSION['blog']))
{
    $_SESSION['blog']=array();

}

if(isset($_POST['action']) && $_POST['action'] =='add' )
{

$blog=$_POST['val'];

array_push($_SESSION['blog'],$blog);
echo json_encode($_SESSION['blog']);

}


if(isset($_POST['action']) && $_POST['action'] =='update' )
{

$index=$_POST['key2'];
$newBlog=$_POST['key1'];

for($i=0;$i<count($_SESSION['blog']);$i++)
{
    if($i==$index)
    {
array_splice($_SESSION['blog'],$i,1,$newBlog);
    }
}
echo json_encode($_SESSION['blog']);

}



if(isset($_POST['action']) && $_POST['action'] =='delete' )
{

$delet=$_POST['key3'];


for($i=0;$i<count($_SESSION['blog']);$i++)
{
    if($i==$delet)
    {
array_splice($_SESSION['blog'],$i,1);
    }
}
echo json_encode($_SESSION['blog']);

}




?>