<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MainController extends Controller
{
    public function getHome()
    {
        return view('index', ['isHome' => true]);
    }

    public function getCompany()
    {
        return view('company');
    }

    public function getServices()
    {
        return view('services');
    }

    public function getRates()
    {
        return view('rates');
    }

    public function clearCache(Request $request)
    {
        $expectedToken = env('CACHE_CLEAR_TOKEN');
        $providedToken = (string) $request->query('token', '');

        if (empty($expectedToken)) {
            return response()->json([
                'ok' => false,
                'message' => 'CACHE_CLEAR_TOKEN is not configured.',
            ], 500);
        }

        if (!hash_equals($expectedToken, $providedToken)) {
            return response()->json([
                'ok' => false,
                'message' => 'Unauthorized.',
            ], 403);
        }

        $commands = ['cache:clear', 'config:clear', 'route:clear', 'view:clear'];
        $results = [];

        foreach ($commands as $command) {
            try {
                Artisan::call($command);
                $results[$command] = trim((string) Artisan::output()) ?: 'OK';
            } catch (\Throwable $exception) {
                $results[$command] = 'ERROR: ' . $exception->getMessage();
            }
        }

        return response()->json([
            'ok' => true,
            'message' => 'Cache-related commands executed.',
            'results' => $results,
        ]);
    }
}
