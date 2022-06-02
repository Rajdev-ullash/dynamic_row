<?php include 'connection.php'; ?>


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


</head>
<body>

    <div class="container">
        <h2>Enter Group Info</h2>
        <div class="row">
            <div class="col-md-6">
                <label for="">Select Members</label>
                <select name="total_members" id="total_members" class="form-control">
                    <option value="">SELECT No of Members</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>
            </div>
        </div>
        <br>
        <h2>Enter Member Info</h2>
        <div>
            <form action="" id="members">

            </form>
        </div>
       
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("#total_members").change(function() {
                $("#members").empty()
                var total_members = $(this).val();
                console.log(total_members);
                for (var i=0; i<total_members; i++) {
                    var str = `<div class="row mt-3">
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Enter ID" class="form-control" name="id[]" id="">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Enter Name" class="form-control" name="name[]" id="">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="email" placeholder="Enter Email" class="form-control" name="email[]" id="">
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" placeholder="Enter Phone" class="form-control" name="phone[]" id="">
                                    </div>
                                </div>`;
                                $("#members").append(str);
                }

                var btn = '<button type="submit" name="submit" class="btn btn-primary mt-2" id="submit">Submit</button>';

                $("#members").append(btn);
            })
            
        })
    </script>
    <script>
        $("form").submit(function(e){
            e.preventDefault();

            const idArr = $.map($('input[type=text][name="id[]"]'), function(el) { return el.value; });
            console.log(idArr);

            const nameArr = $.map($('input[type=text][name="name[]"]'), function(el) { return el.value; });
            console.log(nameArr);

            const emailArr = $.map($('input[type=text][name="email[]"]'), function(el) { return el.value; });
            console.log(emailArr);

            const phoneArr = $.map($('input[type=text][name="phone[]"]'), function(el) { return el.value; });
            console.log(phoneArr);
        })
    </script>
</body>
<?php 
    // if(ISSET($_POST['submit'])){
    //     echo 'submitted'
    // }

?>
</html>
