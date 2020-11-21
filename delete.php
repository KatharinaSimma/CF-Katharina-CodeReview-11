<?php 
    ob_start();
    session_start();
    require_once 'actions/db_connect.php';

    // if session is not set this will redirect to login page
    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
        exit;
    }
    $res=mysqli_query($conn, "SELECT * FROM users WHERE user_id =".$_SESSION['admin']);
    $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);


    if ($_GET['id']) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM animal WHERE animal_id = {$id}" ;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $conn->close();
    };
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <title>Delete Animal</title>
</head>

<body class="bg-light">
    <nav>
        <?php include 'navbar.php'; ?>
    </nav>


    <main class="container">

    <span class="text-info mt-3"> <?php echo $userRow['email' ]; ?>
                        <a href= "logout.php?logout"><button type="button" class='btn btn-info'>Log out</button></a>
                    </span>

        <h2 class='text-info mt-4'>Do you really want to delete this Animal?</h2>

        <form action ="actions/a_delete.php" method="post">

            <input type="hidden" name= "animal_id" value="<?php echo $row['animal_id'] ;?>" />
            <button type="submit" class='btn btn-danger mr-2'>Yes, delete it!</button >
            <a href="admin.php"><button type="button" class='btn btn-info my-4'>No, go back!</button ></a>
        </form>

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


</body>
</html>

