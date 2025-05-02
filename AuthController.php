namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {
    function loginPage() { return view('login'); }
    function registerPage() { return view('register'); }
    function login(Request $r) {
        if (Auth::attempt($r->only('email','password'))) return redirect('dashboard');
        return back();
    }
    function register(Request $r) {
        User::create([
            'name' => $r->name,
            'email' => $r->email,
            'password' => bcrypt($r->password),
        ]);
        return redirect('login');
    }
    function logout() {
        Auth::logout();
        return redirect('login');
    }
}