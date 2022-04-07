<?php 
  class Helper {
    public static function alert($msg) {
      echo "<script>alert('".$msg."')</script>";
    }
    public static function consoleLog($msg) {
      echo "<script>console.log('".json_encode($msg)."')</script>";
    }
  }
?>