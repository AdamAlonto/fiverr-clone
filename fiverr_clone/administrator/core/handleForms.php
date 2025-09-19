<?php
require_once 'E:/xampp/htdocs/fiverr_clone/administrator/classloader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['form_type'])) {
        if ($_POST['form_type'] === 'add_category') {
            $category_name = $_POST['category_name'];
            if ($categoryObj->createCategory($category_name)) {
                header('Location: ../manage_categories.php');
            } else {
                echo 'Error adding category.';
            }
        } elseif ($_POST['form_type'] === 'add_subcategory') {
            $category_id = $_POST['category_id'];
            $subcategory_name = $_POST['subcategory_name'];
            if ($subcategoryObj->createSubcategory($category_id, $subcategory_name)) {
                header('Location: ../manage_categories.php');
            } else {
                echo 'Error adding subcategory.';
            }
        } elseif ($_POST['form_type'] === 'login_admin') {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);

            if (!empty($email) && !empty($password)) {

                if ($userObj->loginUser($email, $password, 'admin')) {
                    header("Location: ../manage_categories.php");
                } else {
                    $_SESSION['message'] = "Username/password invalid or you are not an admin";
                    $_SESSION['status'] = "400";
                    header("Location: ../login.php");
                }
            } else {
                $_SESSION['message'] = "Please make sure there are no empty input fields";
                $_SESSION['status'] = '400';
                header("Location: ../login.php");
            }
        } elseif ($_POST['form_type'] === 'register_admin') {
            
            $username = htmlspecialchars(trim($_POST['username']));
            $email = htmlspecialchars(trim($_POST['email']));
            $contact_number = htmlspecialchars(trim($_POST['contact_number']));
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);
            $role = trim($_POST['role']);

            if (!empty($username) && !empty($email) && !empty($password) && !empty($confirm_password)) {

                if ($password == $confirm_password) {

                    if (!$userObj->usernameExists($username)) {

                        if ($userObj->registerUser($username, $email, $password, $contact_number, 0, $role)) {
                            header("Location: ../login.php");
                        } else {
                            $_SESSION['message'] = "An error occured with the query!";
                            $_SESSION['status'] = '400';
                            header("Location: ../register.php");
                        }
                    } else {
                        $_SESSION['message'] = $username . " as username is already taken";
                        $_SESSION['status'] = '400';
                        header("Location: ../register.php");
                    }
                } else {
                    $_SESSION['message'] = "Please make sure both passwords are equal";
                    $_SESSION['status'] = '400';
                    header("Location: ../register.php");
                }
            } else {
                $_SESSION['message'] = "Please make sure there are no empty input fields";
                $_SESSION['status'] = '400';
                header("Location: ../register.php");
            }
        }
    }
}
?>