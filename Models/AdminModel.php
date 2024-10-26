<?php

namespace App\Models;

class AdminModel extends BaseModel {
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

    public function saveMusic($data) {
        $artists = $data['artists'];
        $firstnames = $data['firstnames'];
        $lastnames = $data['lastnames'];
        $countries = $data['countries'];
        $type = $data['type'];
        $tracks = $data['tracks'];
        $artistNames = $data['artistNames']; 
        $trackFiles = $data['trackFiles']; 

        $artistIdMap = [];
        $album_id = null;

        // Insert artists or get existing artist IDs
        for ($i = 0; $i < count($artists); $i++) {
            $artist_name = $artists[$i];
            $firstname = $firstnames[$i];
            $lastname = $lastnames[$i];
            $country = $countries[$i];

            // Check if artist already exists
            $sql_check = "SELECT id FROM artist WHERE artist_name = ?";
            $stmt_check = $this->db->prepare($sql_check);
            $stmt_check->execute([$artist_name]);
            $artist_id = $stmt_check->fetchColumn();

            if (!$artist_id) {
                // Insert new artist
                $sql = "INSERT INTO artist (artist_name, firstname, lastname, country) VALUES (?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $stmt->execute([$artist_name, $firstname, $lastname, $country]);
                $artist_id = $this->db->lastInsertId();
            }

            $artistIdMap[$artist_name] = $artist_id; // Map artist name to ID
        }

        // Check if it's an album type and save album details if applicable
        if ($type == 'album') {
            $album_title = $data['albumTitle'];
            $album_file = $data['albumFile'];

            $album_file_name = uniqid() . '-' . basename($album_file); // Just saving the filename with a unique ID prefix

            // Insert album into the album table
            $sql_album = "INSERT INTO album (title, file_path) VALUES (?, ?)";
            $stmt_album = $this->db->prepare($sql_album);
            $stmt_album->execute([$album_title, $album_file_name]);
            $album_id = $this->db->lastInsertId();
        }

        // Insert tracks
        for ($i = 0; $i < count($tracks); $i++) {
            $track_title = $tracks[$i];
            $artist_name = $artistNames[$i]; // Get artist name
            $artist_id = $artistIdMap[$artist_name]; // Get artist ID from map
            $track_file_name = uniqid() . '-' . basename($trackFiles[$i]); // Just saving the filename with a unique ID prefix

            // Insert track into the track table
            $sql_track = "INSERT INTO track (title, file_path, album_id) VALUES (?, ?, ?)";
            $stmt_track = $this->db->prepare($sql_track);
            $stmt_track->execute([$track_title, $track_file_name, $album_id]);
            $track_id = $this->db->lastInsertId();

            // Insert into artist_track table
            if ($artist_id > 0) {
                $sql_artist_track = "INSERT INTO artist_track (artist_id, track_id) VALUES (?, ?)";
                $stmt_artist_track = $this->db->prepare($sql_artist_track);
                $stmt_artist_track->execute([$artist_id, $track_id]);
            } else {
                return "Invalid artist ID for $artist_name";
            }
        }

        return "New music added successfully";
    }
}