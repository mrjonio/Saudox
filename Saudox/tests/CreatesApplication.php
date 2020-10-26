<?php

namespace Tests;

use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        $this->limpada_no_cache();

        return $app;
    }

    /*
    * Limpar todo o cache do laravel
    *
    * Para resolução do bug no pbpUnit que faz os testes serem executados
    * em um tempo muito lento.
    *
    * Finalmente resolvido!
    */
    protected function limpada_no_cache() {
        $comandos = ['clear-compiled', 'cache:clear', 'view:clear', 'config:clear', 'route:clear'];
        foreach ($comandos as $cmd) {
            \Illuminate\Support\Facades\Artisan::call($cmd);
            // Mesma coisa de executar `php artisan <comando>`
        }
    }

}
