<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Transaction</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-2xl font-bold text-center bg-blue-500 text-white p-4">Create Transaction</h1>
    <form action="{{ route('transactions.store') }}" method="post" class="transaction-form">
        @csrf
        <div class="form-group">
            <label for="type" class="block mb-2">Type:</label>
            <select name="type" id="type" required>
                <option value="income">Income</option>
                <option value="expense">Expense</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category" class="block mb-2">Category:</label>
            <select name="category" id="category" required>
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
            <input type="number" name="amount" id="amount" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="date" class="block mb-2">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="description" class="block mb-2">Description:</label>
            <input type="text" name="description" id="description">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Create</button>
    </form>
</body>
</html>