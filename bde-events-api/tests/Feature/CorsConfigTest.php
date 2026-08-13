<?php

namespace Tests\Feature;

use Tests\TestCase;

class CorsConfigTest extends TestCase
{
    public function test_api_allows_local_frontend_origins(): void
    {
        $allowedOrigins = config('cors.allowed_origins', []);

        $this->assertContains('http://localhost:5173', $allowedOrigins);
        $this->assertContains('http://localhost:8080', $allowedOrigins);
    }
}
