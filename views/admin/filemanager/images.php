<h1 class="text-3xl text-center font-bold mb-6">File Manager - Images</h1>

<a href="/admin/filemanager" class="text-blue-500 hover:text-blue-700"> < Back to File Manager</a>

<div>
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
        <?php 
        foreach ($imageList as $image) : 
            if($image != '.' && $image != '..') :
        ?>
            <tr class="border-b">
                <td class="py-2 px-4 border-r-2">
                    <img src="/images/<?= $image ?>" alt="<?= $image ?>" class="w-24 object-cover">
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= $image ?>
                </td>
                <td class="py-2 px-4 border-r-2">
                    <?= in_array($image, $usedImages) ? 'Yes' : 'No' ?>
                </td>
                <td class="py-2 px-4">
                    <?php if (in_array($image, $usedImages)) : ?>
                        <span class="text-gray-500">File is in use, cannot delete.</span>
                    <?php else : ?>
                        <a href="/admin/filemanager/delete/<?= $image ?>" class="text-red-500 hover:text-red-700">Delete</a>
                    <?php endif; ?>
                </td>
            </tr>
        <?php 
            endif;
        endforeach; 
        ?>
    </tbody>
</table>
</div>