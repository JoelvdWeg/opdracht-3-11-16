<?php
class db
{
  private $conn;

  public function __construct($servername, $username, $password, $dbname)
  {
    $this->conn = mysqli_connect($servername, $username, $password, $dbname);
    if(!$this->conn){
      die("Connection failed".mysqli_connect_error());
    }
  }
  public function query2assoc($sql)
  {
    $result = mysqli_query($this->conn, $sql);
    $i = 0;
    $array =[];

    while($row = mysqli_fetch_assoc($result)){
      $array[$i++] = $row;
    }
    return $array;
  }
  public function dbselect($select, $from){
    $array = $this->query2assoc('SELECT '.$select.' FROM `'. $from.'`');
    return $array;
  }
  public function dbinsert($insert, $value)
  {
    $sql = 'INSERT INTO '.$insert.' VALUES ("'.$value.'")';
      if(mysqli_query($this->conn, $sql)){
        return '<div style=" color: green">Done inserting<br></div>';
      }
      else{
        return '<div style=" color: red">Error inserting<br></div>';
    }
  }
  public function dbdelete($table, $id ){
    $sql = 'DELETE FROM `'.$table.'` WHERE Id='.$id.' ';
      if(mysqli_query($this->conn, $sql)){
        return '<div style=" color: green">Done deleting<br></div>';
      }
      else{
        return '<div style=" color: red">Error deleting<br></div>';
    }
  }
  public function dbupdate($table, $changes, $id ){
    $sql = 'UPDATE '.$table.' SET '.$changes.' WHERE id=`'.$id.'`';
      if(mysqli_query($this->conn, $sql)){
        return '<div style=" color: green">Done updating<br></div>';
      }
      else{
        return '<div style=" color: red">Error updating<br></div>';
    }
  }
}
?>
