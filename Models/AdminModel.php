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

    public function getArtists() {
        $query = "SELECT * FROM artist";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $artists = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $artists;
    }

    public function getAlbums() {
        $query = "SELECT * FROM album";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $albums = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $albums;
    }

    public function getTracks() {
        $query = "SELECT 
        t.id AS track_id,
        t.title AS track_title,
        a.title AS album_title,
        ar.artist_name
        FROM 
        track t
        LEFT JOIN 
        album a ON t.album_id = a.id
        LEFT JOIN 
        artist_track at ON t.id = at.track_id
        LEFT JOIN 
        artist ar ON at.artist_id = ar.id
        ";
    
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    
        $tracks = $stmt->fetchAll(\PDO::FETCH_OBJ);
    
        return $tracks;
    }
}
