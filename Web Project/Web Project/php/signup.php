<!DOCTYPE html>

<head>
</head>

<body>
    <?php

    if ($db = mysqli_connect("localhost", "root", "12345678")) {

        mysqli_select_db($db, "booking");
        extract($_POST);

        $q = "select * from signup where username='$username'";
        $q2 = "select * from signup where email='$email'";

        $r = mysqli_query($db, $q);
        $r2 = mysqli_query($db, $q2);

        if (mysqli_num_rows($r) == 0) {

            if (mysqli_num_rows($r2) == 0) {

                if (preg_match("/([[:alnum:]]{6,10})/", $passwords)) {

                    if ($passwords == $confirm_password) {

                        $q3 = "INSERT INTO signup (username,email,passwords,confirm_password)
                         VALUES('$username','$email','$passwords','$confirm_password')";
                        mysqli_query($db, $q3);
                        header("location:../html/Homepage.html");

                    } else
                        die("<H1>PASSWORDS ARE DEFFERENTS (NO MATCH) !!</H1>");
                } else
                    die("<H1>THE PASSWORDS MUST CONTAINS 6-10 CHARACTERS !!</H1>");
            } else
                die("<H1>THIS EMAIL IS USED !!</H1>");
        } else
            die("<H1>THIS USERNAME IS ALREADY TAKEN !!</H1>");

        mysqli_close($db);
    } else
        die("Can't Complete this connection .. Check your inputs!!");
    ?>
</body>

</html>