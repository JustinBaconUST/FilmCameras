<?php
 
namespace App\Http\Controllers;
 
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\Paginator;
 
class users extends Controller
{
    public function updateProfilePicture(Request $request)
    {
        $request->validate([
            'profileIMG' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $user = User::where('email',auth()->user()->email)->first();
    
        $file = $request->file('profileIMG');
 
        // You can customize the file name and directory as needed
        $fileName = time() . '_' . $file->getClientOriginalName();
        $uploadPath = public_path('profilepicture');
        $file->move($uploadPath, $fileName);
 
        // Get the full path of the uploaded file
        $filePath = $uploadPath . '/' . $fileName;
 
        $user->profileIMG='profilepicture/' . $fileName;
 
 
        $user->save();
    
        return redirect()->back()->with('success', 'Profile picture updated successfully.');
    }
    public function ChangePassword(Request $request)
    {
        $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required|string|min:8|confirmed',
        ]);
    
        $user = User::where('email', auth()->user()->email)->first();
    
        // Check if the current password matches the one in the database
        if (!Hash::check($request->input('currentPassword'), $user->password)) {
            return redirect()->back()->withErrors(['currentPassword' => 'Incorrect current password.']);
        }
        if ($request->input('newPassword') !== $request->input('newPassword_confirmation')) {
            return redirect()->back()->withErrors(['newPassword_confirmation' => 'New password and Confirm password do not match.']);
        }
    
        // Update the password
        $user->password=Hash::make($request->input('newPassword'));
        $user->save();
 
        return redirect()->back()->with('success', 'Password changed successfully.');
    }
 
    public function displayUser()
    {
        $users = User::all();
        return view('admin.manageusers', compact('users'));
    }
 
    public function deleteUser($id)
    {
        $user = User::find($id);
 
        if (!$user) {
            return redirect()->back()->withErrors(['error' => 'User not found.']);
         }
 
        $user->delete();
 
        return redirect()->back()->with('success', 'User deleted successfully.');
    }

    public function editUser($id)
    {
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    return view('admin.edituser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
    $user = User::find($id);

    if (!$user) {
        return redirect()->back()->withErrors(['error' => 'User not found.']);
    }

    $request->validate([
        'fName' => 'required',
        'lName' => 'required',
        'phoneNumber' => 'required',
        'username' => 'required',
        'email' => 'required|email',
        // Add more validation rules for other fields as needed
    ]);

    $user->fName = $request->input('fName');
    $user->lName = $request->input('lName');
    $user->phoneNumber = $request->input('phoneNumber');
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    // Update other fields as needed

    $user->save();

    return redirect()->route('AllUser')->with('success', 'User updated successfully.');
    }
}