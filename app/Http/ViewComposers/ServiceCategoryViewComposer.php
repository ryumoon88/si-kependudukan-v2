<?php

namespace App\Http\ViewComposers;

use App\Models\ServiceCategory;
use Illuminate\Contracts\View\View;

class ServiceCategoryViewComposer
{
    public function compose(View $view)
    {
        $serviceCategories = ServiceCategory::all();
        $view->with('serviceCategories', $serviceCategories);
    }
}