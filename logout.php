<?php
    session_start();

    unset($_SESSION['ROLE']) ; 
    unset($_SESSION['is_loggedin']) ;
    echo"<script>
            location.assign('index.php');
        </script>" ;
            
?>