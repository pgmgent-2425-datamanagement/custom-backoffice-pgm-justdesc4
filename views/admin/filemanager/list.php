<h1 class="text-3xl text-center font-bold mb-6">File Manager</h1>

<div>
<h2 class="text-2xl font-bold mb-6 ml-5">Images</h2>
<table class="min-w-full bg-white border border-gray-200">
    <thead>
        <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b text-start">Image</th>
            <th class="py-2 px-4 border-b text-start">Name</th>
            <th class="py-2 px-4 border-b text-start">In Use</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $count = 0;
        foreach ($imageList as $image) : 
            if($image != '.' && $image != '..') :
                if ($count < 5) :
                    $count++;
        ?>
            <tr class="border-b hover:bg-gray-50">
                <td class="py-2 px-4 border-r-2">
                    <img src="/images/<?= $image ?>" alt="<?= $image ?>" class="w-36 h-24 object-cover">
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= $image ?>
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= in_array($image, $usedImages) ? 'Yes' : 'No' ?>
                </td>
            </tr>
        <?php 
                endif;
            endif; 
        endforeach; 
        ?>
        <tr>
            <td colspan="4">
                <div class="mt-4 mb-4 text-center">
                    <a href="/admin/filemanager/images" class="text-blue-500 hover:text-blue-700 hover:underline">View all images</a>
                </div>
            </td>
        </tr>
    </tbody>
</table>
</div>