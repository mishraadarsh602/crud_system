<?php
 
 require_once ("db.php");
 require_once ("component.php");

 $conn=Createdb();
 
 //create btn clicked
 if(isset($_POST['create'])){
createData();
 }
  //update btn clicked
  if(isset($_POST['update'])){
    UpdateData();
     }

       //update btn clicked
  if(isset($_POST['delete'])){
    deleteRecord();
     }

          //update btn clicked
  if(isset($_POST['deleteall'])){
    deleteAll();
     }




function createData(){
    $bookname=textboxValue("book_name");
    $bookpublisher=textboxValue("book_publisher");
    $bookprice=textboxValue("book_price");
    if($bookname && $bookpublisher && $bookprice){
  
 $sql="INSERT INTO books(book_name,book_publisher,book_price) VALUES('$bookname','$bookpublisher','$bookprice')";
    if(mysqli_query($GLOBALS['conn'],$sql)){
        echo "";
        TextNode("success","Success! record successfuly inserted");
    }  else{
        echo "error";
    }  

    } else{
 TextNode("error","#ERROR! Please provide data in the textbox");
    }

}
function textboxValue($value){
    $textbox=mysqli_real_escape_string($GLOBALS['conn'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    } else{
        return $textbox;
    }
}


//messages
function TextNode($classname,$msg){
    $element="<h6 class='$classname'>$msg</h6>";
echo $element;
}


//get data from mysql database
function getData(){
    $sql="SELECT * FROM books";
    $result=mysqli_query($GLOBALS['conn'],$sql);
    if(mysqli_num_rows($result)>0){
        return $result;
        }
    }


//update data
function UpdateData(){
    $bookid=textboxValue("id");
    $bookname=textboxValue("book_name");
    $bookpublisher=textboxValue("book_publisher");
    $bookprice=textboxValue("book_price");

    if($bookname && $bookpublisher && $bookprice){
        $sql="UPDATE books SET book_name='$bookname', book_publisher='$bookpublisher', book_price='$bookprice' WHERE id='$bookid'  ";

        if(mysqli_query($GLOBALS['conn'],$sql)){
           
            TextNode("success","Success! Data successfully updated");
        } else{
            TextNode("error","ERROR! Unable to update data");
        }
      
    }
    else {
        TextNode("error","ERROR! Select data using edit icon");
    }
}


//delete
function deleteRecord(){
    $bookid=(int)textboxValue("id");

    $sql="DELETE FROM books WHERE id=$bookid";
    if(mysqli_query($GLOBALS['conn'],$sql)){
           
        TextNode("success","Success! Data successfully Deleted");
    }
    else{
        TextNode("error","ERROR! Unable to delete data");
    }

}

function deleteBtn(){
    $result=getData();
    $i=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
          //  echo $row['id'];
            $i++;
            if($i>3){
                buttonElement("btn-deleteall","btn btn-danger","<i class='fa fa-trash'></i> Delete All","deleteall","");
           return;
            }
        }
    }
}

//deleteall
function DELETEaLL(){
$sql="DROP TABLE books";
if(mysqli_query($GLOBALS['conn'],$sql)){
           
    TextNode("success","Success!All Records successfully Deleted");
    Createdb();
}
else{
    TextNode("error","ERROR! Unable to delete all records");
}

}


//setid to textbox
function setID(){
    $getid=getData();
    $id=0;
    if($getid){
        while($row=mysqli_fetch_assoc($getid)){
            $id=$row['id'];
        }
    }
    return ($id+1);
}
?>