<?php
require_once "loadBandsFromJson.php";
echo json_encode($bands[$_POST["bandId"]]);
?>