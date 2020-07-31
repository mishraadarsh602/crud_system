<?php 

require_once ("component.php");
require_once ("operation.php");
 
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!---custom stylesheet---->
    <link rel="stylesheet" href="style.css">
    <title>Books</title>
</head>

<body>
    <main>
        <div class="container text-center">
            <h1 class="py-4 bg-dark text-light rounded"> <i class="fa fa-book"></i> Book Store</h1>
            <div class="d-flex justify-content-center">
                <form action="" method="post" class="w-50">
                    <div class="py-2">
                        <?php inputElement("<i class='fa fa-id-badge'></i> ","ID","id",setID()); ?>
                    </div>
                    <div class="pt-2">
                        <?php inputElement("<i class='fa fa-book'></i> ","Book Name","book_name",""); ?>
                    </div>
                    <div class="row pt-2">
                        <div class="col">
                            <?php inputElement("<i class='fa fa-male'></i>","Publisher","book_publisher",""); ?>
                        </div>
                        <div class="col">
                            <?php inputElement("<i class='fa fa-usd'></i>","Price","book_price",""); ?>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <?php buttonElement("btn-create","btn btn-success","<i class='fa fa-plus'></i>","create","dat-toggle='tooltip' data-placement='bottom' title='Create' ");?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fa fa-refresh'></i>","read","dat-toggle='tooltip' data-placement='bottom' title='Read' ");?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fa fa-pencil'></i>","update","dat-toggle='tooltip' data-placement='bottom' title='Update' ");?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fa fa-trash'></i>","delete","dat-toggle='tooltip' data-placement='bottom' title='Delete' ");?>
                      <?php deleteBtn();?>
                    </div>
                </form>
            </div>
            <div class="d-flex table-data">
                <table class="table table-stripped table-dark">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Book Name</th>
                            <th>Publisher</th>
                            <th>Book Price</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php 
                        if(isset($_POST['read'])){
                            $result=getData();

                            if($result){
                            while($row=mysqli_fetch_assoc($result)){?>
                        <tr>
                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['id']; ?></td>
                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_name']; ?></td>
                            <td data-id="<?php echo $row['id'];?>"><?php echo $row['book_publisher']; ?></td>
                            <td data-id="<?php echo $row['id'];?>"><?php echo "$". $row['book_price']; ?></td>
                            <td ><i class='fa fa-edit btnedit' data-id="<?php echo $row['id'];?>"></i></td>
                        </tr>
                        <?php
                        }
                     }
                }
                  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
    <script src="main.js"></script>
</body>
</html>