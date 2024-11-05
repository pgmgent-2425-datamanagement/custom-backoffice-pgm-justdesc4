<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ($title ?? '') . ' ' . $_ENV['SITE_NAME'] ?></title>
    <link rel="stylesheet" href="/css/main.css?v=<?php if( $_ENV['DEV_MODE'] == "true" ) { echo time(); }; ?>">
    <link href="/css/tailwind.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="brand text-3xl font-bold text-center py-4 bg-blue-600 text-white">High Bass Audio</div>

    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-center space-x-4">
            <a href="/" class="hover:underline">Website</a>
            <a href="/admin" class="hover:underline">Admin Panel</a>
            <a href="/admin/filemanager" class="hover:underline">Filemanager</a>
        </div>
    </nav>

    <main class="container mx-auto p-4">
        <?= $content; ?>
    </main>
    
    <footer class="bg-blue-600 text-white text-center py-4 mt-4">
        &copy; <?= date('Y'); ?> - High Bass Audio.
    </footer>

    <script src="/js/addMusicForm.js"></script>
</body>
</html>