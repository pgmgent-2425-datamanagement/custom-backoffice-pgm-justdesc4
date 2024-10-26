<?php

namespace App\Controllers;

use App\Models\AdminModel;

class AdminController extends BaseController {
    
    public static function index() {
        $AdminModel = new AdminModel();

        $products = $AdminModel->getProducts();
        $tracks = $AdminModel->getTracks();
        
        self::loadView('/admin', [
            'title' => 'Admin Panel',
            'products' => $products,
            'tracks' => $tracks
        ]);
    }

    public static function addProduct() {
        $AdminModel = new AdminModel();

        $albums = $AdminModel->getAlbums();
        $tracks = $AdminModel->getTracks();
        $artists = $AdminModel->getArtists();

        self::loadView('/admin/products/new', [
            'title' => 'New product',
            'albums' => $albums,
            'tracks' => $tracks,
            'artists' => $artists
        ]);
    }

    public static function saveMusic() {
        $AdminModel = new AdminModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'artists' => $_POST['artists'] ?? [],
                'firstnames' => $_POST['firstnames'] ?? [],
                'lastnames' => $_POST['lastnames'] ?? [],
                'countries' => $_POST['countries'] ?? [],
                'type' => $_POST['type'] ?? '',
                'tracks' => $_POST['tracks'] ?? [],
                'artistNames' => $_POST['artistNames'] ?? [],
                'trackFiles' => $_POST['trackFiles'] ?? [],
                'albumTitle' => $_POST['albumTitle'] ?? '',
                'albumFile' => $_POST['albumFile'] ?? ''
            ];

            $result = $AdminModel->saveMusic($data);
            echo $result;
        }
    }
}