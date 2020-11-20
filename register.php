<?php
    ob_start();
    session_start(); // start a new session or continues the previous

    if( isset($_SESSION['user'])!="" ){
        header("Location: index.php" ); // redirects to home.php
    }

    include_once './actions/db_connect.php';
    $error = false;

    if ( isset($_POST['btn-signup']) ) {

        $name = trim($_POST['user_name']);
        $name = strip_tags($name);
        $name = htmlspecialchars($name);

        $email = trim($_POST['email']);
        $email = strip_tags($email);
        $email = htmlspecialchars($email);

        $pass = trim($_POST['pass']);
        $pass = strip_tags($pass);
        $pass = htmlspecialchars($pass);
        
        if (empty($name)) {
            $error = true ;
            $nameError = "Please enter your full name.";
        } else if (strlen($name) < 3) {
            $error = true;
            $nameError = "Name must have at least 3 characters.";
        } else if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
            $error = true ;
            $nameError = "Name must contain alphabets and space.";
        }
        //basic email validation
        if ( !filter_var($email,FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $emailError = "Please enter valid email address." ;
        } else {
        // checks whether the email exists or not
            $query = "SELECT email FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            $count = mysqli_num_rows($result);

            if($count!=0){
                $error = true;
                $emailError = "Provided Email is already in use.";
            }
        }
        // password validation
        if (empty($pass)){
            $error = true;
            $passError = "Please enter password.";
        } else if(strlen($pass) < 6) {
            $error = true;
            $passError = "Password must have atleast 6 characters." ;
        }
        // password hashing for security
        $password = hash('sha256' , $pass);

        // if there's no error, continue to signup
        if( !$error ) {
            $query = "INSERT INTO users(`user_name`, `email`, `pass`) VALUES('$name','$email','$password')";
            $res = mysqli_query($conn, $query);
            
            if ($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                unset($name);
                unset($email);
                unset($pass);
            } else  {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later..." ;
            }
        }
    }
?>


<!DOCTYPE html>
<html>
    <head>
        <title>Login & Registration System</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>

    <body>
    <nav>
        <?php include 'navbar.php'; ?>
    </nav>
    <main>
    <div class="container w-50">
        <form  method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"  autocomplete="off" >
    
        <h2 class="text-info my-3">Register</h2>
 
            
        
        
            <input type="text" name="user_name" class ="form-control my-2" placeholder ="Enter Name" maxlength ="50" value = "<?php echo $name ?>"/>
            <span class="text-danger"> <?php echo $nameError;?> </span>
            
            <input type="email" name="email" class="form-control my-2" placeholder="Enter Your Email" maxlength="40" value = "<?php echo $email ?>"  />
            <span class="text-danger"> <?php echo $emailError;?> </span >

            <input type="password" name="pass" class="form-control my-2" placeholder="Enter Password" maxlength="15"  />
            <span class="text-danger"> <?php echo $passError;?> </span >
        
           
            
            <button type = "submit" class = "btn btn-block btn-info my-3" name = "btn-signup" >Sign Up</button >
            
            <?php
            if ( isset($errMSG) ) {
        ?>
                <div class="alert alert-<?php echo $errTyp?>">
                                    <?php echo  $errMSG;?>
                </div>
        <?php
            }
        ?>

            
            <a href = 'login.php' ><button type = "submit" class = "btn btn-block btn-info" name = "btn-signup" >Log in</button ></a>
    
    
        </form >

        </div>
        </main>



        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

    </body >
</html >
<?php  ob_end_flush(); ?>