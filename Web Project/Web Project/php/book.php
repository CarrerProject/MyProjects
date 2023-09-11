<!DOCTYPE html>

<head></head>

<body>

    <?php
    extract($_POST);

    if ($db = mysqli_connect("localhost", "root", "12345678")) {

        mysqli_select_db($db, "booking");

        $q1 = "select * from book where id='$cust_id'";
        $r = mysqli_query($db, $q1);

        if (mysqli_num_rows($r) == 0) {
            if ($arrivals > $leaving) {
                $q2 = "INSERT INTO book VALUES('$cust_id','$cust_name','$cust_email','$cust_address'
               ,'$hotel','$guests','$arrivals','$leaving')";
                mysqli_query($db, $q2);
                print("<script>alert('YOUR BOOK IS COMPLETED SUCESSFULLY')</script>");
                // header("location:../html/Booking.html");
            } else
                die("<h1>THE ARRIVALS DAY MUST BE AFTER LEAVING DAY !!</h1>");

        } else {
            die("<h1>YOU ALREADY HAVE BOOK THIS TRIP</h1>");
        }

        mysqli_close($db);
    } else
        die("<h1>Connection error</h1>");
    ?>

</body>

</html>