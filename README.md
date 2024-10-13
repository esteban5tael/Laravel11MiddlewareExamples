# README

## Introducción

En este proyecto, he realizado un pequeño ejemplo de uso básico de middlewares en LARAVEL 11. A continuación, se detallan los pasos que he seguido (Más o menos 🤓):

### 1. Modificación de la migración de `users`

Hemos añadido un nuevo campo llamado `role` a la migración de la tabla `users` para gestionar diferentes tipos de usuarios. Las definiciones son las siguientes:

-   `0` => `admin` (Administrador)
-   `1` => `user` (Usuario)
-   `2` => `guest` (Invitado)

Además, se han creado seeders para añadir algunos usuarios por defecto.

### 2. Creación de Middlewares

Utilizando la línea de comandos, hemos creado tres middlewares. Por ejemplo, para crear un middleware para administradores, ejecutamos:

```bash
php artisan make:middleware AdminMiddleware
```

En este middleware, implementamos la lógica de validación. A continuación, se muestra un ejemplo de cómo se puede configurar:

```php
public function handle(Request $request, Closure $next): Response
{
    if (auth()->user()->role === 0) {
        return $next($request);
    } else {
        return to_route('error.forbiden');
    }
}
```

### 3. Adición de Aliases a los Middlewares

A continuación, hemos agregado los aliases de los middlewares en el archivo `app` de la carpeta `bootstrap`. Un ejemplo de cómo hacerlo es el siguiente:

```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => AdminMiddleware::class,
    ]);
})
```

### 4. Creación de un Controlador y una Vista

Hemos creado un controlador y una vista para proporcionar contenido y estructura al proyecto. Para crear un controlador, ejecutamos:

```bash
php artisan make:controller AdminController -i
```

En la función `__invoke`, indicamos la vista que deseamos mostrar. A continuación, se presenta un ejemplo:

```php
public function __invoke(Request $request)
{
    return view('modules.admin.index');
}
```

(Recuerda crear esta vista. Por practicidad, yo copié la de `dashboard` y modifiqué el contenido necesario.)

### 5. Configuración de Rutas

Finalmente, configuramos las rutas. Aquí tienes un ejemplo básico de cómo agrupar las rutas de administrador:

```php
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', AdminController::class)->name('admin.index');
});
```

### 6. Migraciones y Seeders

Puedes ejecutar el siguiente comando para crear la base de datos configurada en tu archivo `.env` (en mi caso, utilizo SQLite) y para crear tres usuarios de prueba:

```bash
php artisan migrate && php artisan db:seed
```

### (Opcional) Manejo de Errores 403

He creado un método en el `SiteController` para manejar la ruta que redirige a una vista 403 más sencilla:

```php
Route::get('/errors/forbiden', [_SiteController::class, 'forbiden'])->name('error.forbiden');
```

## Conclusión

¡Listo! Ahora solo queda probar la aplicación. He añadido algunas vistas y contenido, así como middlewares para usuarios e invitados.
