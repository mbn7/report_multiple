<?php
    class Database {

        public static function connectDB(){
            return new mysqli("database-2.cxhjizeo3am3.ap-northeast-1.rds.amazonaws.com", "admin", "!qw23er45T", "report");
        }
        
        public static function sqlQuery($sql){
            $conn = self::connectDB();
            $conn->query("SET NAMES 'utf8'");
            $result = $conn->query($sql);
            $rows = array();
            while ($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            $conn->close();
            return $rows;
        }

        public static function sqlCommand($sql) {
            $conn = self::connectDB();
            $conn->query("SET NAMES 'utf8'");
            $conn->query($sql);
            $id = $conn->insert_id;
            $conn->close();
            return $id;
        }
    }
?>
