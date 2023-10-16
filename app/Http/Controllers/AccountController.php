<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ItemController;


class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        if (!Auth::check()) {
            return view('auth.login');
        }

        if($user->role != 'owner') {
            return redirect()->route('item.index')->with('error', 'You do not have permission to access this page');
        }

        $query = $request->input('query');
        if($query != null) {
            $users = User::where('first_name', 'LIKE', "%$query%")->orWhere('last_name', 'LIKE', "%$query%")->paginate(10);
        }
        else{
            $users = User::paginate(10);            
        }
        return view('owner.accounts', compact('users'));
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
        $amount = (int) $request->input('amount');
        if ($amount <= 0) {
            return redirect()->route('account.index')->with('error', 'Invalid amount.');
        }

        $password = $request->input('password');

        if (Hash::check($password, Auth::user()->password)) {
            for ($i = 0; $i < $amount; $i++) {
                $username = Str::random(8);
                $password = Str::random(12);

                User::create([
                    'username' => $username,
                    'password' => Hash::make($password),
                ]);

                $accounts[] = [
                    'username' => $username,
                    'password' => $password,
                ];
            }

            return redirect()->route('account.index')->with('success', "Accounts ($amount) generated successfully. Please change passwords immediately.")->with('accounts', $accounts);
        }

        return redirect()->route('account.index')->with('error', 'Incorrect password.');
    }


    
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'contact_number' => 'nullable|string|max:12',
            'emergency_contact' => 'nullable|string|max:12',
            'email' => 'nullable|email|max:255',
        ]);
        
        $user = User::findOrFail($id);
        $user->update($request->all());
        if(Auth::user()->role == 'owner') {
            return redirect()->route('account.index')->with('success', 'Account updated successfully.');
        }
        elseif(Auth::user()->role == 'employee') {
            return redirect()->route('item.index')->with('success', 'Account updated successfully.');
        }
    }
        
    
    
    public function updatePassword(Request $request, string $id)
    {
        $request->validate([
            'current_password' => 'required|string|min:8',
            'new_password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8|same:new_password',
        ]);

        $user = User::findOrFail($id);

        if (Hash::check($request->current_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->new_password),
            ]);
            return redirect()->route('account.index')->with('success', 'Password updated successfully.');
        } else {
            return redirect()->route('account.index')->with('error', 'Incorrect current password.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('account.index')->with('success', 'Account deleted successfully.');
    }
}
