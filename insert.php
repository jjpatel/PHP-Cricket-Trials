<?php
$servername = "localhost";
$username = "id14814860_root";
$password = "Sddhargawe_123";
$database = "id14814860_registration";

$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    die("Sorry unable to connect, We regret for inconvinenece");
}
$insert = false;
$delete = false;
$update = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $bookname = $_POST['editbookname'];
        $sql = "UPDATE `detail` SET `bookname` = '$bookname ' WHERE `detail`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        $update = true;
        
    } else {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $bookname = $_POST['bookname'];
        $describe = $_POST['describe'];



        $sql = "INSERT INTO `detail` ( `name`, `email`,`mobile`, `bookname`,`describe`, `timestamp`) 
                VALUES ('$name', '$email','$mobile', '$bookname','$describe', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $insert = true;
        }
    }
}

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `detail` WHERE `sno` = $sno";
    $result = mysqli_query($conn,$sql);
    $delete = true;

}

if ($insert) {

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>SUCCESS!</strong> Your ORDER has been placed Successfully! Your details are encrypted!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
if ($update) {
    echo '<div class="alert alert-primary alert-dismissible fade show" role="alert">
    <strong>UPDATED!</strong> Your ORDER has been updated Successfully! Your details are encrypted!!!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}
if ($delete) {

    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>DELETED!</strong> Your ORDER has been DELETED!!!
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>';
}
include('index.php');
