use App\Http\Controllers\AuthController;

Route::get('login', [AuthController::class, 'loginPage']);
Route::post('login', [AuthController::class, 'login']);
Route::get('register', [AuthController::class, 'registerPage']);
Route::post('register', [AuthController::class, 'register']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('dashboard', fn() => view('dashboard'))->middleware('auth');