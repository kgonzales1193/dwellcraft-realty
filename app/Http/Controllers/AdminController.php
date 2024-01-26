<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function Dashboard()
    {
        $chartData = [
            'yearlyRevenue' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'revenue' => [350, 500, 950, 700, 900],
                'total' => 3500,
                'currencySymbol' => '$',
            ],
            'productSold' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'quantity' => [800, 600, 1000, 800, 900],
                'total' => 4000,
            ],
            'growth' => [
                'year' => [1991, 1992, 1993, 1994, 1995],
                'perYearRate' => [10, 20, 30, 40, 100],
                'total' => 10,
                'preSymbol' => '+',
                'postSymbol' => '%',
            ],
            'revenueReport' => [
                'month' => ["Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct"],
                'revenue' => [
                    'title' => 'Revenue',
                    'data' => [76, 85, 101, 98, 87, 105, 91, 114, 94],
                ],
                'netProfit' => [
                    'title' => 'Net Profit',
                    'data' => [35, 41, 36, 26, 45, 48, 52, 53, 41],
                ],
                'cashFlow' => [
                    'title' => 'Cash Flow',
                    'data' => [44, 55, 57, 56, 61, 58, 63, 60, 66],
                ],
            ],
            'productGrowthOverview' => [
                'productNames' => ["Books", "Pens", "Pencils", "Box"],
                'data' => [88, 77, 66, 55],
            ],
            'thisYearGrowth' => [
                'label' => ['Yearly Growth'],
                'data' => [66],
            ],
            'investmentAmount' => [
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 10,
                    'profitPercentage' => 50,
                    'loss' => 0,
                    'lossPercentage' => 0,
                ],
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 10,
                    'profitPercentage' => 50,
                    'loss' => 0,
                    'lossPercentage' => 0,
                ],
                [
                    'title' => 'Investment',
                    'amount' => 1000,
                    'currencySymbol' => '$',
                    'profit' => 0,
                    'profitPercentage' => 0,
                    'loss' => 20,
                    'lossPercentage' => 30,
                ]
            ],
            'users' => User::latest()->paginate(5),
        ];

        return view('admin.admin_dashboard', [
            'pageTitle' => 'Dashboard',
            'data' => collect($chartData),
        ]);
    }
}
