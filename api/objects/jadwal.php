<?php
class Jadwal{
 
    // database connection and table name
    private $conn;
    private $table_name = "jadwal";
 
    // object properties
    public $id;
    public $jadwal;
    public $waktu;
    public $tanggal;
    public $tempat;
    public $prioritas;
    public $user_id;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    function read(){

        // select all query
        $query = "SELECT
                        *
                FROM
                    " . $this->table_name . " 
                ORDER BY
                id";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function getTanggal(){

        // select all query
        $query = "SELECT DISTINCT
                        tanggal
                FROM
                    " . $this->table_name . " 
                WHERE
                user_id = ?
                ORDER BY
                tanggal
                ASC";

        $stmt = $this->conn->prepare( $query );
        $stmt->bindParam(1, $this->user_id);
        $stmt->execute();

        return $stmt;
    }

    // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                 jadwal=:jadwal, 
                 waktu=:waktu, 
                 tanggal=:tanggal, 
                 tempat=:tempat, 
                 prioritas=:prioritas, 
                 user_id=:user_id";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        
        $this->jadwal=htmlspecialchars(strip_tags($this->jadwal));
        $this->waktu=htmlspecialchars(strip_tags($this->waktu));
        $this->tanggal=htmlspecialchars(strip_tags($this->tanggal));
        $this->tempat=htmlspecialchars(strip_tags($this->tempat));
        $this->prioritas=htmlspecialchars(strip_tags($this->prioritas));
        $this->user_id=htmlspecialchars(strip_tags($this->user_id));

        // bind values
        $stmt->bindParam(":jadwal", $this->jadwal);
        $stmt->bindParam(":waktu", $this->waktu);
        $stmt->bindParam(":tanggal", $this->tanggal);
        $stmt->bindParam(":tempat", $this->tempat);
        $stmt->bindParam(":prioritas", $this->prioritas);
        $stmt->bindParam(":user_id", $this->user_id);
      
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }

    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                jadwal=:jadwal, waktu=:waktu, tanggal=:tanggal, tempat=:tempat, prioritas=:prioritas
                WHERE
                    id=:id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        $this->jadwal=htmlspecialchars(strip_tags($this->jadwal));
        $this->waktu=htmlspecialchars(strip_tags($this->waktu));
        $this->tanggal=htmlspecialchars(strip_tags($this->tanggal));
        $this->tempat=htmlspecialchars(strip_tags($this->tempat));
        $this->prioritas=htmlspecialchars(strip_tags($this->prioritas));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind values
        $stmt->bindParam(":jadwal", $this->jadwal);
        $stmt->bindParam(":waktu", $this->waktu);
        $stmt->bindParam(":tanggal", $this->tanggal);
        $stmt->bindParam(":tempat", $this->tempat);
        $stmt->bindParam(":prioritas", $this->prioritas);
        $stmt->bindParam(":id", $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }
     // delete the product
     function delete(){
        
        // delete query
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        $this->id=htmlspecialchars(strip_tags($this->id));
    
        // bind id of record to delete
        $stmt->bindParam(1, $this->id);
    
        // execute query
        if($stmt->execute()){
            return true;
        }
    
        return false;
        
    }
    function readOne(){
        // query to read single record
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
              WHERE
                  tanggal = ? and user_id = ?";

          $stmt = $this->conn->prepare( $query );
          $stmt->bindParam(1, $this->tanggal);
          $stmt->bindParam(2, $this->user_id);
          $stmt->execute();
  
      return $stmt;
     
  }
    function readOneDateByUserID(){
        // query to read single record
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
              WHERE
                  user_id = ?";

          $stmt = $this->conn->prepare( $query );
          $stmt->bindParam(1, $this->user_id);
          $stmt->execute();
  
      return $stmt;
     
  }
    function readOnePrioritas(){
        // query to read single record
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
              WHERE
                  tanggal = ? and user_id = ? and prioritas = 1";

          $stmt = $this->conn->prepare( $query );
          $stmt->bindParam(1, $this->tanggal);
          $stmt->bindParam(2, $this->user_id);
          $stmt->execute();
  
      return $stmt;
     
  }
    function readAll(){
        // query to read single record
      $query = "SELECT
                  *
              FROM
                  " . $this->table_name . "
              WHERE
                  user_id = ?";

          $stmt = $this->conn->prepare( $query );
          $stmt->bindParam(1, $this->user_id);
          $stmt->execute();
  
      return $stmt;
     
  }
}
