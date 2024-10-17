<?php

    namespace App\Controllers;

    use App\Models\AdminModel;

    class AdminController extends BaseController {
        
        public static function index () {

            $AdminModel = new AdminModel();


            $products = $AdminModel->getProducts();
            
            self::loadView('/admin', [
                'title' => 'Admin Panel',
                'products' => $products
            ]);

        }

        public static function addProduct () {
            self::loadView('/admin/products/add', [
                'title' => 'Add Product'
            ]);
        }
    }