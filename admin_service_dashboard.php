 <?php
 
 include("data_class.php");

 if (empty($_SESSION["adminid"])){
    header("location:index.php?msg=login first");
 }

 
  ?>
 
 <!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>


<style>
.innerright,
label {
    color: rgb(16, 170, 16);
    font-weight: bold;
}

.container,
.row,
.imglogo {
    margin: auto;
    text-align: center;
}

.innerdiv {
    text-align: center;
    width: 1405px;
    margin: 8px;

}

input {
    margin-left: 20px;
}

.leftinnerdiv {
    float: left;
    width: 20%;

}


.rightinnerdiv {
    float: left;/* scrolling box tools */
    width: 1080px;
    max-height: 90vh;
    overflow-y: auto;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);

}

.innerright {
    background-color: rgba(252, 252, 252, 0.9);

}

.greenbtn {
    background-color: rgb(145, 124, 212);
    color: black;
    width: 90%;
    height: 45px;
    margin-top: 12px;
    /*side menu control*/
}


.greenbtn,
a {
    text-decoration: none;
    color: black;
    font-size: 18px;
}

th {
    background-color: rgb(71, 188, 67);
    color: black;
}

td {
    background-color: rgba(255, 255, 255, 0.84);
    color: black;
}

td,
a {
    color: black;
}
    {
    box-sizing: border-box;
    font-family: 'Roboto';
}

.alert {
    padding: 4px;/*fail or success full box*/
}

label {


    color: rgb(29, 11, 11);/*lebel control*/
    /*display: block;*/
    font-size: 17px;


    /*
    margin-left: 12%;
    padding-Top: 10px;
    text-align: left; 
    font-size: 16px;
    font-style:bold;
    padding-bottom: 0px; 
    font-weight: 300;
    margin-bottom: 0rem; */
}

input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

input[type=text]:focus,
input[type=email]:focus,
input[type=number]:focus,
input[type=pasword]:focus,

select:focus,
textarea:focus {
    outline: none;
}

input[type=text],
input[type=email],
input[type=number],
input[type=pasword],
select,
textarea {

    width: 38%;
    padding: 3px;
    border: 2px solid #ccc;
    border-radius: 8px;
    box-sizing: border-box;
    margin-top: 2px;
    margin-bottom: 2px;
    resize: vertical;
}

body {
    font-family: 'Roboto';
    background-image: url('');
    

}


::placeholder {
    color: rgb(136, 112, 114);
    /*place holder all control functiom*/
    font-size: 15px;
}
</style>

<body>


    <?php
  

$msg="";

   if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

