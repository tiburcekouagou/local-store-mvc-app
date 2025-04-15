<?php
namespace Core\Facades;

use App\Services\Mailer;

class Mail extends Facade {
    protected static function getFacadeAccessor(): string {
        return Mailer::class;
    }
}