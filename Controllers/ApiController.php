<?php

namespace App\Controllers;

use App\Models\AdminModel;

class ApiController extends BaseController {

    public static function getProducts() {
        $AdminModel = new AdminModel();

        $products = $AdminModel->getProducts();

        echo json_encode($products);
    }

    public static function getProduct($id) {
        $AdminModel = new AdminModel();

        $product = $AdminModel->getProduct($id);

        echo json_encode($product);
    }

    public static function getTracks() {
        $AdminModel = new AdminModel();

        $tracks = $AdminModel->getTracks();

        echo json_encode($tracks);
    }

    public static function getAlbums() {
        $AdminModel = new AdminModel();

        $albums = $AdminModel->getAlbums();

        echo json_encode($albums);
    }

    public static function getArtists() {
        $AdminModel = new AdminModel();

        $artists = $AdminModel->getArtists();

        echo json_encode($artists);
    }

    public static function addMusic() {
        $AdminModel = new AdminModel();

        $AdminModel->saveMusic($_POST);

        echo json_encode(['status' => 'success']);
    }
}