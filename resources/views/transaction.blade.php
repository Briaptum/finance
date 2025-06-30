<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class="bg-blue-500 text-white p-4 rounded-b-lg">
        <div class="flex justify-between items-center mx-auto max-w-6xl">
            <h1 class="text-2xl font-bold">Trackance</h1>
            <a href="{{ route('transactions.create') }}" class="bg-white text-blue-500 p-2 rounded-md">Create Transaction</a>
            <a href="{{ route('dashboard') }}" class="bg-white text-blue-500 p-2 rounded-md">go to dashboard</a>
        </div>
    </header>

    <section class="py-8 bg-gray-100 h-screen">
        <table class="table-auto w-full mx-auto max-w-6xl bg-white rounded-lg shadow-md overflow-hidden">
            <thead class="bg-gray-100 text-left border-b">
                <tr class="text-sm text-gray-500">
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Category</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Description</th>
                    <th class="px-4 py-2">Date</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $transaction->type }}</td>
                        <td class="px-4 py-3">{{ $transaction->category }}</td>
                        <td class="px-4 py-3">{{ $transaction->amount }}</td>
                        <td class="px-4 py-3">{{ $transaction->description }}</td>
                        <td class="px-4 py-3">{{ $transaction->date }}</td>
                        <td class="px-4 py-3 flex gap-2">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                            <button type="button" onclick="showTransactionDetails({{ $transaction->id }})" class="text-green-500 hover:text-green-700 transition-colors">View Details</button>
                            
                            <!-- Modal -->
                            <div id="modal-{{ $transaction->id }}" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
                                <div class="bg-white p-6 rounded-lg shadow-xl max-w-lg w-full">
                                    <div class="flex justify-between items-center mb-4">
                                        <h3 class="text-lg font-bold">Transaction Details</h3>
                                        <button onclick="closeModal({{ $transaction->id }})" class="text-gray-500 hover:text-gray-700">&times;</button>
                                    </div>
                                    <div class="space-y-3">
                                        <p><span class="font-semibold">Type:</span> {{ $transaction->type }}</p>
                                        <p><span class="font-semibold">Category:</span> {{ $transaction->category }}</p>
                                        <p><span class="font-semibold">Amount:</span> {{ $transaction->amount }}</p>
                                        <p><span class="font-semibold">Description:</span> {{ $transaction->description }}</p>
                                        <p><span class="font-semibold">Date:</span> {{ $transaction->date }}</p>
                                    </div>
                                </div>
                            </div>

                            <script>
                                function showTransactionDetails(id) {
                                    document.getElementById('modal-' + id).classList.remove('hidden');
                                }
                                
                                function closeModal(id) {
                                    document.getElementById('modal-' + id).classList.add('hidden');
                                }
                            </script>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-8 p-6 bg-white rounded-lg shadow-md max-w-6xl mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-gray-500">Summary</h2>
            <h3 class="text-lg font-bold mb-4 text-blue-500">Total Balance: {{ $totalBalance }}$</h3>
            <h3 class="text-lg font-bold mb-4 text-green-500">Total Income: {{ $totalIncome }}$</h3>
            <h3 class="text-lg font-bold mb-4 text-red-500">Total Expense: {{ $totalExpense }}$</h3>
        </div>
        <section class="mt-8 p-6 bg-white rounded-lg shadow-md max-w-6xl mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-gray-500">Transaction Graph</h2>
        <div class="w-full h-96">
            <canvas id="transactionChart"></canvas>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const transactions = @json($transactions);
            
            // Process data for chart
            const dates = transactions.map(t => t.date);
            const incomeData = transactions.filter(t => t.type === 'income').map(t => t.amount);
            const expenseData = transactions.filter(t => t.type === 'expense').map(t => t.amount);

            // Create chart
            const ctx = document.getElementById('transactionChart').getContext('2d');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Income',
                        data: incomeData,
                        borderColor: '#10B981', // green-500
                        tension: 0.1
                    },
                    {
                        label: 'Expense',
                        data: expenseData,
                        borderColor: '#EF4444', // red-500
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Amount ($)'
                            }
                        },
                        x: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        }
                    }
                }
            });
        </script>
    </section>
    </section>
    
</body>
</html>