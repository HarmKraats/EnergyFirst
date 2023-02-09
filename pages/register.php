<?php
require_once '../includes/autoload.php';
$page = 'Register';
$db = getDB();


// Register a new user and check if the email is already in use 
if (isset($_POST['submit'])) {
    $email = $_POST['email'] ?? '';
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    $password_confirm = $_POST['password_confirm'] ?? '';
    
    $errors = [];
    
    if (empty($email)) {
        $errors[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }
    
    if (empty($password_confirm)) {
        $errors[] = "Password confirmation is required.";
    } elseif ($password !== $password_confirm) {
        $errors[] = "Passwords do not match.";
    }
    
    if (count($errors) > 0) {
        // flash('register', $errors, 'danger');
        return;
    }
    
    // put errors in session
    $_SESSION['errors'] = $errors;
    
    
    // Check if the email is already in use
    $what = array('id', 'email');
    $users = getFromDB($what, 'users', 'email = "' . $email . '"');

    // If the email is already in use, show an error message
    if (count($users) > 0) {
        // flash('register', 'Deze email is al in gebruik', 'danger');
    } else {
        // If the email is not in use, register the user
        if ($password == $password_confirm) {
            try {
                $hassed = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
                $stmt = $db->prepare($sql);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $hassed);
                $stmt->execute();
                
                // Make a folder for the user in the uploads folder
                $user_id = $db->lastInsertId();
                
                $what = array('id', 'email', 'password');
                $users = getFromDB($what, 'users', 'email = "' . $email . '"');
                $user = $users[0];
                
                $_SESSION['user'] = $user;
                // flash('register', 'Je account is aangemaakt', 'success');
                
                header('Location: euro');
            } catch (PDOException $e) {
                echo 'Error met registreren: ' . $e->getMessage();
            }
        } else {
            // flash('register', 'De wachtwoorden komen niet overeen', 'danger');
        }
    }
}


require_once '../templates/header.php';
?>

<div class="content" id="main-content">
    <div class="container " id="content-wrap">
        <div class="container">
            
            <div class="row mt-5">
                <div class="col-3"></div>
                <div class="col-6">
                    <form method="post" action="register">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email adres:</label>
                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Wachtwoord:</label>
                            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword2" class="form-label">Vul je wachtwoord nog een keer in:</label>
                            <input name="password_confirm" type="password" class="form-control" id="exampleInputPassword2">
                        </div>
                        <div class="mb-3">
                            <small class="form-text text-muted">Heb je al een account? Log dan <a href="login">hier</a> direct in!</small>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Registreer</button>
                    </form>
                </div>
                <div class="col-3"></div>
            </div>

            <div class="row">
                <div class="col-3"></div>
                <div class="col-6 d-flex flex-row-reverse">
                    <div class="form-text">
                        <a href="home" class="btn btn-secondary">
                            < Terug naar de homepagina</a>
                    </div>
                </div>
                <div class="col-3"></div>
            </div>
        </div>




    </div>
</div>



<?php
require_once '../templates/footer.php';
?>
