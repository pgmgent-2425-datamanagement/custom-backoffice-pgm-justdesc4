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

    public static function products() {
        $AdminModel = new AdminModel();
    
        $searchTerm = $_GET['search'] ?? '';
        $maxPrice = $_GET['max_price'] ?? null;
    
        if ($searchTerm) {
            $products = $AdminModel->searchProducts($searchTerm);
        } elseif ($maxPrice) {
            $products = $AdminModel->filterProductsByPrice($maxPrice);
        } else {
            $products = $AdminModel->getProducts();
        }
    
        $tracks = $AdminModel->getTracks();
        
        self::loadView('/admin/products/list', [
            'title' => 'Products',
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
        ], $layout = 'addProduct');
    }

public static function editProduct($id) {
    $AdminModel = new AdminModel();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Collect data from the form
        $data = [
            'title' => $_POST['productTitle'] ?? '',
            'description' => $_POST['productDescription'] ?? '',
            'price' => $_POST['productPrice'] ?? 0,
            'image_path' => null
        ];

        // Handle file upload
        if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "images/";
            $product_image_name = uniqid() . '-' . basename($_FILES['productImage']['name']);
            $target_file = $target_dir . $product_image_name;
            if (move_uploaded_file($_FILES['productImage']['tmp_name'], $target_file)) {
                $data['image_path'] = $product_image_name;
            } else {
                echo "Failed to upload image.";
                return;
            }
        }

        // Update product in the database
        $result = $AdminModel->editProduct($id, $data);
        if ($result) {
            header('Location: /admin');
        } else {
            throw new \Exception('Failed to update product');
        }
    } else {
        $product = $AdminModel->getProduct($id);
        $albums = $AdminModel->getAlbums();
        $tracks = $AdminModel->getTracks();
        $artists = $AdminModel->getArtists();

        self::loadView('/admin/products/edit', [
            'title' => 'Edit product',
            'product' => $product,
            'albums' => $albums,
            'tracks' => $tracks,
            'artists' => $artists
        ]);
    }
}

    public function deleteProduct($id) {
        $AdminModel = new AdminModel();
        $result = $AdminModel->deleteProduct($id);
        echo $result;
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
                'albumFile' => $_FILES['albumFile'] ?? '',
                'pricePerTrack' => $_POST['pricePerTrack'] ?? 0,
                'productTitle' => $_POST['productTitle'] ?? '',
                'productDescription' => $_POST['productDescription'] ?? '',
                'productPrice' => $_POST['productPrice'] ?? 0,
                'productImage' => $_FILES['productImage'] ?? null
            ];
    
            $result = $AdminModel->saveMusic($data);
            echo $result;
        }
    }
}