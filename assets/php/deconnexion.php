<?php
session_start();

unset($_SESSION['users']);
session_destroy($_SESSION['users']);
header('location: ../../index.php');
