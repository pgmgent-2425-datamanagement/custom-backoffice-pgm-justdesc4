<?php

    namespace App\Controllers;

    use App\Models\AdminModel;

    class AdminController extends BaseController {
        
        public static function index () {

            $AdminModel = new AdminModel();

            $products = $AdminModel->getProducts();
            $tracks = $AdminModel->getTracks();
            
            self::loadView('/admin', [
                'title' => 'Admin Panel',
                'products' => $products,
                'tracks' => $tracks
            ]);

        }

        public static function addProduct () {

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
    }