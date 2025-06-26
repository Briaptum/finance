<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')

</head>
<body>
    <header class="bg-blue-500 text-white p-4">
        <div class="flex justify-between items-center mx-auto max-w-4xl">
            <h1 class="text-2xl font-bold">Trackance</h1>
            <a href="{{ route('transactions.create') }}" class="bg-white text-blue-500 p-2 rounded-md">Create Transaction</a>
        </div>
    </header>

    <section class="py-8 bg-gray-100 h-screen">
        <table class="table-auto w-full mx-auto max-w-4xl bg-white rounded-lg shadow-md overflow-hidden">
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
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $transaction->type }}</td>
                        <td class="px-4 py-2">{{ $transaction->category }}</td>
                        <td class="px-4 py-2">{{ $transaction->amount }}</td>
                        <td class="px-4 py-2">{{ $transaction->description }}</td>
                        <td class="px-4 py-2">{{ $transaction->date }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('transactions.edit', $transaction->id) }}" class="text-blue-500">Edit</a>
                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>