<?php 
    session_start();
    //echo session_id();
    if (!empty($_GET['error'])){
        echo "<p><b>".$_GET['error']."</b></p>";
    }
?>
<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Strona Główna</title>
</head>
<body>
    <header id="main_header">
        <?php require("./modules/account_menu.php"); ?>
    </header>
    <main>
        <?php 
            require("./modules/view_products.php");

            if (isset($_SESSION['type'])){
                $user_type = $_SESSION['type'];
                if (strtolower($user_type) == 'admin'){
                    require("./modules/view_customers.php"); 
                    require("./modules/view_employees.php");
                    require("./modules/add_product_form.php");
                    require("./modules/add_customer_form.php");
                    require("./modules/add_employee_form.php");
                    require("./modules/delete_product_form.php");
                    require("./modules/delete_customer_form.php");
                    require("./modules/edit_customer_form.php");
                    require("./modules/edit_product_form.php");
                    require("./modules/view_history.php");

                } else if (strtolower($user_type) == 'pracownik'){
                    require("./modules/view_customers.php"); 
                    require("./modules/add_product_form.php");
                    require("./modules/add_customer_form.php");
                    require("./modules/delete_product_form.php");
                    require("./modules/delete_customer_form.php");
                    require("./modules/edit_customer_form.php");
                    require("./modules/edit_product_form.php");
                }
            }    
        ?>
    </main>
    <footer>
        <p>&copy; Oskar Kośmider 2023</p>
    </footer>
</body>
</html>