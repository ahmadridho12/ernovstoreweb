<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('pakan')->group(function () {
    Route::get('/api/stok', function (Request $request) {
        $ayamId = $request->query('ayam_id');
        $pakanId = $request->query('pakan_id');

        $stok = DB::table('monitoring_pakan_detail')
            ->where('ayam_id', $ayamId)
            ->where('pakan_id', $pakanId)
            ->sum('masuk');

        return response()->json([
            'stok' => $stok,
        ]);
    });
});
