<?php

        include("config.php");


        $to = $_POST['email'];
        $sql = "ALTER something where email=$to ";
        $result = mysqli_query($db, $sql);
        $from = "whatever@email.com";
        $subject = "Marvel Marks Password Reset";
        $headers = "From: $from";
        $msg = "
                You can reset your password by clicking this link with this temporary password: randomlyGeneratePassword
                
                If you did not cause this message to be sent, please contact the administrator."

        $ok = @mail($to, $subject, $msg, $heaxers, "-f".$from);



?>
