<?php
include("../Assets/Connection/Connection.php");
session_start();
if (isset($_POST["btn_submit"])) {
    $email = $_POST["txt_email"];
    $squestion = $_POST["selQuestion"];
    $sanswer = $_POST["txt_answer"];

    $selUser = "select * from tbl_user where User_email = '".$email."' and user_squestion = '".$squestion."' and user_sanswer = '".$sanswer."'";

    $result1 = $con->query($selUser);

    if ($dataUser = $result1->fetch_assoc()) {
?>  
        <script>
        window.location = 'ChangePassword.php?cid=<?php echo $dataUser["User_id"] ?>';
        </script>;
<?php
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Forgot Password</title>
    <!-- Link to Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            margin-top: 50px;
            font-family: 'Lobster', cursive; /* Apply stylish Lobster font */
            font-size: 42px; /* Increase size for a more impactful look */
            font-weight: normal;
        }
        form {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: 50px auto;
        }
        table {
            width: 100%;
        }
        table td {
            padding: 10px;
            font-size: 14px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Forgot Password</h1>
    <form id="form1" name="form1" method="post" action="">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="text" name="txt_email" id="txt_email" /></td>
            </tr>
            <tr>
                <td>Security Question</td>
                <td>
                    <select name="selQuestion" id="selQuestion">
                        <option value="">---Select Security Question---</option>
                        <option value="What is your favourite color?">What is your favourite color?</option>
                        <option value="What is your favourite food?">What is your favourite food?</option>
                        <option value="What is your favourite movie?">What is your favourite movie?</option>
                        <option value="What is your favourite book?">What is your favourite book?</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Security Answer</td>
                <td><input type="text" name="txt_answer" id="txt_answer" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
