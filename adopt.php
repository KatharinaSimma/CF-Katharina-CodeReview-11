<?php 
    ob_start();
    session_start();
    require_once 'actions/db_connect.php';
    
    //if session is not set this will redirect to login page
    if(!isset($_SESSION['user'])){
        header("Location: login.php");
        exit;
    }
    
    // select logged-in users details
    $res=mysqli_query($conn, "SELECT * FROM users WHERE user_id =".$_SESSION['user']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <title>Pet Adoption</title>
    </head>


    <body class="container.fluid bg-light">
        <nav>
            <?php include 'navbar.php'; ?>
        </nav>



        <main>
            <div class="container w-90 mb-4">

                <p class="text-info mt-1"> Hi <?php echo $userRow['email' ]; ?>
                    <a href= "logout.php?logout"><button type="button" class='btn btn-info'>Log out</button></a>
                </p>

                <h1 class="text-info mt-4">Welcome to Adopt an Animal</h1>
                <p class="text-muted">Your favorite site to adopt weird animals</p>

                <div >
                    <h2 class="text-info my-5">What would you like to do?</h2>
                    <a href="login.php"><button type="button" class='btn btn-info'>Log in</button></a>
                    <a href="register.php"><button type="button" class='btn btn-info'>Register an account</button></a>
                </div>

               <br>

                <h2 class="text-info my-4">Browse through our animals</h2>
                <!-- filter buttons -->
                <div>
                    <a href="?"><button type="button" class='btn btn-info'>show all animals</button></a>
                    <a href="?filter=small"><button type="button" class='btn btn-info'>show small only</button></a>
                    <a href="?filter=large"><button type="button" class='btn btn-info'>show large only</button></a>
                    <a href="?filter=senior"><button type="button" class='btn btn-info'>show senior only</button></a>
                </div>

                <div class="row mt-4">
                    <?php
                        $sql = "SELECT * FROM animal";

                        // modify query if filter is set, each if statement appends the query.
                        if (isset($_GET["filter"])) {
                            //echo $_GET["filter"];
                            $filter = $_GET["filter"];
                            if ( $filter === 'small') $sql .= " WHERE size = 'small'";
                            elseif ( $filter === 'large') $sql .= " WHERE size = 'large'";
                            elseif ( $filter === 'senior') $sql .= " WHERE age > 8";
                        }                        

                        $result = $conn->query($sql);

                        if($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()){
                                ?>
                                    <div class='card col-md-6 col-lg-4 border-0 rounded-0 bg-light'>
                                        <img src="<?= $row['image'] ?>" class='card-img-top w-100'>
                                        <div class='card-body'>
                                            <h5 class='card-title'><?= $row['animal_name'] ?></h5>

                                            <span class='text-muted'> <?= $row['type'] ?></span>
                                            <span class="badge badge-info badge-pill float-right"><?= $row['size'] ?></span>
                                            <?php 
                                                if ($row['age'] > 8){ ?>
                                                    <span class='badge badge-info badge-pill float-right mr-1'> Senior </span>
                                                <?php }
                                            ?>
                                            <p class='card-text bg-light'>
                                                <p>Age: <?= $row['age'] ?></p>
                                                <p><?= $row['description'] ?></p>
                                            </p>
                                            <a href="#"><button type="button" class='btn btn-info'>Adopt</button></a>
                                        </div>
                                    </div>
                                <?php
                            }
                        } else  {
                            echo  "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";
                        }
                    ?>
                </div>
            </div>
        </main>

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        </script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
        </script>

    </body>
</html>