<?php
class User{
 
    // database connection and table name
    private $conn;
    private $table_name = "user";
 
    // object properties
    public $id;
    public $email;
    public $nama;
    public $password;
    public $foto;
    public $ttl;
    public $kutipan;
    public $status;
    public $dibuat_pada;
    public $token;
    public $passwordL;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
        // read products
    function read(){

        // select all query
        $query = "SELECT
                        *
                FROM
                    " . $this->table_name . " 
                ORDER BY
                id DESC";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }
    function countData(){

        // select all query
        $query = "SELECT 
                    u.id as id, 
                    u.email as email, 
                    c.catatanCount as catatan, 
                    j.jadwalCount as jadwal,
                    c.catatanCount + j.jadwalCount as total,
                    u.status as status
                    from 
                    user u 
                    left join 
                    (select user_id, count(user_id) as catatanCount from catatan group by user_id)
                    c on c.user_id = u.id 
                    left join 
                    (select user_id, count(user_id) as jadwalCount from jadwal group by user_id)
                    j on j.user_id = u.id ORDER BY total DESC;";

        // prepare query statement
        $stmt = $this->conn->prepare($query);

        // execute query
        $stmt->execute();

        return $stmt;
    }

    // create product
    function create(){
    
        // query to insert record
        $query = "INSERT INTO
                    " . $this->table_name . "
                SET
                 email=:email, nama=:nama, password=:password, foto=:foto, ttl=:ttl, kutipan=:kutipan, status=:status,
                 dibuat_pada=:dibuat_pada, token=:token";
    
        // prepare query
        $stmt = $this->conn->prepare($query);
    
        // sanitize
        
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->password=htmlspecialchars(strip_tags($this->password));
        $this->foto=htmlspecialchars(strip_tags($this->foto));
        $this->ttl=htmlspecialchars(strip_tags($this->ttl));
        $this->kutipan=htmlspecialchars(strip_tags($this->kutipan));
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->dibuat_pada=htmlspecialchars(strip_tags($this->dibuat_pada));
        $this->token=htmlspecialchars(strip_tags($this->token));

        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":password", $this->password);
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":ttl", $this->ttl);
        $stmt->bindParam(":kutipan", $this->kutipan);
        $stmt->bindParam(":status", $this->status);
        $stmt->bindParam(":dibuat_pada", $this->dibuat_pada);
        $stmt->bindParam(":token", $this->token);
      
    
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
                    id = ?
                LIMIT
                    0,1
                    ";
     
        // prepare query statement
        $stmt = $this->conn->prepare( $query );
     
        // bind id of product to be updated
        $stmt->bindParam(1, $this->id);
     
        // execute query
        $stmt->execute();
     
