<?php

namespace Modules\UpgradeModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UpgradeModule\Entities\Plan;
use Modules\UserModule\Entities\Upgrade;
use Modules\UserModule\Services\UpgradeService;

class UpgradeController extends Controller
{
    public function index()
    {
        $table      = 'upgrade';
        return view('usermodule::dashboard.upgrades.index',[
            'table'         => $table,
        ]);
    }

    public function upgradePage()
    {
        $plans = Plan::all();
        $user = Auth::user();
        return view('upgrademodule::website.upgrade.index',compact('user','plans'));
    }
}
