<h1 class="text-3xl font-bold mb-4">Admin Panel - High Bass Audio</h1>

<!-- Statistics (chart.js) -->
<div class="statistics mb-8">
    <h2 class="text-2xl font-semibold mb-2">Statistics</h2>
    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2">
            <canvas id="monthlySalesChart" width="400" height="200"></canvas>
        </div>
        <div class="w-full md:w-1/2">
            <canvas id="topProductsByOrdersChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<!-- 3 Latest Orders -->
<div class="orders mb-8 mt-4">
    <h2 class="text-2xl font-semibold mb-2">Orders</h2>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="text-start py-2 px-4 border-b">Order ID</th>
                <th class="text-start py-2 px-4 border-b">Customer</th>
                <th class="text-start py-2 px-4 border-b">Total amount</th>
                <th class="text-start py-2 px-4 border-b">Order date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_slice($orders, 0, 3) as $order): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($order->id) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($order->customer_firstname . ' ' . $order->customer_lastname) ?></td>
                    <td class="py-2 px-4 border-b border-r">€ <?= htmlspecialchars($order->total_amount) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($order->order_date) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">
                    <div class="mt-4 mb-4 text-center">
                        <a href="/admin/orders" class="text-blue-500 hover:text-blue-700 hover:underline">View all orders</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<hr>
<!-- 3 Products -->
<div class="products mb-8 mt-4">
    <div class="flex justify-between">
        <h2 class="text-2xl font-semibold mb-2">Products</h2>

        <a href="/admin/products/new" class="text-white text-lg mr-4 bg-blue-500 p-2 rounded-md hover:bg-blue-600">Add product</a>
    </div>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="text-start py-2 px-4 border-b">Image</th>
                <th class="text-start py-2 px-4 border-b">Title</th>
                <th class="text-start py-2 px-4 border-b">Price</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_slice(array_reverse($products), 0, 3) as $product): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r">
                        <img src="/images/<?= $product->image_path ?>" alt="<?= $product->title ?>" class="max-w-24">
                    </td>
                    <td class="py-2 px-4 border-b border-r"><?= $product->title ?></td>
                    <td class="py-2 px-4 border-b border-r">€ <?= $product->price ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="4">
                    <div class="mt-4 mb-4 text-center">
                        <a href="/admin/products" class="text-blue-500 hover:text-blue-700 hover:underline">View all products</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- 3 Artists -->
<div class="artists mb-8">
    <h2 class="text-2xl font-semibold mb-2">Artists</h2>
    <table class="min-w-full bg-white border border-gray-200 mt-4">
        <thead>
            <tr>
                <th class="text-start py-2 px-4 border-b">Artist</th>
                <th class="text-start py-2 px-4 border-b">First name</th>
                <th class="text-start py-2 px-4 border-b">Last name</th>
                <th class="text-start py-2 px-4 border-b">Country</th>
                <th class="text-start py-2 px-4 border-b">In use</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (array_slice($artists, 0, 3) as $artist): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->artist_name) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->firstname) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->lastname) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($artist->country) ?></td>
                    <td class="py-2 px-4 border-b">
                        <?= in_array($artist->id, $usedArtists) ? 'Yes' : 'No' ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="6">
                    <div class="mt-4 mb-4 text-center">
                        <a href="/admin/artists" class="text-blue-500 hover:text-blue-700 hover:underline">View all artists</a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Script for chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Monthly Sales Data
    const monthlySalesData = <?= json_encode($monthlySales) ?>;
    const months = monthlySalesData.map(data => data.month);
    const sales = monthlySalesData.map(data => data.total_sales);

    const monthlySalesCtx = document.getElementById('monthlySalesChart').getContext('2d');
    new Chart(monthlySalesCtx, {
        type: 'line',
        data: {
            labels: months,
            datasets: [{
                label: 'Monthly Sales',
                data: sales,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1,
                fill: false
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Top Products by Orders Data
    const topProductsByOrdersData = <?= json_encode($topProductsByOrders) ?>;
    const productTitles = topProductsByOrdersData.map(data => data.title);
    const orderCounts = topProductsByOrdersData.map(data => data.order_count);

    const topProductsByOrdersCtx = document.getElementById('topProductsByOrdersChart').getContext('2d');
    new Chart(topProductsByOrdersCtx, {
        type: 'bar',
        data: {
            labels: productTitles,
            datasets: [{
                label: 'Top Products by Orders',
                data: orderCounts,
                backgroundColor: 'rgba(153, 102, 255, 0.2)',
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>