        // get retrieved row
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
        // set values to object properties
        $this->id = $row['id'];
        $this->email = $row['email'];
        $this->nama = $row['nama'];
        $this->foto = $row['foto'];
        $this->ttl = $row['ttl'];
        $this->kutipan = $row['kutipan'];
    }
    function sumData(){
           // select all query
           $query = "SELECT u.countData as user, c.countCatatan as catatan, j.countJadwal as jadwal FROM (select id, count(id) as countData from user) u left join (select user_id, count(user_id) as countCatatan from catatan) c on c.user_id = u.id left join (select user_id, count(user_id) as countJadwal from jadwal ) j on j.user_id = u.id";

            // prepare query statement
            $stmt = $this->conn->prepare($query);

            // execute query
            $stmt->execute();

            return $stmt;
    }
    // update the product
    function update(){
    
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    email=:email, nama=:nama, foto=:foto, ttl=:ttl, kutipan=:kutipan
                WHERE
                    id=:id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        $this->email=htmlspecialchars(strip_tags($this->email));
        $this->nama=htmlspecialchars(strip_tags($this->nama));
        $this->foto=htmlspecialchars(strip_tags($this->foto));
        $this->ttl=htmlspecialchars(strip_tags($this->ttl));
        $this->kutipan=htmlspecialchars(strip_tags($this->kutipan));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind values
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":nama", $this->nama);
        $stmt->bindParam(":foto", $this->foto);
        $stmt->bindParam(":ttl", $this->ttl);
        $stmt->bindParam(":kutipan", $this->kutipan);
        $stmt->bindParam(":id", $this->id);
    
        // execute the query
        if($stmt->execute()){
            return true;
        }
    
        return false;
    }

    function updateWithPassword(){
          // update query
           // query to read single record
            $sql = "SELECT password FROM " . $this->table_name . " WHERE id = ?";

            $stmtP = $this->conn->prepare( $sql );

            $stmtP->bindParam(1, $this->id);

            $stmtP->execute();

            $row = $stmtP->fetch(PDO::FETCH_ASSOC);
            $this->passwordL=htmlspecialchars(strip_tags($this->passwordL));
          if(password_verify( $this->passwordL,$row['password'] )){
            $query = "UPDATE
                    " . $this->table_name . "
                SET
                    email=:email, nama=:nama, password=:password, foto=:foto, ttl=:ttl, kutipan=:kutipan
                WHERE
                    id=:id";

            // prepare query statement
            $stmt = $this->conn->prepare($query);

            $this->email=htmlspecialchars(strip_tags($this->email));
            $this->nama=htmlspecialchars(strip_tags($this->nama));
            $this->password=htmlspecialchars(strip_tags($this->password));
            $this->foto=htmlspecialchars(strip_tags($this->foto));
            $this->ttl=htmlspecialchars(strip_tags($this->ttl));
            $this->kutipan=htmlspecialchars(strip_tags($this->kutipan));
            $this->id=htmlspecialchars(strip_tags($this->id));

            // bind values
            $stmt->bindParam(":email", $this->email);
            $stmt->bindParam(":nama", $this->nama);
            $stmt->bindParam(":password", $this->password);
            $stmt->bindParam(":foto", $this->foto);
            $stmt->bindParam(":ttl", $this->ttl);
            $stmt->bindParam(":kutipan", $this->kutipan);
            $stmt->bindParam(":id", $this->id);

            // execute the query
            if($stmt->execute()){
            return true;
            }

            return false;  
            
          }else{
            return false;
            
          }
    }
    function updateStatus(){
        // update query
        $query = "UPDATE
                    " . $this->table_name . "
                SET
                    status=:status
                WHERE
                    id=:id";
    
        // prepare query statement
        $stmt = $this->conn->prepare($query);
    
        $this->status=htmlspecialchars(strip_tags($this->status));
        $this->id=htmlspecialchars(strip_tags($this->id));

        // bind values
        $stmt->bindParam(":status", $this->status);
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

        // search products
        function search($keywords){
        
            // select all query
            $query = "SELECT
                        email
                    FROM
                        " . $this->table_name . " 
                    WHERE
                        email LIKE ? ";
        
            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $keywords=htmlspecialchars(strip_tags($keywords));
            $keywords = "%{$keywords}%";
        
            // bind
            $stmt->bindParam(1, $keywords);
        
            // execute query
            $stmt->execute();
        
            return $stmt;
        }
        function dataById(){
            // delete query
            $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind id of record to delete
            $stmt->bindParam(1, $this->id);
        
            // execute query
            if($stmt->execute()){
                
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
     
                // set values to object properties
                $this->id = $row['id'];
                $this->email = $row['email'];
                $this->nama = $row['nama'];
                $this->foto = $row['foto'];
                $this->ttl = $row['ttl'];
                $this->kutipan = $row['kutipan'];
                return true;
            }
        
            return false;
        }
        function login(){
            $sql = "SELECT password FROM " . $this->table_name . " WHERE email = ?";

            $stmtP = $this->conn->prepare($sql);

            $stmtP->bindParam(1, $this->email);

            $stmtP->execute();

            $row = $stmtP->fetch(PDO::FETCH_ASSOC);
            $this->password=htmlspecialchars(strip_tags($this->password));
          if(password_verify( $this->password,$row['password'] )){
            $sql2 = "SELECT id FROM " . $this->table_name . " WHERE email = ?";

            $stmt = $this->conn->prepare( $sql2 );

            $stmt->bindParam(1, $this->email);

            $stmt->execute();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['id'] = $row['id'];
            return true;
          }else{
            return false;
            
          }
        }
}

