<!DOCTYPE html>

<head>
</head>

<body>
    <?php

    extract($_POST);

    if ($db = mysqli_connect("localhost", "root", "12345678")) {
        mysqli_select_db($db, "booking");

        $q = "select * from signup where username='$username' and passwords='$passwords'";
        $r = mysqli_query($db, $q);

        if (mysqli_num_rows($r) > 0) {
            header("location:../html/Main.html");
        } else
            die("<h1>Wrong Password or Username</h1>");


        mysqli_close($db);
    } else
        die("Can't Complete this connection .. Check your inputs!!");
    ?>
</body>

</html>