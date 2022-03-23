<?php

    class ConnectDb{
        private     $servername;
        private     $username;
        private     $password;
        private     $dbname;
        

        public function connect(){
            $this->servername = "localhost";
            $this->username = "id18627216_scandiwebtestproject_db";
            $this->password = "Elsawyx265***";
            $this->dbname = "id18627216_scandiwebtestproject";


            $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

            if($conn->connect_error){
                die ("<h1>Database Connection Failed</h1>");
            }else{
                // echo "Database Connected Successfully";
                return $conn;
            }

            
        }

    }

    ?>