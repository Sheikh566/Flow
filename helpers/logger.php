<?php 
  class Helper {
    public static function alert($msg) {
      echo "<script>alert('".$msg."')</script>";
    }
    public static function consoleLog($msg) {
      echo "<script>console.log('".json_encode($msg)."')</script>";
    }
    public static function conditionsChainer($col, $valArray) {
      $where_clause = "$col LIKE '%$valArray[0]%'";
      for ($i = 1; $i < count($valArray); $i++) $where_clause .= " OR $col LIKE '%$valArray[$i]%'";
      return $where_clause;
    }
  }
?>