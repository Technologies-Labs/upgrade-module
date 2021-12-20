<?php

namespace Modules\Upgrade\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Upgrade\Entities\Plan;
use Modules\User\Entities\Upgrade;
use Modules\User\Services\UpgradeService;

class UpgradeController extends Controller
{
    public function index()
    {
        $table      = 'upgrade';
        return view('user::dashboard.upgrades.index',[
            'table'         => $table,
        ]);
    }

    public function upgradePage()
    {
        $plans = Plan::all();
        $user = Auth::user();
        return view('upgrade::website.upgrade.index',compact('user','plans'));
    }
}
