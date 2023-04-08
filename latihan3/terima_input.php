<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
echo "<br>";
if(isset($_POST["submit"])){
    echo $_POST["nama"];
} else {
    echo "belum disubmit";
}