if($msg=="done"){
    echo "<div class='alert alert-success' role='alert'>Sucssefully Done</div>";
}
elseif($msg=="fail"){
    echo "<div class='alert alert-danger' role='alert'>Fail</div>";
}

    ?>



    <div class="container">
        <div class="innerdiv">
            <div class="row"><img class="imglogo" src="" /></div>
            <div class="leftinnerdiv">
                <!-- <Button class="greenbtn"> ADMIN</Button> -->
                <br>
                <Button class="greenbtn" onclick="openpart('addbook')"><img class="icons" src="images/icon/book.png"
                        width="30px" height="30px" /> ADD BOOK</Button>
                <Button class="greenbtn" onclick="openpart('bookreport')"> <img class="icons"
                        src="images/icon/open-book.png" width="30px" height="30px" /> BOOK REPORT</Button>
                <Button class="greenbtn" onclick="openpart('bookrequestapprove')"><img class="icons"
                        src="images/icon/interview.png" width="30px" height="30px" /> BOOK REQUESTS</Button>
                <Button class="greenbtn" onclick="openpart('addperson')"> <img class="icons"
                        src="images/icon/add-user.png" width="30px" height="30px" /> ADD USER</Button>
                <Button class="greenbtn" onclick="openpart('studentrecord')"> <img class="icons"
                        src="images/icon/monitoring.png" width="30px" height="30px" /> USER REPORT</Button>
                <Button class="greenbtn" onclick="openpart('issuebook')"> <img class="icons" src="images/icon/test.png"
                        width="30px" height="30px" /> ISSUE BOOK</Button>
                <Button class="greenbtn" onclick="openpart('issuebookreport')"> <img class="icons"
                        src="images/icon/checklist.png" width="30px" height="30px" /> ISSUE REPORT</Button><br></br>
                <a href="index.php"><Button class="btn btn-primary"><img class="icons" src="images/icon/book.png"
                            width="30px" height="30px" />LOGOUT</Button></a>
            </div>

            <!--BOOK REQUEST CONTROL  -->

            <div class="rightinnerdiv">
                <div id="bookrequestapprove" class="innerright portion" style="display:none">
                    <Button class="greenbtn">BOOK REQUEST APPROVE</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->requestbookdata();
            $recordset=$u->requestbookdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='
            padding: 8px;'>user Name</th><th>user type</th><th>Book name</th><th>Days </th><th>Approve</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
              "<td>$row[1]</td>";
              "<td>$row[2]</td>";

                $table.="<td>$row[3]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td>$row[5]</td>";
                $table.="<td>$row[6]</td>";
               
                $table.="<td><a href='approvebookrequest.php?reqid=$row[0]&book=$row[5]&userselect=$row[3]&days=$row[6]'><button type='button' class='btn btn-primary'>Approved</button></a></td>";
                //$table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'><button type='button' class='btn btn-danger'>Reject</button></a></td>";
                $table.="</tr>";
                //$table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <!--ADD BOOK  -->

            <div class="rightinnerdiv">
                <div id="addbook" class="innerright portion"
                    style="<?php  if(!empty($_REQUEST['viewid'])){ echo "display:none";} else {echo ""; }?>">
                    <Button class="greenbtn">ADD NEW BOOK</Button>
                    <br>
                    <form action="addbookserver_page.php" method="post" enctype="multipart/form-data">

                        <br><label>BOOK NAME:</label><input type="text" name="bookname" placeholder="Book name"
                            required /><br></br>

                        <label>DETAILS:</label><input type="text" name="bookdetail" placeholder="Book Details"
                            required /><br></br>
                        <label>AUTHOR:</label><input type="text" name="bookaudor" placeholder="Book Author"
                            required /><br></br>
                        <div><label>FACULTY:</label>

                            <select name="branch" id="branch">
                                <option value="DIT">DIT</option>
                                <option value="DCE">DCE</option>
                                <option value="AG">AG</option>
                                <option value="VET">VET</option>
                            </select>
                        </div>
                        </br>
                        <div><label>SEMESTER:</label>

                            <select name="semester" id="semester">
                                <option value="1st">1st SEMESTER</option>
                                <option value="2nd">2nd SEMESTER</option>
                                <option value="3rd">3rd SEMESTER</option>
                                <option value="4th">4th SEMESTER</option>
                                <option value="5th">5th SEMESTER</option>
                                <option value="6th">6th SEMESTER</option>
                            </select>
                       </div> <br>
                        <label>PRICE:</label><input type="number" name="bookprice" placeholder="Book price"
                            required /><br></br>
                        <label>QUANTITY:</label><input type="number" name="bookquantity" placeholder="Book Quantity"
                            required /><br></br>
                        <label>BOOK PHOTO:</label><input type="file" class="btn btn-success" name="bookphoto" /><br></br>

                        <input button type='submit' class='btn btn-primary' value="SUBMIT" />
                        <br></br>
                    </form>

                </div>
            </div>

            <!--ADD STUDENT -->
            <div class="rightinnerdiv">
                <div id="addperson" class="innerright portion" style="display:none">
                    <Button class="greenbtn">ADD PERSON</Button>
                    <form action="addpersonserver_page.php" method="post" enctype="multipart/form-data"><br>
                        <label>NAME:</label><input type="text" name="addname" placeholder="user  name" required /><br>
                        </br>
                        <label>EMAIL:</label><input type="email" name="addemail" placeholder="user email" required /><br></br>
                        <label>PASSWORD:</label><input type="pasword" name="addpass" placeholder="password"
                            required /><br></br>

                        <label for="typw">CHOOSE TYPE:</label>
                        <select name="type">
                            <option value="student">student</option>
                            <option value="teacher">teacher</option>
                        </select><br></br>

                        <input button type='submit' class='btn btn-primary' value="SUBMIT" /><br></br>
                    </form>
                </div>
            </div>

            <!--STUDENT RECORD -->

            <div class="rightinnerdiv">
                <div id="studentrecord" class="innerright portion" style="display:none">
                <!--<div class="span9">
                        <form class="form-horizontal row-fluid" action="" method="post">
                            <div class="control-group">
                                <label class="control-label" for="Search"></label>
                                <div class="controls">
                                    <input type="text" id="title" name="title" placeholder="Enter"
                                        class="span8" required>
                                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        </div>-->
                    
                    <Button class="greenbtn">STUDENT RECORD</Button>

                    <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'> Name</th><th>Email</th><th>Type</th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[1]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[4]</td>";
                $table.="<td><a href='deleteuser.php?useriddelete=$row[0]'<button type='button' class='btn btn-danger'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                </div>
            </div>

            <!--ISSUE BOOK RECORD -->

            <div class="rightinnerdiv">
                <div id="issuebookreport" class="innerright portion" style="display:none">
                    <!--<div class="span9">
                        <form class="form-horizontal row-fluid" action="" method="post">
                            <div class="control-group">
                                <label class="control-label" for="Search"></label>
                                <div class="controls">
                                    <input type="text" id="title" name="title" placeholder="Enter"
                                        class="span8" required>
                                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form>
                        </div>= -->

                        <Button class="greenbtn">ISSUE BOOK RECORD</Button>

                        <?php
            $u=new data;
            $u->setconnection();
            $u->issuereport();
            $recordset=$u->issuereport();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style='  
            padding: 8px;'>Issue Name</th><th>Book Name</th><th>Issue Date</th><th>Return Date</th><th>Fine</th></th><th>Issue Type</th></tr>";

            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[3]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[4]</td>";
               // $table.="<td><a href='otheruser_dashboard.php?returnid=$row[0]&userlogid=$userloginid'>Return</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>




                    </div>
                </div>

                <!--ISSUE BOOK -->
                <div class="rightinnerdiv">
                    <div id="issuebook" class="innerright portion" style="display:none">
                        <Button class="greenbtn">ISSUE BOOK</Button>
                        <form action="issuebook_server.php" method="post" enctype="multipart/form-data"><br></br>
                            <label for="book">CHOOSE BOOK:</label>
                            <select name="book">
                                <?php
            $u=new data;
            $u->setconnection();
            $u->getbookissue();
            $recordset=$u->getbookissue();
            foreach($recordset as $row){

                echo "<option value='". $row[2] ."'>" .$row[2] ."</option>";
        
            }            
            ?>

                            </select><br></br>

                            <label for="Select Student">SELECT STUDENT:</label>
                            <select name="userselect">
                                <?php
            $u=new data;
            $u->setconnection();
            $u->userdata();
            $recordset=$u->userdata();
            foreach($recordset as $row){
               $id= $row[0];
                echo "<option value='". $row[1] ."'>" .$row[1] ."</option>";
            }            
            ?>

                            </select><br></br>

                            <label>DAYS:</label> <input type="number" name="days" required><br></br>

                            <input type="submit" class='btn btn-primary' value="SUBMIT" /><br></br>
                        </form>
                    </div>
                </div>


                <!--BOOK DETAILS-->
                <div class="rightinnerdiv">
                    <div id="bookdetail" class="innerright portion"
                        style="<?php  if(!empty($_REQUEST['viewid'])){ $viewid=$_REQUEST['viewid'];} else {echo "display:none"; }?>">
                        

                        <Button class="greenbtn">BOOK DETAILS</Button></br>


                        <?php
            $u=new data;
            $u->setconnection();
            $u->getbookdetail($viewid);
            $recordset=$u->getbookdetail($viewid);
            foreach($recordset as $row){

               $bookid= $row[0];
               $bookimg= $row[1];
               $bookname= $row[2];
               $bookdetail= $row[3];
               $bookauthour= $row[4];
               $semester= $row[5];// SEMESTER
               $branch= $row[6];
               $bookprice= $row[7];
               $bookquantity= $row[8];
               $bookava= $row[9];
               $bookrent= $row[10];

            }            
