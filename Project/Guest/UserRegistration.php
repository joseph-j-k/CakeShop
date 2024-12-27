
<?php include("../Assets/Connection/Connection.php"); ?>
<?php
if(isset($_POST["btn_submit"]))
{
  $place=$_POST["selPlace"];
  $name=$_POST["txt_name"];
  $gender=$_POST["gender"];
  $dob=$_POST["txt_dob"];
  $contact=$_POST["txt_contact"];
  $email=$_POST["txt_email"];
  $address = $_POST["txt_address"];
  $password=$_POST["txt_password"];
  $photo=$_FILES["photo"]["name"];
  $temp=$_FILES["photo"]["tmp_name"];
   move_uploaded_file($temp,'../Assets/File/User/' .$photo);
  $question=$_POST["selQuestion"]; 
  $answer=$_POST["txt_answer"];
 
 $insQry="insert into tbl_user(User_name,User_gender,User_dob,User_contact,
 User_email,User_password,User_photo,place_id,User_address,user_squestion,user_sanswer)values('".$name."','".$gender."','".$dob."','".$contact."','".$email."','".$password."','".$photo."','".$place."','". $address."','".$question."','". $answer."')";
 if($con -> query($insQry))
 {
  echo"<script>
  alert('Inserted');
  window.location='UserRegistration.php';
  </script>";
 }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cake E-Commerce Registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            background-image: url('https://images.pexels.com/photos/1857157/pexels-photo-1857157.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        .container {
            width: 90%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1 {
            font-family: 'Arial', sans-serif;
            font-weight: bold;
            color: #ff6f61;
            text-align: center;
            font-size: 2.5rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input[type="text"], 
        .form-group input[type="password"],
        .form-group select, 
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ff6f61;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #ffffff;
        }

        .form-group select {
            background-color: #ffffff;
            border: 1px solid #ff6f61;
            padding: 10px;
            border-radius: 4px;
            appearance: none;
            background: #ffffff url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMiIgaGVpZ2h0PSIxMiI+PHBhdGggZmlsbD0ibm9uZSIgZD0iTTAgMEwgMTIgMTIgMEwgMCAwIi8+PC9zdmc+');
            background-repeat: no-repeat;
            background-position: right 10px center;
            font-size: 16px;
            color: #333;
        }

        .form-group select:focus {
            border-color: #ff6f61;
            outline: none;
        }

        .form-group input[type="radio"] {
            display: none;
        }

        .form-group .radio-group {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .form-group .radio-group label {
            display: flex;
            align-items: center;
            margin: 0 10px 0 0;
            cursor: pointer;
        }

        .form-group .radio-group input[type="radio"] + span {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 2px solid #ff6f61;
            border-radius: 50%;
            margin-right: 10px;
            position: relative;
            transition: background 0.3s ease;
        }

        .form-group .radio-group input[type="radio"]:checked + span {
            background: #ff6f61;
        }

        .form-group .radio-group input[type="radio"]:checked + span::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 12px;
            height: 12px;
            background: #ffffff;
            border-radius: 50%;
            transform: translate(-50%, -50%);
        }

        .form-buttons {
            text-align: center;
        }

        .form-buttons input[type="submit"], 
        .form-buttons input[type="reset"],
        .form-buttons .btn-back {
            background-color: #ff6f61;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 0 10px;
        }

        .form-buttons input[type="submit"]:hover, 
        .form-buttons input[type="reset"]:hover,
        .form-buttons .btn-back:hover{
            background-color: #e55b4f;
        }

        .form-group textarea {
            width: 100%; /* Make textarea responsive */
            padding: 10px;
            border: 1px solid #ff6f61;
            border-radius: 4px;
            background-color: #ffffff;
            box-sizing: border-box;
            resize: vertical; /* Allow vertical resizing only */
        }

        @media (max-width: 600px) {
            .form-buttons {
                display: flex;
                flex-direction: column;
            }
            .form-buttons input[type="submit"], 
            .form-buttons input[type="reset"]
            {
                width: 100%;
                margin-bottom: 10px;
            }
            .form-group {
                margin-bottom: 20px;
            }
        }

        /* Enhanced styles for file upload input */
        .file-upload-wrapper {
            display: flex;
            align-items: center;
            position: relative;
            border: 1px solid #ff6f61; /* Match the border color of text boxes */
            border-radius: 4px;
            padding: 10px;
            background-color: #ffffff; /* Ensure background color matches text boxes */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            overflow: hidden;
            text-align: center;
        }

        .file-upload-wrapper::before {
            content: 'Choose a photo';
            font-size: 16px;
            color: #ff6f61;
            display: block;
            width: 100%;
        }

        .file-upload-wrapper:hover {
            border-color: #e55b4f; /* Slightly darker on hover, matching button hover */
        }

        .file-upload-wrapper input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-upload-preview {
            max-width: 100%;
            border-radius: 4px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Register for Delicious Cakes!</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <select name="selDistrict" id="selDistrict" onChange="getPlace(this.value)">
                    <option value="">Select District</option>
                    <?php
                    // Assuming $con is your database connection
                    $sel = "SELECT * FROM tbl_district";
                    $result = $con->query($sel);
                    while ($data = $result->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $data['district_id']; ?>">
                            <?php echo $data['district_name']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <select name="selPlace" id="selPlace">
                    <option value="">Select Place</option>
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="txt_name" id="txt_name" placeholder="Enter your Name" required autocomplete="off" />
            </div>
            <div class="form-group">
                <div class="radio-group">
                    <label for="gender_male">
                        <input type="radio" name="gender" id="gender_male" value="Male" />
                        <span></span> Male
                    </label>
                    <label for="gender_female">
                        <input type="radio" name="gender" id="gender_female" value="Female" />
                        <span></span> Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="txt_dob" id="txt_dob" placeholder="DD-MM-YYYY"  required autocomplete="off"/>
            </div>
            <div class="form-group">
                <input type="text" name="txt_contact" id="txt_contact" placeholder="Enter your Contact" required pattern="[0-9]{10,10}" autocomplete="off" />
            </div>
            <div class="form-group">
                <input type="text" name="txt_email" id="txt_email" placeholder="Enter your Email"  required autocomplete="off"/>
            </div>
            <div class="form-group">
                <textarea name="txt_address" id="txt_address" style="height:100px; width:100%;" placeholder="Enter your Address" required autocomplete="off"></textarea>
            </div>
            <div class="form-group">
                <input type="text" name="txt_password" id="txt_password" placeholder="Enter your Password" required autocomplete="off" pattern="[0-9a-zA-Z!@#$%^&*]{8,}"/>
            </div>
            <div class="form-group">
                <div class="file-upload-wrapper">
                    <input type="file" name="photo" id="photo" required autocomplete="off"/>
                </div>
                <div id="file-preview"></div>
            </div>
            <div class="form-group">
                <select name="selQuestion" id="selQuestion">
                    <option value="">---Security Question----</option>
                    <option value="What is your favourite color?">What is your favourite color?</option>
                    <option value="What is your favourite movie?">What is your favourite food?</option>
                    <option value="What is your favourite movie?">What is your favourite movie?</option>
                    <option value="What is your favourite book?">What is your favourite book?</option></select>
            </div>
            <div class="form-group">
                <input type="text" name="txt_answer" id="txt_answer" placeholder="Enter your Answer"  required autocomplete="off"/>
            </div>

            <div class="form-buttons">
                <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" />
                <a href="../index.php" class="btn-back">Back</a>
            </div>
        </form>
    </div>
<script src="../Assets/JQ/jQuery.js"></script>
<script>
  function getPlace(did) {
    $.ajax({
      url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
      success: function (html) {

        $("#selPlace").html(html);
      }
    });
  }

</script>
</body>
</html>