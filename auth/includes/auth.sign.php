<?php
    // check for restricted url access
    if (isset($_POST['auth-login'])) {
        // //connection
        // global $con;
        include ("/var/www/html/online_art_gallery/auth/access/access_art.php");

        // $con = mysqli_connect("", "root", "", "online_art_gallery");
        $con = mysqli_connect($server, $user, $pass, $db);
        unset($server, $user, $pass, $db);
        

        //checking con
        if(mysqli_connect_errno()){
            echo "Error in connection Please check the connection" . mysqli_connect_errno();
        }

        //short vars
        $username = $_POST['auth_username'];
        $userpassword = $_POST['auth_password'];

        //E1 - EMPTY FIELDS
        if (empty($username) || empty($userpassword)) {
            header("Location: /online_art_gallery/auth/index.php?error=emptyfields");
            exit();
        }
        //v1 - AUTH
        else {
            //SQL
            $sql = 'SELECT * FROM auth_user WHERE auth_username=?';

            //STMT INIT
            $stmt = mysqli_stmt_init($con);

            //CONNECT VERIFICATION
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: /online_art_gallery/auth/index.php?error=sqlerror0");
                exit();
            }
            else {
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                //get results into a var
                $result = mysqli_stmt_get_result($stmt);


                //Fetch row
                if ($row = mysqli_fetch_assoc($result)) {
                    //checking password
                    $passwdCheck = password_verify($userpassword, $row['auth_password']);

                    //checking password verification
                    if ($passwdCheck == false) {
                        header("Location: /online_art_gallery/auth/index.php?error=wrongpwd");
                        exit();
                    }
                    elseif ($passwdCheck == true) {
                        //CREATE SESSION
                        session_start();
                        
                        //STORE admin_id and admin_username as SESSION VALUES
                        $_SESSION['auth_id'] = $row['auth_id'];
                        $_SESSION['auth_name'] = $row['auth_name'];
                        $_SESSION['auth_access'] = $row['user_level_id'];

                        // set login to show logged in.
                        $_SESSION[login]=1;

                        //redirect to dashboard 
                        header("Location: /online_art_gallery/auth/dashboard/index.php");
                        exit();
                    }
                    //safe securing loop
                    else {
                        header("Location: /online_art_gallery/auth/index.php?error=wrongpwd1");
                        exit();
                    }
                }
                //NO USER
                else {
                    header("Location: /online_art_gallery/auth/index.php?error=nouser");
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($con);
    }
    else {
        header("Location: /online_art_gallery/auth/index.php?error=accessdenied");
        exit();
    }