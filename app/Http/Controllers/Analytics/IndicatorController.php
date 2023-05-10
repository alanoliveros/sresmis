<?php

namespace App\Http\Controllers\Analytics;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndicatorController extends Controller
{
/**
 * ['name' => 'Promotion Rate', 'route' => 'admin.components-alerts'],
 * ['name' => 'Retention Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Cohort Survival Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Graduation Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Drop-out Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Failure Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Completion Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Achievement Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Transition Rate', 'route' => 'admin.components-accordion'],
 * ['name' => 'Participation Rate', 'route' => 'admin.components-accordion'],
 */

    public function promotionIndex()
    {
        return view('web.backend.admin.analytics.promotion.index');
    }

    public function retentionIndex()
    {
        return view('web.backend.admin.analytics.retention.index');
    }

    public function cohortIndex()
    {
        return view('web.backend.admin.analytics.cohort.index');
    }

    public function graduationIndex()
    {
        return view('web.backend.admin.analytics.graduation.index');
    }

    public function dropoutIndex()
    {
        return view('web.backend.admin.analytics.dropout.index');
    }

    public function failureIndex()
    {
        return view('web.backend.admin.analytics.failure.index');
    }

    public function completionIndex()
    {
        return view('web.backend.admin.analytics.completion.index');
    }

    public function achievementIndex()
    {
        return view('web.backend.admin.analytics.achievement.index');
    }

    public function transitionIndex()
    {
        return view('web.backend.admin.analytics.transition.index');
    }

    public function participationIndex()
    {
        return view('web.backend.admin.analytics.participation.index');
    }
}
