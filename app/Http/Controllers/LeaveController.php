<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = LeaveRequest::paginate(5);
        return view('leaves', compact('leaves'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(LeaveRequest $leaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LeaveRequest $leave)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, LeaveRequest $leave)
    {
        //
    }

    /**
     * Approve the specified resource
     */
    public function approve(LeaveRequest $leave)
    {
        // can't approve self row
        if ($leave->user_id == auth()->user()->id) {
            return redirect()->back()->with('error', 'You can\'t approve yourself');
        }
        $leave->update(['status' => 'approved']);
        return redirect()->route('leave.index');
    }

    /**
     * Reject the specified resource
     */
    public function reject(LeaveRequest $leave)
    {
        // can't reject self row
        if ($leave->user_id == auth()->user()->id) {
            return redirect()->back()->with('error', 'You can\'t reject yourself');
        }
        $leave->update(['status' => 'rejected']);
        return redirect()->route('leave.index');
    }
}
