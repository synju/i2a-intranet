<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller {
	# Debugging & Logging
	public function debugStatus() {
		return response()->json([
															'debug' => config('app.debug')
														]);
	}

	public function log(Request $request) {
		# Get $request data
		$info = $request->input('info');

		# Log the info to laravel.log
		Log::info("Vue.js log: {$info}");

		# Return
		return response()->json(['status' => 'Logged'], 200);
	}

	# Test Endpoint
	public function testEndpoint(Request $request):JsonResponse {
		# Get $request data
		$params = [];
		$params['sampleValue'] = ($request->input('sampleValue')) ? $request->input('sampleValue') : false;

		// Simulate some data processing
		$data = [
			'sampleValue' => $params['sampleValue'],
		];

		// Return a JSON response
		return response()->json($data, 200);

		//Log::info($date);
	}
}
