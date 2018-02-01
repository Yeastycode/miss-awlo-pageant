<?php
   require_once "WPConnection.php";

   class MAContestant {
      private $conn;
      function __construct(Array $data) {
         $this->fill($data);

         if( !isset($this->conn) ) {
            $this->conn = WPConnection::init();
         }
      }

      public $table = "awlo_contestants";

      public $columns, $values;

      function fill($attributes) {
         $data = (array) $attributes;
         $data["year"] = date("Y");

         //Remove invalid entries..
         unset($data["request"]);

         $this->columns = array_keys($data);
         $values = array_values($data);
         $this->values = [];

         foreach($data as $d) {
            $v = stripcslashes($d);
            $this->values[] = is_numeric($d) ? $d : "'{$v}'";
         }
      }

      public function save() {
         $sql = "INSERT INTO `{$this->table}` (`" . implode("`,`", $this->columns) . "`)";
         $sql .= " VALUES(" . implode(", ", $this->values) . ");";

         $this->id = $this->conn->insertQuery($sql);
         print_r($this->conn);
      }

      public static function find($email, $year="") {
         if( $year  == "" ) {
            $year = date("Y");
         }

         $sql = "SELECT * FROM {$this->table} WHERE `personal_mail` = '{$email}' AND `year`='{$year}';";

         return $this->conn->selectQuery($sql);
      }

      protected $id = null;
      public static function createTable(Array $attributes) {
         $data = (array) $attributes;
         unset($data["request"]);
         $field_names = array_keys($data);
         $create_query = "CREATE TABLE awlo_contestants ( 
            `id` INT NOT NULL AUTO_INCREMENT,
            `year` INT NOT NULL,";

         foreach($field_names as $fn) {
            $lower = strtolower($fn);
            $create_query .= "`{$lower}` VARCHAR(300) NULL , ";
         }
            
         $create_query .= "`created_at` TIMESTAMP NULL , 
            `updated_at` TIMESTAMP NULL ,
             PRIMARY KEY (`id`)) ENGINE = InnoDB;";

         $conn = WPConnection::init();
         $res = $conn->customQuery($create_query);

         return $res;
      }

      function uploadPhotos($files) {
         $ds = DIRECTORY_SEPARATOR;
         $dir = dirname(dirname(__FILE__)) . $ds . "uploads";

         foreach($files as $i=>$f) {
            $tmp = explode(".", $f["name"]);
            $ext = $tmp[count($tmp)-1];
            $name = "con_{$this->id}_{$i}." . $ext;
            $file_path = $dir . $ds . $name;
            $content = file_get_contents($f["tmp_name"]);

            //Write to directory..
            $written = file_put_contents($file_path, $content);

            if( !$written ) {
               break;
            }
         }

         return $written;
      }
   }
?>