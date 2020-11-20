<?php 
    require_once 'db_connect.php';

    if ($_POST) {
        $animal_name = $_POST['animal_name'];
        $type = $_POST['type'];
        $size = $_POST['size'];
        $age = $_POST['age'];
        $image = $_POST[ 'image']; // if image left empty, it's an empty string which prevents the default image --> solution below
        $description = $_POST['description'];
        $location = $_POST['location'];

        $sql = "INSERT INTO `animal`(
            `animal_name`,
            `type`,
            `size`,
            `age`,";
        if ($image) $sql .= "`image`,"; // if string is not empty add image column (no column no string ;-)
        $sql .= "
            `description`,
            `fk_location_id`
        )
        VALUES(
            '$animal_name',
            '$type',
            '$size',
            '$age',";
        if ($image) $sql .= "'$image'"; // // if string is not empty add image value
        $sql .= "
            '$description',
            '$location'
        )";
                
            if($conn->query($sql) === TRUE) {
                echo "<p>New Record Successfully Created</p>" ;
                echo "<a href='../create.php'><button type='button'>Back</button></a>";
                    echo "<a href='../index.php'><button type='button'>Home</button></a>";
            } else {
                echo "Error " . $sql . ' ' . $conn->connect_error;
            }

        $conn->close();
    }

?>