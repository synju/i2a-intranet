<?php

	use Illuminate\Support\Facades\Route;
	use App\Http\Controllers\ApiController;

# API routes
	Route::get('/debug-status', [ApiController::class, 'debugStatus']);
	Route::post('/log', [ApiController::class, 'log']);
	Route::post('/testEndpoint', [ApiController::class, 'testEndpoint']);

# Accounts
	Route::post('/getAccount', [ApiController::class, 'getAccount']);
