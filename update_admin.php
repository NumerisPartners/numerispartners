<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$user = \App\Models\User::first();

if ($user) {
    $user->role = 'admin';
    $user->status = 'active';
    $user->save();
    echo "Utilisateur mis à jour avec succès : {$user->name} est maintenant administrateur.\n";
} else {
    echo "Aucun utilisateur trouvé.\n";
}
