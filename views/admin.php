<h1 class="text-3xl font-bold mb-4">Admin Panel - High Bass Audio</h1>

<!-- Statistics (chart.js) -->
<div class="statistics mb-8">
    <h2 class="text-2xl font-semibold mb-2">Statistics</h2>
    <div class="flex flex-wrap gap-2">
        <div class="w-full md:w-1/2">
            <canvas id="monthlySalesChart" width="400" height="200"></canvas>
        </div>
        <div class="w-full md:w-1/2">
            <canvas id="topProductsByOrdersChart" width="400" height="200"></canvas>
        </div>
    </div>
</div>

<div class="products mb-8">
    <h2 class="text-2xl font-semibold mb-2">Products</h2>
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
                borderColor: 'rgba(75, 192, 192, 1)',
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