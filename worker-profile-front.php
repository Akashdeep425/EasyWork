<!DOCTYPE html>
<html lang="en">
<?php session_start();
     if(isset($_SESSION["activeuser"])==false)
    {
        header("location:index.php");
    }?>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="css/profile.css">
    <script>
        function showpreview1(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#aadhaar').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

        function showpreview2(file) {

            if (file.files && file.files[0]) {
                var reader = new FileReader();
                reader.onload = function(ev) {
                    $('#profile').attr('src', ev.target.result);
                }
                reader.readAsDataURL(file.files[0]);
            }

        }

    </script>

    <script>
        $(document).ready(function() {
            $("#FetchProfile").click(function() {
                var uid = $("#txtUid").val();
                var action_url = "worker-profile-fetch.php?uid=" + uid;

                $.getJSON(action_url, function(json_ary) {

                    if (json_ary.length == 0) {
                        $("#errUid").html("No Record Found");
                    } else {
                        $("#name").hide().val(json_ary[0].name).show(900);
                        $("#txtMob").hide().val(json_ary[0].mobile).show(900);
                        $("#category").hide().val(json_ary[0].category).show(900);
                        $("#shop").hide().val(json_ary[0].shop).show(900);
                        $("#txtAdd").hide().val(json_ary[0].address).show(900);
                        $("#city").hide().val(json_ary[0].city).show(900);
                        $("#state").hide().val(json_ary[0].state).show(900);
                        $("#exp").hide().val(json_ary[0].experience).show(900);
                        $("#special").hide().val(json_ary[0].special).show(900);
                        $("#previous").hide().val(json_ary[0].previous).show(900);
                        $("#aadhaar").hide().attr("src", "uploads/" + json_ary[0].aadhaar).show(900);
                        $("#hdnA").val(json_ary[0].aadhaar);
                        $("#profile").hide().attr("src", "uploads/" + json_ary[0].profile).show(900);
                        $("#hdnP").val(json_ary[0].profile);
                    }

                });
            });
            $("#txtMob").blur(function(){
                var mob=$("#txtMob").val();
                var r=/^[6-9]{1}[0-9]{9}$/;
                if(r.test(mob)==false){
                    alert("Enter Valid Mobile NO")
                }
            });

        });

    </script>
</head>

<body>
    <div class="container">
        <div class="row pt-1" style="background:#4151D9;color:white">
            <div class="col-md-12">
                <center>
                    <h3>Worker Profile</h3>
                </center>
            </div>
        </div>
        <form action="worker-profile-process.php" method="post" enctype="multipart/form-data">
            <input type="hidden" id="hdnA" name="hdnA">
            <input type="hidden" id="hdnP" name="hdnP">
            <div class="form-row pt-5">
                <div class="col-md-6 form-group">
                    <label for="">User id</label>
                    <input type="text" id="txtUid" class="form-control" name="txtUid" readonly
                     value="<?php echo $_SESSION['activeuser']; ?>">
                    <span id="errUid">*</span>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-3 form-group">
                    <label for="">&nbsp;</label>
                    <input type="button" id="FetchProfile" class="form-control btn btn-primary" value="Fetch Profile">
                </div>

            </div>
            <div class="form-row">
                <div class="col-md-6 form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Mobile Number</label>
                    <input type="text" class="form-control" name="txtMob" id="txtMob" required>
                </div>
            </div>
            <div class="form-row pt-2">
                <div class="col-md-6 form-group">
                    <label for="">Category</label>
                    <select class="form-control" name="category" id="category" required>
                       <option value="none">--Select Category--</option>
                       <option value="Electrician">Electrician</option>
                       <option value="Carpenter">Carpenter</option> 
                       <option value="Plumber">Plumber</option> 
                       <option value="Gardener">Gardener</option> 
                       <option value="Cleaner">Cleaner</option> 
                       <option value="House Help">House Help</option> 
                       <option value="Cook">Cook</option> 
                       <option value="Masseuse">Masseuse</option> 
                       <option value="Physiotherapist">Physiotherapist</option> 
                       <option value="Car Mechanic">Car Mechanic</option> 
                       <option value="Painter">Painter</option> 
                       <option value="Interior Designer">Interior Designer</option> 
                       <option value="P.O.P">P.O.P</option>
                       <option value="Aluminium Fitting">Aluminium Fitting</option> 
                       <option value="Dhobi">Dhobi</option> 
                       <option value="Caretaker">Caretaker</option> 
                       <option value="Contracter">Contracter</option> 
                       <option value="Sanitation">Sanitation</option> 
 
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Firm/Shop/Individual</label>
                    <input type="text" class="form-control" name="shop" id="shop" required>
                </div>
            </div>
            <div class="form-row pt-2">
                <div class="col-md-12 form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="txtAdd" id="txtAdd" required>
                </div>
            </div>
            <div class="form-row pt-2">
                <div class="col-md-6 form-group">
                    <label for="">City</label>
                    <input type="text" class="form-control" name="city" id="city" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">State</label>
                    <input type="text" class="form-control" name="state" id="state" required>
                </div>
            </div>
            <div class="form-row pt-2">
                <div class="col-md-6 form-group">
                    <label for="">Experience</label>
                    <input type="text" class="form-control" name="exp" id="exp" required>
                </div>
                <div class="col-md-6 form-group">
                    <label for="">Specialization</label>
                    <input type="text" class="form-control" name="special" id="special" required>
                </div>
            </div>
            <div class="form-row pt-2">
                <div class="col-md-12 form-group">
                    <label for="">Previous Work</label>
                    <input type="text" class="form-control" name="previous" id="previous">
                </div>
            </div>
            <div class="form-row pb-5 pt-2">
                <div class="col-md-6">
                    <label for="" style="font-size:18px">Aadhaar Pic</label>
                    <input type="file" name="aadhaarPic" id="aadhaarPic" onchange="showpreview1(this);" required>
                    <img src="pics/undraw_plain_credit_card_c8b8.svg" id="aadhaar" width="80" height="80" alt="">
                </div>
                <div class="col-md-6">
                    <label for="" style="font-size:18px">Profile Pic</label>
                    <input type="file" name="profilePic" id="profilePic" onchange="showpreview2(this);" required>
                    <img src="pics/img_avatar.png" id="profile" width="80" height="80" alt="">
                </div>
            </div>
            <div class="form-row pb-5">
                <div class="col-md-12">
                    <center>
                        <input type="submit" value="Save" name="btn" class="btn btn-primary" style="width:100px">
                        <input type="submit" value="Update" name="btn" class="btn btn-primary" style="width:100px">
                    </center>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
