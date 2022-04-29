<?php 
  include "logger.php";
  class Database 
  {
    public $conn;
    public $res;
    
    function __construct()
    {
      $this->conn = mysqli_connect("localhost", "root", "321", "flow");
    }
    public function select($table, $cols, $conds="") 
    {
      $query = "SELECT $cols FROM $table";
      $where_clause = " WHERE $conds";
      if ($conds!= "") $query.= $where_clause;
      $this->res = mysqli_query($this->conn, $query);
    }
    public function selectJoin($table1, $table2, $cols, $on, $conds="", $joinType="") 
    {
      $query = "SELECT $cols FROM $table1 $joinType JOIN $table2 ON $on";
      $where_clause = " WHERE $conds";
      if ($conds!= "") $query.= $where_clause;
      $this->res = mysqli_query($this->conn, $query);
    }
    public function insert($table, $cols=array()) {
      $table_col = implode(",", array_keys($cols));
      $table_val = implode("','", array_values($cols));
      $query = "INSERT INTO $table($table_col) VALUES ('$table_val')";
      $query = str_replace("'None'","NULL",$query);
      $this->res = mysqli_query($this->conn, $query);
    }
    public function update($table, $val=array(), $conds = "")
    {
      $args = urldecode(http_build_query($val, '', ','));
      $query = "UPDATE $table SET $args WHERE $conds";
      $query = str_replace('"None"',"NULL",$query);
      $this->res = mysqli_query($this->conn, $query);
    }
    public function delete($table, $conds)
    {
      $query = "DELETE FROM $table WHERE $conds";
      $this->res = mysqli_query($this->conn, $query);
    }

 

  }
?>