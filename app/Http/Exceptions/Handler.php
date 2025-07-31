<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Log;
use Throwable;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            Log::error($e->getMessage(), ['exception' => $e]);
        });

        $this->renderable(function (ModelNotFoundException $e, $request) {
            Log::info('Handling ModelNotFoundException for model: ' . class_basename($e->getModel()));
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => class_basename($e->getModel()) . ' not found'
                ], 404);
            }
            return redirect()->back()->with('error', class_basename($e->getModel()) . ' not found.');
        });
    }
}
