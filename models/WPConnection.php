<?php

class WPConnection {
   public $database = "awlo_pageants";
   public $username = "root";
   public $password = "pass";
   public $hostname = "localhost";
   private $connection;

   function __construct() {
      $this->loadWPConfig();
      $this->connection = new mysqli($this->hostname, $this->username, $this->password, $this->database);
   }

   function loadWPConfig() {
      //Get Wordpress config..
   }

   public static function init() {
      return new WPConnection();
   }

   function selectQuery($sql) {
      $query = $this->connection->query($sql);
      $data = [];

      while($row = $query->fetch_object()) {
         $data[] = $row;
      }

      return $data;
   }

   function insertQuery($sql) {
      $queried = $this->connection->query($sql);

      return $this->connection->insert_id;
   }

   function customQuery($sql) {
      $res = $this->connection->query($sql);

      return $this->connection->affected_rows;
   }
}