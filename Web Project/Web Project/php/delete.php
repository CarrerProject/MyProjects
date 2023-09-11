<!DOCTYPE html>

<head></head>

<body>

    <?php
    extract($_POST);

    if ($db = mysqli_connect("localhost", "root", "12345678")) {

        mysqli_select_db($db, "booking");

        $q1 = "select * from book where id='$cust_id'";
        $r = mysqli_query($db, $q1);

        if (mysqli_num_rows($r) > 0) {
            mysqli_query($db, "DELETE FROM book where id='$cust_id'");
            print("<script>alert('YOUR BOOK IS DELETED SUCESSFULLY')</script>");
            // header('location:../html/Booking.html');
        } else
            die("<h1>THERE IS NO BOOKS FOR THIS ID</h1>");

        mysqli_close($db);
    } else
        die("<h1>Connection error</h1>");
    ?>

</body>

</html>