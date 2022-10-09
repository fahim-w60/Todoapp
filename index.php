
<?php

$todos[]='';
if(file_exists('todo.json'))
{
    $jsn = file_get_contents('todo.json');
    $todos = json_decode($jsn,true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="margin-left:100px;margin-top:20px;">
    <form style="margin-bottom:20px;"action="newTodo.php" method="post">
        <input type="text" name="todo_name" placeholder="enter your todo">
        <button>New Todo</button>
    </form> 
    <?php
    foreach($todos as $todoname => $todo)
    {?>
    <div style="margin-bottom:20px;">
        <form style="display:inline-block;" action="changeStatus.php" method="POST">
        <input type="hidden" name="todo_name" value="<?php echo $todoname;?>">
        <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>
        </form>
       <?php echo $todoname;?>
       <form style="display:inline-block;" action="delete.php" method="post">
        <input type="hidden" name="todo_name" value="<?php echo $todoname;?>">
        <button>Delete</button> 
       </form>
    </div>
    <?php   
    }
    ?>
    <script>
        const checkBoxes = document.querySelectorAll('input[type=checkbox]');
        checkBoxes.forEach(ch=>{
            ch.onclick = function(){
                this.parentNode.submit();
            };
        });
    </script>
</body>
</html>