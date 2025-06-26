<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaction</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class="text-2xl font-bold text-center bg-blue-500 text-white p-4">Edit Transaction</h1>
    <form action="{{ route('transactions.update', $transaction->id) }}" method="post" class="transaction-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="type" class="block mb-2">Type:</label>
            <select name="type" id="type" required>
                <option value="income" {{ $transaction->type == 'income' ? 'selected' : '' }}>Income</option>
                <option value="expense" {{ $transaction->type == 'expense' ? 'selected' : '' }}>Expense</option>
            </select>
        </div>
        <div class="form-group">
            <label for="category" class="block mb-2">Category:</label>
            <select name="category" id="category" required>
                <optgroup label="Income">
                    <option value="salary" {{ $transaction->category == 'salary' ? 'selected' : '' }}>Salary</option>
                    <option value="investment" {{ $transaction->category == 'investment' ? 'selected' : '' }}>Investment</option>
                    <option value="bonus" {{ $transaction->category == 'bonus' ? 'selected' : '' }}>Bonus</option>
                    <option value="other_income" {{ $transaction->category == 'other_income' ? 'selected' : '' }}>Other Income</option>
                </optgroup>
                <optgroup label="Expense">
                    <option value="food" {{ $transaction->category == 'food' ? 'selected' : '' }}>Food</option>
                    <option value="transportation" {{ $transaction->category == 'transportation' ? 'selected' : '' }}>Transportation</option>
                    <option value="utilities" {{ $transaction->category == 'utilities' ? 'selected' : '' }}>Utilities</option>
                    <option value="entertainment" {{ $transaction->category == 'entertainment' ? 'selected' : '' }}>Entertainment</option>
                    <option value="shopping" {{ $transaction->category == 'shopping' ? 'selected' : '' }}>Shopping</option>
                    <option value="other_expense" {{ $transaction->category == 'other_expense' ? 'selected' : '' }}>Other Expense</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label for="amount" class="block mb-2">Amount:</label>
            <input type="number" name="amount" id="amount" step="0.01" required value="{{ $transaction->amount }}">
        </div>
        <div class="form-group">
            <label for="date" class="block mb-2">Date:</label>
            <input type="date" name="date" id="date" required>
        </div>
        <div class="form-group">
            <label for="description" class="block mb-2">Description:</label>
            <input type="text" name="description" id="description" value="{{ $transaction->description }}">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Update</button>
    </form>
</body>
</html>