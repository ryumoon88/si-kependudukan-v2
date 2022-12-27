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

Breadcrumbs::for('admin.resident.registered.index', function (BreadcrumbTrail $trail) {
    $trail->parent('resident');
    $trail->push('Registered Resident');
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