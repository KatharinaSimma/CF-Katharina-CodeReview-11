<?php 
    require_once 'db_connect.php';
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
   <title>Edit Media</title>

</head>



<body class="bg-light">

    <nav>
        <?php include '../navbar.php'; ?>
    </nav>

<main class="container">

<?php
if ($_POST) {
    $animal_name = $_POST['animal_name'];
    $type = $_POST['type'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $image = $_POST[ 'image'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $id = $_POST['animal_id'];

    $sql = "UPDATE animal
        SET 
            `animal_name` = '$animal_name',
            `type` = '$type',
            `size` = '$size',
            `age` = '$age',
            `image` = '$image',
            `description` = '$description',
            `fk_location_id` = '$location'
        WHERE animal_id = {$id}";
    

    if($conn->query($sql) === TRUE) {
        echo "<h2 class='text-info mt-4'>The animal was successfully updated! </h2>";
        echo "<a href='../update.php?id=" .$id."'><button type='button' class='btn btn-info mr-2'>Back to Editing</button></a>";
        echo "<a href='../index.php'><button type='button' class='btn btn-info my-4'>Home</button></a>";
    } else {
            echo "Error while updating record : ". $conn->error;
    }

    $conn->close();

}

?>

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