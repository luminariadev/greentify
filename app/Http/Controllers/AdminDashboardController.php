<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminDashboardController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function index(): View
    {
        return view('admin.dashboard', [
            'totalUsers' => User::count(),
            'totalArticles' => Article::count(),
            'totalDonations' => Donation::completed()->sum('amount'),
            'donationCount' => Donation::completed()->count(),
        ]);
    }
}
