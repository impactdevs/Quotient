<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExpenseRequest;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Department;
use App\Models\Event;
use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource (for the logged-in user).
     */
    public function index()
    {
        $totalExpenses=Expense::sum('amount');
        $averageExpense=Expense::average('amount');
        $positions = Position::pluck('position_name', 'position_id')->toArray();
        $departments = Department::pluck('department_name', 'department_id')->toArray();
        $users = User::pluck('name', 'id')->toArray() ?? [];


        // Keep the options separate for later use if needed
        $options = [
            'positions' => $positions,
            'departments' => $departments,
            'users' => $users,
        ];
        $expenses = Expense::latest()->paginate();
        return view('expenses.index', compact('expenses', 'options', 'totalExpenses', 'averageExpense'));
    }

    /**
     * Show the form for creating a new expense.
     */
    public function create()
    {        
        $positions = Position::pluck('position_name', 'position_id')->toArray();
        $departments = Department::pluck('department_name', 'department_id')->toArray();
        $users_without_all = User::pluck('name', 'id')->toArray();
        $allUsersOption = ['0' => 'All'];
        $users = array_merge($allUsersOption, $users_without_all);
        //sort users to start with 'All'
        $options = array_merge($positions, $departments, $users);
        $expenses = ['Transport'=>'Transport', 'Airtime'=>'Airtime'];
        return view('expenses.create', compact('expenses', 'users', 'positions', 'departments'));
    }

    public function store(ExpenseRequest $request)
    {
    
        try {
            $validated = $request->validated();

            if ($request->hasFile('receipt_path') && $request->file('receipt_path')->isValid()) {
            // Store the receipt and get the path
            $receiptPath = $request->file('receipt_path')->store('receipts', 'public');
            }
            
            // Create the expense record
            $expense = Expense::create([
                'user_id' => Auth()->user()->id,
                'expense_type' => $validated['expense_type'],
                'amount' => $validated['amount'],
                'date' => $validated['date'],
                'description' => $validated['description'],
                'receipt_path' => $receiptPath??null,
                'category' => $validated['category'],
                'status' => 'pending',  // default status
            ]);
    

            // Return success message and redirect to the expense details page
            return redirect()->route('expenses.show', $expense)->with('success', 'Expense submitted successfully!');
        } catch (\Exception $e) {
            // Log the error and show an error message to the user
            Log::error('Error storing expense: ' . $e->getMessage());
    
            return redirect()->back()->with('error', 'There was an error submitting your expense. Please try again later.');
        }
    }
    
    /**
     * Display a single expense (with authorization check).
     */
    public function show(Expense $expense) // Use route model binding
    {
        // Ensure the user owns the expense or is an approver
        return view('expenses.show', compact('expense'));
    }

    /**
     * Show the form for editing (optional: only allow edits for "pending" expenses).
     */
    public function edit(Expense $expense)
    {
        $positions = Position::pluck('position_name', 'position_id')->toArray();
        $departments = Department::pluck('department_name', 'department_id')->toArray();
        $users_without_all = User::pluck('name', 'id')->toArray();
        $allUsersOption = ['0' => 'All'];
        $users = array_merge($allUsersOption, $users_without_all);
        //sort users to start with 'All'
        $options = array_merge($positions, $departments, $users);
        $expenses = ['Transport'=>'Transport', 'Airtime'=>'Airtime'];
        return view('expenses.edit', compact('expense', 'expenses', 'users', 'positions', 'departments'));
    }

    /**
     * Update an expense (optional).
     */
    public function update(ExpenseRequest $request, Expense $expense)
    {
        try {
            $validated = $request->validated();

            if ($request->hasFile('receipt_path') && $request->file('receipt_path')->isValid()) {
            // Store the receipt and get the path
            $receiptPath = $request->file('receipt_path')->store('receipts', 'public');
            $validated['receipt_path'] = $receiptPath;
            }

        $expense->update($validated);
        return redirect()->route('expenses.show', $expense)->with('success', 'Expense updated!');
    }catch (\Exception $e) {
        // Log the error and show an error message to the user
        Log::error('Error storing expense: ' . $e->getMessage());

        return redirect()->back()->with('error', 'There was an error submitting your expense. Please try again later.');
    }
}

    /**
     * Delete an expense (optional).
     */
    public function destroy(Expense $expense)
    {
        Storage::disk('public')->delete($expense->receipt_path); // Delete receipt file
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted!');
    }
}