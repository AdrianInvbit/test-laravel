<?php

namespace App\Http\Controllers;

use App\Support\DeploymentMetadata;
use Illuminate\Http\JsonResponse;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $metadata = DeploymentMetadata::all();

        return response()->json([
            'status' => 'ok',
            'name' => $metadata['name'],
            'version' => $metadata['version'],
        ]);
    }
}
