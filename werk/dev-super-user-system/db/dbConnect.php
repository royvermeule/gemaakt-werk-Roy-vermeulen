<?php
  define("SERVERNAME", "localhost");
  define("USERNAME", "root");
  define("PASSWORD", "");
  define("DBNAME", "magazijn_Mbo_Utrecht");
  $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);

  if (!$conn ) {
    die("connection_failed".mysqli_connect_error());
}
?>