<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
    @vite('resources/css/app.css')
</head>
<body>
    <header class="bg-blue-500 text-white p-4">
        <div class="flex justify-between items-center mx-auto max-w-4xl">
            <h1 class="text-2xl font-bold">Trackance</h1>
            <a href="{{ route('transactions.index') }}" class="bg-white text-blue-500 p-2 rounded-md">Back to Transactions</a>
        </div>
    </header>
    <section class="py-8 bg-gray-100 h-screen">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-bold mb-4">Create New Transaction</h2>
            <form action="{{ route('transactions.store') }}" method="post" class="space-y-4">
                @csrf
                <div class="form-group">
                    <label for="type" class="block mb-2">Type:</label>
                    <select name="type" id="type" required class="w-full p-2 border rounded">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="category" class="block mb-2">Category:</label>
                    <select name="category" id="category" required class="w-full p-2 border rounded">
                        <optgroup label="Income">
                            <option value="salary">Salary</option>
                            <option value="investment">Investment</option>
                            <option value="bonus">Bonus</option>
                            <option value="other_income">Other Income</option>
                        </optgroup>
                        <optgroup label="Expense">
                            <option value="food">Food</option>
                            <option value="transportation">Transportation</option>
                            <option value="utilities">Utilities</option>
                            <option value="entertainment">Entertainment</option>
                            <option value="shopping">Shopping</option>
                            <option value="other_expense">Other Expense</option>
                        </optgroup>
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount" class="block mb-2">Amount:</label>
                    <input type="number" name="amount" id="amount" step="0.01" required class="w-full p-2 border rounded">
                </div>
                <div class="form-group">
                    <label for="date" class="block mb-2">Date:</label>
                    <input type="date" name="date" id="date" required class="w-full p-2 border rounded">
                </div>
                <div class="form-group">
                    <label for="description" class="block mb-2">Description:</label>
                    <input type="text" name="description" id="description" class="w-full p-2 border rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Create</button>
            </form>
        </div>
    </section>
</body>
</html>