?>
<div>
                        <img width='350px' height='350px' style='border:1px solid #333333; float:left;margin-left:20px'
                            src="uploads/<?php echo $bookimg?> " />
                        </br>

                        <p style="color:black">BOOK NAME: &nbsp&nbsp<?php echo $bookname ?></p>
                        <p style="color:black">BOOK DETAILS: &nbsp&nbsp<?php echo $bookdetail ?></p>
                        <p style="color:black">BOOK AUTHOR: &nbsp&nbsp<?php echo $bookauthour ?></p>
                        <p style="color:black">FACULTY: &nbsp&nbsp<?php echo $branch ?></p>
                        <p style="color:black">SEMESTER: &nbsp&nbsp<?php echo $semester ?></p>
                        <p style="color:black">BOOK PRICE:&nbsp&nbsp<?php echo $bookprice ?></p>
                        <p style="color:black">BOOK  AVAILABLE: &nbsp&nbsp<?php echo $bookava ?></p>
                        <p style="color:black">BOOK RENT: &nbsp&nbsp<?php echo $bookrent ?></p></br>
                        <a href="admin_service_dashboard.php" class="btn btn-primary">Go Back</a> <br></br>
                    </div>
                    </div>
                </div>

                <!--BOOK RECORD-->

                <div class="rightinnerdiv">
                    <div id="bookreport" class="innerright portion" style="display:none">
                    <!-- <div class="span9">
                        <form class="form-horizontal row-fluid" id="bookdetail" method="post">
                            <div class="control-group">
                                <label class="control-label" for="Search"></label>
                                <div class="controls">
                                    <input type="text" id="title" name="title" placeholder="Enter"
                                        class="span8" required>
                                    <button type="submit" name="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </form> -->
            
                        

                        <Button class="greenbtn">BOOK RECORD</Button>
                        <?php
            $u=new data;
            $u->setconnection();
            $u->getbook();
            $recordset=$u->getbook();

            $table="<table style='font-family: Arial, Helvetica, sans-serif;border-collapse: collapse;width: 100%;'><tr><th style=' 
            padding: 8px;'>Book Name</th><th>Faculty</th><th>Semester</th><th>Price</th><th>Qnt</th><th>Available</th><th>Rent</th></th><th>View</th></th><th>Delete</th></tr>";
            foreach($recordset as $row){
                $table.="<tr>";
               "<td>$row[0]</td>";
                $table.="<td>$row[2]</td>";
                $table.="<td>$row[6]</td>";
                $table.="<td>$row[5]</td>";//change data
                $table.="<td>$row[7]</td>";
                $table.="<td>$row[8]</td>";
                $table.="<td>$row[9]</td>";
                $table.="<td>$row[10]</td>";
                $table.="<td><a href='admin_service_dashboard.php?viewid=$row[0]'><button type='button' class='btn btn-primary'>View BOOK</button></a></td>";
                $table.="<td><a href='deletebook_dashboard.php?deletebookid=$row[0]'<button type='button' class='btn btn-danger'>Delete</a></td>";
                $table.="</tr>";
                // $table.=$row[0];
            }
            $table.="</table>";

            echo $table;
            ?>

                    </div>
                </div>

            </div>
        </div>

        <script>
        function openpart(portion) {
            var i;
            var x = document.getElementsByClassName("portion");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }
            document.getElementById(portion).style.display = "block";
        }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>

</body>
</html>