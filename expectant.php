<?php
session_start();
?>

<html>
<body>

<h1>WELCOME <?php echo $_SESSION['LoginUser']; ?></h1>
</body>
</html>