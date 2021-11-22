<?php

namespace Modules\UpgradeModule\Plans;

use App\Models\User;
use Modules\UpgradeModule\Abstracts\PlanContract;
use Modules\UpgradeModule\Entities\Plan;
use Modules\UpgradeModule\Enum\UpgradePlanEnum;

class AdvancedPlan extends PlanContract
{
    private $key  = UpgradePlanEnum::ADVANCED;

    public function __construct()
    {
        $plan               = Plan::where('key',$this->key)->first();
        $this->id           = $plan->id;
        $this->price        = $plan->price;
        $this->period       = $plan->period;
    }

    public function handler(User $user)
    {
        return (app('wallet')->getUserWallet($user)->withdraw($this->price))->getData();


        // if(!$checkWalletBalane->getData()->success)
        // {
        //     return response()->json([
        //         'success'       => false,
        //         'icon'          => 'error',
        //         'message'       => 'Your Wallet Balance is not enough',
        //     ]);
        // }


    }
}
