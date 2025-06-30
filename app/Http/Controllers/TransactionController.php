<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = auth()->user()->transactions()->latest()->get();
        $totalIncome = auth()->user()->transactions()->where('type', 'income')->sum('amount');
        $totalExpense = auth()->user()->transactions()->where('type', 'expense')->sum('amount');
        $totalBalance = $totalIncome - $totalExpense;
        return view('transaction', compact('transactions', 'totalIncome', 'totalExpense', 'totalBalance'));
    }
    
    public function create()
    {
        return view('create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:income,expense',
            'category' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'date' => 'required|date',
        ]);
    
        auth()->user()->transactions()->create($validated);
    
        return redirect()->route('transactions.index')->with('success', 'Transaction added successfully.');
    }

    public function show(Transaction $transaction)
    {
        return view('show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $transaction->update($request->all());
        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully');
    }
}
