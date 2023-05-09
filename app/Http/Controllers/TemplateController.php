<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    public function componentAlerts()
    {
        return view('web.backend.admin.template.componentsAlerts');
    }

    public function componentAccordion()
    {
        return view('web.backend.admin.template.componentsAccordion');
    }

    public function componentBadges()
    {
        return view('web.backend.admin.template.componentsBadges');
    }

    public function componentBreadcrumbs()
    {
        return view('web.backend.admin.template.componentsBreadcrumbs');
    }

    public function componentButtons()
    {
        return view('web.backend.admin.template.componentsButtons');
    }

    public function componentCards()
    {
        return view('web.backend.admin.template.componentsCards');
    }

    public function componentCarousel()
    {
        return view('web.backend.admin.template.componentsCarousel');
    }

    public function componentListGroup()
    {
        return view('web.backend.admin.template.componentsListGroup');
    }

    public function componentModal()
    {
        return view('web.backend.admin.template.componentsModal');
    }

    public function componentTabs()
    {
        return view('web.backend.admin.template.componentsTabs');
    }

    public function componentPagination()
    {
        return view('web.backend.admin.template.componentsPagination');
    }

    public function componentProgress()
    {
        return view('web.backend.admin.template.componentsProgress');
    }

    public function componentSpinners()
    {
        return view('web.backend.admin.template.componentsSpinners');
    }

    public function componentTooltips()
    {
        return view('web.backend.admin.template.componentsTooltips');
    }

    /** Route::get('/users-profile', [TemplateController::class, 'usersProfile'])->name('sresmis.admin.users-profile')*/
/*
    public function usersProfile()
    {
        return view('web.backend.admin.usersProfile');
    }*/
}
