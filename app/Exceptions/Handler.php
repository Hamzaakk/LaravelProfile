<?php

namespace App\Exceptions;
use Illuminate\Database\QueryException;
use PDOException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function(NotFoundHttpException $notfound,Request $request){
            if($request->is('api/*')){
                return response([
                    'message'=> 'Error message',
                    // '$request' =>$request
                ],404);
            }
        });
            
        
    }

    
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof QueryException || $exception instanceof PDOException) {
            // Return a "Page Not Found" view or redirect to an appropriate error page
            return redirect()->route('errors404');
            
        }
    
        return parent::render($request, $exception);
    }
    
    
}
