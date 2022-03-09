<?php
session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <style>

.main{
    margin-left: 10%;
    margin-top: 4%;
}

label{
    font-size: 1.4em;
}
button
{
    padding: .5% 2%;
    background-color: green;
    font-size: 1.2em;
}
body{
    background-color: lightgrey;
}


        </style>

</head>
<body>
    <div class="main">
<label>Add Your Blog:</label>

<textarea id="add" name="add" ></textarea>
<button id='submit'>AddBlog</button>
<button id='update'>UpdateBlog</button>
<div class="div1" id='result'></div>
</div>
</body>
<script>
    var arr=[];
    var len;

$(document).ready(function()
{
    $("#update").hide();





$("#submit").click(function()
{
var val1=$("#add").val();

$.ajax(
    {
url:'view.php',
type:'post',
data:
{
  val:val1,
  action:'add'  
},
dataType:'json',
success:function(data)
{
display(data);
}

    }
)

})


})

function edit(x)
{

    $("#submit").hide();
    $("#update").show();
    console.log(x);

    for (var i = 0; i < len; i++) {
                if (i == x) {
                    $("#add").val(arr[i]);
                   
                }
            }

            $("#update").click(function()
{
var val2=$("#add").val();
$.ajax(
    {
url:'view.php',
type:'post',
data:
{
  key1:val2,
  key2:x,
  action:'update'  
},
dataType:'json',
success:function(data)
{
display(data);
}
    }
)
})

}

function delet(x)
{
    $.ajax(
    {
url:'view.php',
type:'post',
data:
{
  
  key3:x,
  action:'delete'  
},
dataType:'json',
success:function(data)
{
display(data);
}
    }
)
  
}









function display(arr2)

{
    len=arr2.length;

    html="<table>";
    for(var i=0;i < arr2.length;i++)
    {
        html+="<tr><td>"+arr2[i]+"</td><td><button onclick='edit("+i+")'>Edit</button></td><td><button onclick='delet("+i+")'>Delete</button ></td></tr>";
    }
    html+="</table>";
    document.getElementById("result").innerHTML=html;
}




</script>
</html>