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

    public static function addArtist() {
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            echo json_encode(['status' => 'error', 'message' => 'Invalid input']);
            return;
        }

        $AdminModel = new AdminModel();
        $AdminModel->addArtist($data);

        echo json_encode(['status' => 'success', 'message' => 'Artist added successfully']);
    }
}