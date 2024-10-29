<?php

namespace App\Controllers;

use App\Models\AdminModel;

class FilemanagerController extends BaseController {
    public static function list () {
        $imageList = scandir(BASE_DIR . '/public/images');
        $AdminModel = new AdminModel();
        $usedImages = $AdminModel->getUsedImages();

        self::loadView('/admin/filemanager/list', [
            'title' => 'Filemanager',
            'imageList' => $imageList,
            'usedImages' => $usedImages
        ]);
    }

    public static function images () {
        $imageList = scandir(BASE_DIR . '/public/images');
        $AdminModel = new AdminModel();
        $usedImages = $AdminModel->getUsedImages();

        self::loadView('/admin/filemanager/images', [
            'title' => 'Filemanager',
            'imageList' => $imageList,
            'usedImages' => $usedImages
        ]);
    }
}