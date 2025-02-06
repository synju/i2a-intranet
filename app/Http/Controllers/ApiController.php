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

		# Accounts
		public function getAccount(Request $request):JsonResponse {
			# Get $request data
			$params = [];
			if($request->input('email_address')) $params['email_address'] = $request->input('email_address');
			if($request->input('password')) $params['password'] = $request->input('password');

			# Validate required parameters
			if(!isset($params['email_address']) || !isset($params['password'])) {
				return response()->json(['Error' => 'Missing Credentials'], 400);
			}

			try {
				# Execute custom SQL query to get user
				$user = DB::select('SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1', [
					$params['email_address'],
					$params['password'],
				]);

				# Check if user was found
				if(empty($user)) {
					return response()->json(['Error' => 'User not found'], 404);
				}

				# Return user data
				return response()->json(['user' => $user[0]], 200);
			}
			catch(Exception $e) {
				Log::error("Database error: " . $e->getMessage());
				return response()->json(['Error' => 'Database error', 'details' => $e->getMessage()], 500);
			}
		}
	}
