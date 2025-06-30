<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex flex-row justify-between">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    you are logged in as <span class="text-blue-500 underline">{{ auth()->user()->name }}</span>
                </div>
                <div class="p-6 text-gray-900 dark:text-blue-500">
                    <a href="{{ route('transactions.index') }}">See Transactions</a>
                </div>

            </div>
        </div>
    </div>

    <section class="mt-12">

    </section>
</x-app-layout>
