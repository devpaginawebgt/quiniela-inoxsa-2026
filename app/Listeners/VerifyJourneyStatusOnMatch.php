<?php

namespace App\Listeners;

use App\Events\MatchCreated;
use App\Http\Services\PartidoService;

class VerifyJourneyStatusOnMatch
{
    public function __construct(
        private readonly PartidoService $partidoService
    ) {}

    public function handle(MatchCreated $event): void
    {
        $this->partidoService->verifyJourneyStatus();
    }
}
