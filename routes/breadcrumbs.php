<?php

// Dashboard
Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// Dashboard > Users
Breadcrumbs::for('admin.users.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Users', route('admin.users.index'));
});

// Dashboard > Users > [user]
Breadcrumbs::for('admin.users.show', function ($trail, $user) {
    $trail->parent('admin.users.index');
    $trail->push($user->firstname . ' ' . $user->surname, route('admin.users.show', $user->id));
});

// Dashboard > Users > [user]
Breadcrumbs::for('admin.users.edit', function ($trail, $user) {
    $trail->parent('admin.users.show', $user);
    $trail->push('Edit');
});

// Dashboard > Features
Breadcrumbs::for('admin.features.index', function ($trail) {
    $trail->parent('admin.dashboard');
    $trail->push('Features', route('admin.features.index'));
});