<a href="/admin" class="text-blue-500 hover:text-blue-700"> < Back to Admin Panel</a>

<h1 class="text-3xl text-center font-bold mb-6">Artists</h1>

<div class="artists mb-8">
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="text-start py-2 px-4 border-b">Artist</th>
                <th class="text-start py-2 px-4 border-b">First name</th>
                <th class="text-start py-2 px-4 border-b">Last name</th>
                <th class="text-start py-2 px-4 border-b">Country</th>
                <th class="text-start py-2 px-4 border-b">Edit</th>
                <th class="text-start py-2 px-4 border-b">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artists as $artist): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->artist_name) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->firstname) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->lastname) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->country) ?></td>
                    <td class="py-2 px-4 border-b border-r">
                        <a href="/admin/artists/edit/<?= $artist->id ?>" class="text-blue-500 hover:text-blue-700">Edit</a>
                    </td>
                    <td class="py-2 px-4 border-b">
                        <?php if (in_array($artist->id, $usedArtists)): ?>
                            <span class="text-gray-500">In use, cannot delete</span>
                        <?php else: ?>
                            <a href="/admin/artists/delete/<?= $artist->id ?>" class="text-red-500 hover:text-red-700">Delete</a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
