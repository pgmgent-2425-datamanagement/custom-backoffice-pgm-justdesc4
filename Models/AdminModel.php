<?php

namespace App\Models;

class AdminModel extends BaseModel {
    protected $db;

    public function __construct() {
        global $db;
        $this->db = $db;
    }

    public function getProducts() {
        $query = "SELECT * FROM product";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $products = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $products;
    }

    public function getProduct($id) {
        $query = "SELECT * FROM product WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['id' => $id]);
        $product = $stmt->fetch(\PDO::FETCH_OBJ);
        return $product;
    }

    public function getAlbums() {
        $query = "SELECT * FROM album";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $albums = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $albums;
    }

    public function getTracks() {
        $query = "SELECT * FROM track";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $tracks = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $tracks;
    }
}
