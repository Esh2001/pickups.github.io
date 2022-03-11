<?php 
    /*Session Start*/
    session_start();
    if (empty($_SESSION['session_error'])){
        $_SESSION['session_error'] = '';
    }

    /* Check is Submit Button Pressed*/
    if (isset($_POST['submit'])){

        /* Check is Input Empty */
        if (empty($_POST['fname'])){

            /* Session Error */
            $_SESSION['session_error'] = 'Please Enter First Name';

            /* Redirect Back */
            header('Location: /reservation.php');
            
            /* Stop Running Code */
            die();
            /*  Other Methods
                return
                exit(); */
        }
        if (empty($_POST['lname'])){
            $_SESSION['session_error'] = 'Please Enter Last Name';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['email'])){
            $_SESSION['session_error'] = 'Please Enter Your Email';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['phone'])){
            $_SESSION['session_error'] = 'Please Enter Your Phone Number';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['date'])){
            $_SESSION['session_error'] = 'Please Select a Date';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['venue'])){
            $_SESSION['session_error'] = 'Please Enter The Venue';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['rad'])){
            $_SESSION['session_error'] = 'Please Enter Select a Type';
            header('Location: /reservation.php');
            die();
        }
        if (empty($_POST['message'])){
            $_SESSION['session_error'] = 'Please Enter Your Message';
            header('Location: /reservation.php');
            die();
        }
        
        /* SQL Database Connection */ 
        $connection = new mysqli('localhost', 'root', '', 'recervation' );

        /*SQL Validation for Strings */
        $fname = $connection->real_escape_string($_POST['fname']) ;
        $lname = $connection->real_escape_string($_POST['lname']) ;
        $email = $connection->real_escape_string($_POST['email']) ;
        $phone = $connection->real_escape_string($_POST['phone']) ;
        $date = $connection->real_escape_string($_POST['date']) ;
        $venue = $connection->real_escape_string($_POST['venue']) ;
        $rad = $connection->real_escape_string($_POST['rad']) ;
        $message = $connection->real_escape_string($_POST['message']) ;

        /* SQL Data Insert */
        $sql = "INSERT INTO `reservation_information`(`ID`, `firstname`, `lastname`, `email`, `phonenumber`, `date`, `venu`, `type`, `message`) VALUES (NULL,'$fname','$lname','$email','$phone', '$date', '$venue','$rad','$message')";

        /* Exicute*/
        if($connection->query($sql)){
            $_SESSION['session_error'] = 'Success';
        }
        else{
            $_SESSION['session_error'] = 'Somthing Went Wrong';
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
    <title>About Page</title>

    <script>
        function validationform2()

        {
            fname=document.pkgform.fname.value.length;
            lname=document.pkgform.lname.value.length;
            email=document.pkgform.email.value.length;
            phone=document.pkgform.phone.value.length;
            date = document.pkgform.date.value.length;
            venue=document.pkgform.venue.value.length;
            category=document.pkgform.Category.value;
            textarea=document.pkgform.textarea.length;    

            if(fname<1 || lname<1 || email<1 || phone<1 || textarea<1 || date<1 || venue<1)

            {
                alert("Input is Empty - Please Type On The Relevant Field.");
                return;
            }
            mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if(!(document.pkgform.email.value.match(mailformat)))
            {
                alert("You have entered an invalid email ");
                document.pkgform.email.focus();
                return;
            }

            if(phone != 10 || isNaN(document.pkgform.phone.value))
            {
                alert("Phone Number Error: All the characters should be numbers and length should be 10");
                return;
            }
            if(!document.pkgform.Category[0].checked && !document.pkgform.Category[1].checked && !document.pkgform.Category[2].checked && !document.pkgform.Category[3].checked && !document.pkgform.Category[4].checked )
            {
                alert("Error: Select your Category");
                return;
            }
        }


    </script> 

</head>
<body>
    <section class="sub-header3">
        <nav>
            <a href="index.html"><img src="images/LOGO Black Background.jpg" alt="logo"></a>
            <div class="nav-links" id="navLinks">
                <i class="fa fa-times" onclick="hideMenu()"></i>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="about.html">ABOUT</a></li>
                    <li><a href="packages.html">PACKAGES</a></li>
                    <li><a href="content.html">CONTENT</a></li>
                    <li><a href="reservation.php">RESERVATION</a></li>
                </ul>
            </div>
            <i class="fa fa-bars" onclick="showMenu()"></i>
        </nav>
        <h1>RESERVATION</h1>
    </section>

<!--validation-->
  
<div style="position:relative; margin-left: 10%; margin-right: 10%; "  >
    <div class = "contact-form">
        <a name ="section4"></a>
        <h2 style="text-align: center;" >Proceed to Reservation </h2>
        <div>
            <!-- User Your HTML & CSS Skills To Style This Error or Success Mesage 😉 -->
            <p> <?php echo $_SESSION['session_error'] ?></p>
        </div>
        <form name="pkgform" action = "#" method="POST" >
            <div>
                <input type = "text" class = "form-control" placeholder="First Name" name="fname">
                <input type = "text" class = "form-control" placeholder="Last Name" name="lname">
            </div>
            <div>
                <input type = "email" class = "form-control" placeholder="E-mail" name="email">
                <input type = "text" class = "form-control" placeholder="Phone" name="phone">
                <input type = "date" class = "form-control" name="date">
                <input type = "text" class = "form-control" placeholder="Venue" name="venue"> 
                
                <div>
                    <ul>
                        <li>
                            <input onclick="radioButton(this.value)" class="radioClass" id="r1d" type="radio" name="radiod" value="party" >
                            <label for="r1d">PARTY</label> <br>

                            <input onclick="radioButton(this.value)" class="radioClass" id="r2d" type="radio" name="radiod" value="wedding" >
                            <label for="r2d">WEDDING</label> <br>

                            <input onclick="radioButton(this.value)" class="radioClass" id="r3d" type="radio" name="radiod" value="concert" >
                            <label for="r3d">CONCERT</label> <br>

                            <input onclick="radioButton(this.value)" class="radioClass" id="r4d" type="radio" name="radiod" value="others" >
                            <label for="r4d">OTHERS</label>

                            <input type="hidden" name="rad" id="rad" value="">
                        </li>
                    </ul>
                </div>                        
            </div>
            <textarea rows = "5" placeholder="Message" class = "form-control" name="message"></textarea>
            <input type = "submit" class = "send-btn" value = "Confirm Request" name="submit" onclick="validationform2()">
        </form>
    </div>
</div>

<!--JavaScript for Toggle menu-->
<script>
    var navLinks = document.getElementById("navLinks");
    function showMenu(){
        navLinks.style.right = "0";
    }
    function hideMenu(){
        navLinks.style.right = "-200px";
    }
</script>

<script>
    function radioButton(radio){
       document.getElementById('rad').value = radio;
    }
</script>

<?php  
    if (isset($_SESSION['session_error'])){
        unset($_SESSION['session_error']);
    } 
?>

</body>
</html>