<!-- PHP -->
<?php
    include( 'config\db_connect.php' );

    $title = $description = '';
    $errors = array('title' => '', 'description' => '');

    if (isset($_POST['submit'])) {
	    if (!(array_filter($errors))) {
            $title = mysqli_real_escape_string($conn , $_POST['title']);
            $description = mysqli_real_escape_string($conn , $_POST['description']);

            $sql = "INSERT INTO `todo` (`title`, `description`) VALUES( '$title' , '$description' )";

            if(mysqli_query($conn, $sql)){
                header('Location: index.php');
            } else{
                echo 'Query Error: ' . mysqli_error($conn);
            }
	    }	
    }
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">

<!-- Header and CSS -->
<link rel="stylesheet" href="styles\style.css">
<?php include('./templates/header.php'); ?>

    <!-- Main -->
    <main>
        <div class="form-container">
            <form action="create.php" method="POST">
                <label for="title">Title</label>
                <input type="text" name="title" placeholder="Task Title" required>
                <label for="description">Description</label>
                <textarea name="description" placeholder="Task Description" required></textarea>
                <button type="submit" name="submit">Save</button>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php include('./templates/footer.php'); ?>

</body>

</html>