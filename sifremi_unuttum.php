<?php
    if(!empty($_POST["sifremiUnuttumButton"])){
        $conn = mysqli_connect("localhost", "root", "", "pinti");

        $condition = "";
        if(!empty($_POST["sifremiUnuttumEmail"])) {
            if(!empty($condition)) {
                $condition = " and ";
            }
            $condition = " email = '" . $_POST["sifremiUnuttumEmail"] . "'";
        }

        if(!empty($condition)) {
            $condition = " where " . $condition;
        }

        $sql = "Select * from users " . $condition;
        $result = mysqli_query($conn,$sql);
        $user = mysqli_fetch_array($result);

        if(!empty($user)) {
            require_once("forgot-password-recovery-mail.php");
        } else {
            $error_message = 'No User Found';
        }
    }
?>
<html>
<head>
    <title>?ifremi Unuttum</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        function validate_forgot() {
            if(document.getElementById("sifremiUnuttumEmail").value == "") {
                document.getElementById("validation-message").innerHTML = "Email giriniz!";
                return false;
            }
            return true
        }
    </script>
</head>
<body>
<h1>?ifremi Unuttum</h1>
<?php if(!empty($success_message)) { ?>
    <div class="success_message"><?php echo $success_message; ?></div>
<?php } ?>

<div id="validation-message">
    <?php if(!empty($error_message)) { ?>
        <?php echo $error_message; ?>
    <?php } ?>
</div>
<div class="authForm">
    <form method="post" id="sifremiUnuttumForm" onSubmit="return validate_forgot();>
        <table>
            <tr>
                <td><label>E-posta adresiniz:</label></td>
                <td><input class="sifremiUnuttumEmail" id="sifremiUnuttumEmail" type="email" name="email" placeholder="e-mail"></td>
                <td><input class="sifremiUnuttumButton" type="button" name="Gönder" id="sifremiUnuttumButton"></td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>
