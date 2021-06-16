<?php
/* This will give an error. Note the output
 * above, which is before the header() call */
header('Location: clanok.php?p_id=33');
exit;
?>