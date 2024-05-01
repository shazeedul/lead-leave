<?php

use App\Http\Controllers\LeaveController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\LeaveRequest;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $pendingLeavesCount = count(LeaveRequest::where('status', 'pending')->get());
    $approvedLeavesCount = count(LeaveRequest::where('status', 'approved')->get());
    $rejectedLeavesCount = count(LeaveRequest::where('status', 'rejected')->get());
    return view('dashboard', compact(['pendingLeavesCount', 'approvedLeavesCount', 'rejectedLeavesCount']));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('user', UserController::class)->middleware('auth');
Route::post('/user/block/{user}', [UserController::class, 'block'])->name('user.block')->middleware('auth');
Route::post('/user/active/{user}', [UserController::class, 'active'])->name('user.active')->middleware('auth');
Route::resource('leave', LeaveController::class)->middleware('auth')->except(['destroy']);
Route::post('/leave/approve/{leave}', [LeaveController::class, 'approve'])->name('leave.approve')->middleware('auth');
Route::post('/leave/reject/{leave}', [LeaveController::class, 'reject'])->name('leave.reject')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
