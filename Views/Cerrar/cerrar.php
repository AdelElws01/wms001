<?php 

@session_start();
session_destroy();

//header("Location:Home/wms001/");
header("Location: /wms001/");
exit();
