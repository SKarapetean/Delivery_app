<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];


    public function render($request, Throwable $e)
    {
        dd($e);
        $httpCode = Response::HTTP_INTERNAL_SERVER_ERROR;
        $statusCode =  $e->getCode();
        $details = [
            'message' => $e->getMessage(),
        ];

        if ($e instanceof ApiException) {
            $httpCode = $e->getHttpStatusCode();
            $statusCode = $e->getStatus();
            $details['message'] = $e->getMessage();
        }

        $data = [
            'status'  => $statusCode,
            'errors' => $details,
        ];

        if (str_starts_with($httpCode, 5) && !config('app.debug')) {
            $data['errors'] = [
                'message' => 'Server error',
            ];
        }

        return response()->json($data, $httpCode);
    }

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
