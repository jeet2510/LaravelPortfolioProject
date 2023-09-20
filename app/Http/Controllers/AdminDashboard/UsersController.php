<?php

namespace App\Http\Controllers\AdminDashboard;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'id'); 
        $users = User::orderBy($sort)
                ->where('role', 'user')
                ->paginate(10);
        return view('dashboard.users.index', compact('users'));
    }
    public function store(Request $request)
    {
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users|max:255',
                'status' => 'required|in:active,inactive'
            ]);
            $user = new User;
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = 'thisispassword';
            $user->status = $request->input('status');
            $user->role = 'user';
            $user->save();
    
            return redirect()->route('home')->with('success', 'User created successfully.');
        }
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['role' => $request->role]);
        return redirect()->route('dashboard.users.index')->with('success', 'User role updated successfully.');
    }

    public function changeStatus($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => $user->status === 'active' ? 'inactive' : 'active']);
        return redirect()->route('users.index')->with('success', 'User status changed successfully.');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function bulkActions(Request $request)
    {
        $action = $request->input('action');

        if ($action === 'changeStatus') {
            foreach ($request->user_ids as $userId) {
                $user = User::findOrFail($userId);
                $user->update(['status' => $user->status === 'active' ? 'inactive' : 'active']);
            }
            return redirect()->route('users.index')->with('success', 'Users status changed successfully.');
        } elseif ($action === 'bulkDelete') {
            User::whereIn('id', $request->user_ids)->delete();
            return redirect()->route('users.index')->with('success', 'Users deleted successfully.');
        } elseif ($action === 'searchUser') {
            $search = $request->input('search');
            $users = User::where('name', 'like', "%$search%")
                        ->orWhere('email', 'like', "%$search%")
                        ->where('role','user')
                        ->paginate(10);
            $numResults = $users->total(); 
            $searchTerm = $search; 
                        
            return view('dashboard.users.index', compact('users', 'numResults', 'searchTerm'));
        }
        return redirect()->back()->with('success', 'Bulk action completed successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }
}
