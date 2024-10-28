<h1 class="text-3xl text-center font-bold mb-6">File Manager</h1>

<div>
<h2 class="text-2xl font-bold mb-6 ml-5">Images</h2>
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b text-start">Image</th>
            <th class="py-2 px-4 border-b text-start">Name</th>
            <th class="py-2 px-4 border-b text-start">In Use</th>
            <th class="py-2 px-4 border-b text-start">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($imageList as $image) : 
            if($image != '.' && $image != '..') :
        ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4 border-r-2">
                    <img src="/images/<?= $image ?>" alt="<?= $image ?>" class="w-24 h-24 object-cover">
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= $image ?>
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= in_array($image, $usedImages) ? 'Yes' : 'No' ?>
                </td>
                <td class="py-2 px-4">
                    <a href="/admin/filemanager/delete/<?= $image ?>" class="text-red-500 hover:text-red-700">Delete</a>
                </td>
            </tr>
        <?php endif; endforeach; ?>
    </tbody>
</table>
</div>