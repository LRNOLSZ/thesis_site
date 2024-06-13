<?php
session_start();
include("connections.php");
include("functions.php");



session_unset();
session_destroy();
header("Location: ./index.php");
