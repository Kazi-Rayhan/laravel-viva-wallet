<?php

namespace KaziRayhan\VivaWallet\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \KaziRayhan\VivaWallet\VivaWallet
 */
class VivaWallet extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'viva-wallet';
    }
}
