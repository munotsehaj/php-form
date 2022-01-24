<?php
    if(isset($_POST['submit']))
    {
        $lname = $_POST['lname'];
        $fname = $_POST['fname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $host = "localhost:3308";
        $username = "formdb_user";
        $password = "abc123";
        $dbname = "form_entriesdb";

        //create connection
        $con = mysqli_connect($host, $username, $password, $dbname);
        //check connection if it is working or not
        if (!$con)
        {
            die("Connection failed!" . mysqli_connect_error());
        }
        //This below line is a code to Send form entries to database
        $sql = "INSERT INTO contactform_entries (lastname_fid, firstname_fid, phone_fid, addressl1_fid, city_fid, state_fid, zip_fid) VALUES ('$lname', '$fname', '$phone', '$address', '$city', '$state', '$zip')";
      //fire query to save entries and check it with if statement
        $rs = mysqli_query($con, $sql);
        if($rs)
        {
            echo "Successfully saved";
        }
      //connection closed.
        mysqli_close($con);
    }
?>