<?php

// Initialize the session.
    session_start(); // Start The Session

// Unset all of the session variables.
    session_unset(); // Unset The Data

// Finally, destroy the session.
    session_destroy(); // Destory The Session

    header('Location: index.php');

	exit();





	

	