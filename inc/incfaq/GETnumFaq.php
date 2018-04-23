<?php
if(isset($_GET['numfaq']))
{
  if(($_GET['numfaq'] >= 1)&&($_GET['numfaq'] <= 6)){
    $numfaq = $_GET['numfaq'];
  }
}else{
  $numfaq = 0;
}


?>
