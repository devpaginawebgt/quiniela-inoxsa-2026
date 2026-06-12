<?php

namespace App\Listeners;

use App\Events\ResultCreated;
use App\Http\Services\PrediccionService;
use App\Mail\SystemNotification;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class UpdatePredictionPoints
{
    public function __construct(
        private readonly PrediccionService $prediccionService
    ) {}

    public function handle(ResultCreated $event): void
    {
        try {
            $this->prediccionService->actualizarPuntosGlobalChunked();
        } catch (Throwable $e) {
            $this->notify(
                'UpdatePredictionPoints::handle — Excepción',
                $e->getMessage() . "\n" . $e->getTraceAsString()
            );
        }
    }

    private function notify(string $subject, string $body): void
    {
        Log::warning($subject . ' :: ' . $body);

        $to = config('quiniela.system_notifications_email');

        if (empty($to)) return;

        Mail::to($to)->send(new SystemNotification($subject, $body));
    }
}
