<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function IncomePage()
    {
        return view('pages.dashboard.income-page');
    }

    public function CreateIncome(Request $request)
    {
        $user_id = $request->header('id');
        return Income::create([
            'user_id' => $user_id,
            'category_id' => $request->input('category_id'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date')
        ]);
    }

    public function IncomeList(Request $request)
    {
        $user_id = $request->header('id');
        return Income::with('category')->where('user_id', $user_id)->get();
    }

    public function UpdateIncome(Request $request)
    {
        $income_id = $request->input('id');
        $user_id = $request->header('id');
        return Income::where('user_id', $user_id)->where('id', $income_id)->update([
            'category_id' => $request->input('category_id'),
            'amount' => $request->input('amount'),
            'description' => $request->input('description'),
            'date' => $request->input('date'),
        ]);
    }

    public function DeleteIncome(Request $request)
    {
        $income_id = $request->input('id');
        $user_id = $request->header('id');
        return Income::where('id', $income_id)->where('user_id', $user_id)->delete();
    }

    public function IncomeById(Request $request)
    {
        $income_id = $request->input('id');
        $user_id = $request->header('id');
        return Income::where('id', $income_id)->where('user_id', $user_id)->first();
    }

    public function TotalIncome(Request $request)
    {
        $user_id = $request->header('id');
        $totalIncome = Income::where('user_id', $user_id)->sum('amount');
        return response()->json(['totalIncome' => $totalIncome]);
    }
}
