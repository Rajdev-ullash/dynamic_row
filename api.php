<?php include 'connection.php'; ?>

<?php 

    $division_id = $_REQUEST['division'];
    $str = "SELECT * FROM districts WHERE division_id = $division_id";
    $q = mysqli_query($conn, $str);
    $data = [];
    while ($row = mysqli_fetch_array($q)){
        $obj = [];
        $district_id = $row['id'];
        $district_name = $row['name'];

        $obj['district_id'] = $district_id;
        $obj['district_name'] = $district_name;
        array_push($data, $obj);
    }
    header('Content-Type: application/json; charset=utf8');
    echo json_encode($data);

?>