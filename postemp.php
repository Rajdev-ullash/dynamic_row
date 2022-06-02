<?php include 'connection.php'; ?>

<?php 

    $division_id = $_REQUEST['div'];
    $district_id = $_REQUEST['dis'];
    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];

    $str = "INSERT INTO employees (name,email,division_id,district_id) VALUES ('$name', '$email', $division_id, $district_id)";

    if(mysqli_query($conn, $str)){
        header('Content-Type: application/json; charset=utf8');
        $data = ['success'=>true];
        echo json_encode($data);
    }
?>