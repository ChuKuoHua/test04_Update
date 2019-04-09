<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
         
</head>
<body>
    <?php require_once 'update.php'; ?>
    <?php 

        $con = new mysqli('localhost','root','','txt') or die(mysqli_error($con));
        $result = $con ->query("SELECT * FROM commodity") or die($con->error);
    ?>

    <?php
        if(isset($_SESSION['message'])):
    ?>
    <div class="alert alert-<?php echo $_SESSION['msg_type']?>">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        ?>
    </div>

    <?php endif ?>
<div class="container">
    <div class="row jstufy-content-center ">
        <div class="col-md-3">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div class="form-group">
                        <label ><h5>name</h5></label>
                        <input class="form-control" type="text" name="name" id="name" value ="<?php echo $name; ?>" placeholder ="Name">
                    </div>            
                    <div class="form-group">   
                        <label ><h5>Price</h5></label>
                        <input class="form-control" type="text" name="value" id="value" value ="<?php echo $value; ?>" placeholder ="Price">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-warning " type ="submit" id="submit" name="update">Update</button>
                    </div>
            </form>            
        </div>
        <div class="col-md-1">
        </div>
        <div class="col-md-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th colspan="1">Action</th>
                    </tr>
                </thead>

                <?php
                    while($row =$result->fetch_assoc()):     
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['value']; ?></td>
                    <td>
                    <a href="test_04.php?edit=<?php echo $row['id']; ?>" class=" btn btn-info">Edit</a>            
                    
                    </td>
                </tr>
                <?php
                endwhile;                
                ?>
            </table>
        </div>
    </div>    
</div>

</body>
</html>