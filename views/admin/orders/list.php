<a href="/admin" class="text-blue-500 hover:text-blue-700"> < Back to Admin Panel</a>

<h1 class="text-3xl text-center font-bold mb-6">Orders</h1>

<div class="orders mb-8 mt-4">
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
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($order->id) ?></td>
                    <td class="py-2 px-4 border-b border-r"><?= htmlspecialchars($order->customer_firstname . ' ' . $order->customer_lastname) ?></td>
                    <td class="py-2 px-4 border-b border-r">€ <?= htmlspecialchars($order->total_amount) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($order->order_date) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>