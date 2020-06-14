<?php

include 'class.database.php';

if (!isset($conn)){        
    $conn = mysqli_connect("anatodtest.c75o4mima6rb.us-east-1.rds.amazonaws.com", "test", "test5678", "test_anatod");
}