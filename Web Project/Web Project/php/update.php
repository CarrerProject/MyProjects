<!DOCTYPE html>

<head></head>

<body>

    <?php

    if ($db = mysqli_connect("localhost", "root", "12345678")) {

        mysqli_select_db($db, "booking");
        extract($_POST);
        $q1 = "select * from book where id='$cust_id'";
        $r = mysqli_query($db, $q1);

        if (mysqli_num_rows($r) > 0) {
            if ($arrivals > $leaving) {

                if (
                    mysqli_query($db, "UPDATE book SET id='$cust_id' ,names='$cust_name'
                ,email='$cust_email' ,addresses='$cust_address' ,where_to='$hotel'
                ,how_many='$guests' ,arrivals='$arrivals' ,leaving='$leaving' where id='$cust_id' ")
                ) {
                    print("<script>alert('YOUR BOOK IS UPDATED SUCESSFULLY')</script>");
                } else
                    die("error");

                // print("<script>alert('YOUR BOOK IS UPDATED SUCESSFULLY')</script>");
                // header("location:../html/Booking.html");
            } else
                die("<h1>THE ARRIVALS DAY MUST BE AFTER LEAVING DAY !!</h1>");
        } else {
            die("<h1>The Information you entered is not correct!!</h1>");

        }

        mysqli_close($db);
    } else
        die("<h1>Connection error</h1>");
    ?>

</body>

</html>