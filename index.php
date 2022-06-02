<?php include 'connection.php'; ?>
<?php 
    $str = "SELECT * FROM divisions";
    $q = mysqli_query($conn, $str);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Learn Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

</head>
<body>

    <div class="container">
        <h2>Add Employee</h2>
        <div class="col-6">
            <form action="" id="myform">
                <div class="form-group">
                    <label for="">Division</label>
                    <select class="form-control" name="" id="division">
                        <option value="">SELECT DIVISION</option>
                        <?php 
                            while($row = mysqli_fetch_array($q)){
                                ?> 
                                     <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">District</label>
                    <select class="form-control" name="" id="district">
                        <option value="">SELECT DISTRICT</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Employee Name</label>
                    <input type="text" class="form-control" name="emp_name" id="emp_name">
                </div>
                <div class="form-group">
                    <label for="">Employee Email</label>
                    <input type="email" class="form-control" name="emp_email" id="emp_email">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        $(document).ready(function(){
            $("#division").change(function(){
                $("#district").empty();
                var division_id = $(this).val();
                
                $.ajax({
                    url: 'api.php?division='+division_id,
                    type: 'GET',
                    success: function(res){
                        var str = '<option value="">SELECT DISTRICT</option>';
                       for(var i = 0; i < res.length; i++){
                           str += '<option value="'+res[i].district_id+'">'+res[i].district_name+'</option>';       
                           
                       }
                       $('#district').append(str);
                       console.log(str);
                    }
                })
            })
        })
    </script>
    <script>
        $("form").submit(function(e){
            e.preventDefault();
            var division = $("#division").val();
            var district = $("#district").val();
            var emp_name = $("#emp_name").val();
            var emp_email = $("#emp_email").val();
            console.log(division,district,emp_name,emp_email);
            $.ajax({
                url: 'postemp.php',
                type: 'POST',
                data: {
                    div: division,
                    dis: district,
                    name: emp_name,
                    email: emp_email
                },
                success: function(res){
                    console.log(res);
                    $("#myform")[0].reset();
                    alert('Data inserted');
                    
                }
            })
        })
    </script>
</body>
</html>
