<?php

namespace KaziRayhan\VivaWallet\Traits;

use KaziRayhan\VivaWallet\Enums\Environment;

trait HasEnv
{
    private Environment $env;

    public function setEnv(string|Environment $env): static
    {
        $this->env = is_string($env) ? Environment::from($env) : $env;

        return $this;
    }
}
