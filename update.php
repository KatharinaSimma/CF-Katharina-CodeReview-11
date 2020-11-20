<?php 
    require_once 'actions/db_connect.php';

    if ($_GET['id']) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM animal WHERE animal_id = {$id}" ;
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $conn->close();
    }
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



    <body>

        <nav>
            <?php include 'navbar.php'; ?>
        </nav>


        <main>
            <div class="container w-90 mb-4">

                <h1 class="text-info mt-4">Edit an Animal</h1>

                <form  action="actions/a_update.php" method="post">

                <div class="form-group row">
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="animal_name" placeholder="Name" value="<?php echo $row['animal_name']?>">
                        
                    </div>
                    <div class="form-group col-md-6">
                        <label>Type</label>
                        <input type="text" class="form-control" name="type" placeholder="Is it a crocodile?" value="<?= $row['type']?>">
                    </div>
                </div>



                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="size">Size of the animal</label>
                        <select name="size" id="size" class="form-control" value="<?= $row['size']?>">
                            <option value="small" selected>small</option>
                            <option value="large">large</option>
                        </select>
                    </div>

                    <div class="form-group col-md-4">
                        <label for="age">Age</label>
                        <input name="age" type="number" class="form-control" id="age" placeholder="Age" value="<?= $row['age']?>">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="image">Image</label>
                        <input name="image" type="text" class="form-control" id="image" placeholder="Image" value="<?= $row['image']?>">
                    </div>
                </div>


                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text text-info bg-white">Description</span>
                    </div>
                    <textarea name="description" class="form-control" aria-label="With textarea"><?= $row['description']?></textarea>
                </div>

                <div class="form-group">
                    <label for="location">Location</label>
                    <select name="location" id="location" class="form-control" value="<?= $row['fk_location_id']?>">
                        <option value="1" selected>Pets! Pets! Pets! in Vienna</option>
                        <option value="2">The Zoo in London</option>
                        <option value="3">Best Friends in Paris</option>
                    </select>
                </div>

        
                <input type="hidden" name= "animal_id" value="<?php echo $row['animal_id'] ;?>" />

                <button type="submit" name="submit" class="btn btn-info">Save Changes</button>

                <a href="admin.php"><button type="button" class="btn btn-info">Back to list</button></a>

                </form>



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