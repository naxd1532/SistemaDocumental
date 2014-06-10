<?php

    Class Model{
        function __construct() {
            $this->db = new MySQLiManager(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        }
    }