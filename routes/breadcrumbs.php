<?php

use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('admin.index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('admin.index'));
});

Breadcrumbs::for('resident', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Resident');
});

Breadcrumbs::for('admin.resident.birth.index', function (BreadcrumbTrail $trail) {
    $trail->parent('resident');
    $trail->push('Resident Birth');
});
Breadcrumbs::for('admin.resident.birth.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.birth.index');
    $trail->push('New Resident Birth');
});
Breadcrumbs::for('admin.resident.birth.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.birth.index');
    $trail->push('Resident Birth Detail');
});
Breadcrumbs::for('admin.resident.birth.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.birth.index');
    $trail->push('Edit Resident Birth');
});

Breadcrumbs::for('admin.resident.registered.index', function (BreadcrumbTrail $trail) {
    $trail->parent('resident');
    $trail->push('Registered Resident');
});
Breadcrumbs::for('admin.resident.registered.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.registered.index');
    $trail->push('New Resident');
});
Breadcrumbs::for('admin.resident.registered.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.registered.index');
    $trail->push('Resident Detail');
});
Breadcrumbs::for('admin.resident.registered.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.resident.registered.index');
    $trail->push('Edit Resident');
});

Breadcrumbs::for('service', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Service');
});

Breadcrumbs::for('admin.service.service.index', function (BreadcrumbTrail $trail) {
    $trail->parent('service');
    $trail->push('Services', route('admin.service.service.index'));
});

Breadcrumbs::for('admin.service.service.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.service.index');
    $trail->push('Detail');
});

Breadcrumbs::for('admin.service.service.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.service.index');
    $trail->push('Edit');
});

Breadcrumbs::for('admin.service.service.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.service.index');
    $trail->push('Create');
});

Breadcrumbs::for('admin.service.category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('service');
    $trail->push('Category');
});

Breadcrumbs::for('admin.service.category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.category.index');
    $trail->push('Create');
});

Breadcrumbs::for('admin.service.category.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.category.index');
    $trail->push('Detail');
});

Breadcrumbs::for('admin.service.category.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.category.index');
    $trail->push('Edit');
});

Breadcrumbs::for('admin.service.requirement.index', function (BreadcrumbTrail $trail) {
    $trail->parent('service');
    $trail->push('Requirement');
});

Breadcrumbs::for('admin.service.requirement.create', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.requirement.index');
    $trail->push('Create');
});

Breadcrumbs::for('admin.service.requirement.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.requirement.index');
    $trail->push('Detail');
});

Breadcrumbs::for('admin.service.requirement.edit', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.service.requirement.index');
    $trail->push('Edit');
});

Breadcrumbs::for('admin.submission.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Submission', route('admin.submission.index'));
});

Breadcrumbs::for('admin.submission.show', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.submission.index');
    $trail->push('Detail');
});

Breadcrumbs::for('admin.profile.index', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    $trail->push('Profile');
});


#region user
Breadcrumbs::for('user.index', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('user.index'));
});

Breadcrumbs::for('user.auth.login', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Login', route('user.auth.login'));
});
Breadcrumbs::for('user.auth.register', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Register', route('user.auth.register'));
});
Breadcrumbs::for('user.auth.validate', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Validation', route('user.auth.validate'));
});

Breadcrumbs::for('user.service-category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Service Category');
});

Breadcrumbs::for('user.service.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Service');
});

Breadcrumbs::for('user.my-submission.index', function (BreadcrumbTrail $trail) {
    $trail->parent('user.index');
    $trail->push('Submission', route('user.my-submission.index'));
});

Breadcrumbs::for('user.submission.create', function (BreadcrumbTrail $trail) {
    $trail->parent('user.my-submission.index');
    $trail->push('Create', route('user.submission.create'));
});

Breadcrumbs::for('user.my-submission.show', function (BreadcrumbTrail $trail) {
    $trail->parent('user.my-submission.index');
    $trail->push('Detail');
});
#endregion

#region tmp
Breadcrumbs::for('admin.index2', function (BreadcrumbTrail $trail) {
    $trail->parent('admin.index');
    // $trail->push('Detail');
});
#endregion