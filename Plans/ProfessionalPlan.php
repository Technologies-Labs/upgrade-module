<?php

namespace Modules\Upgrade\Plans;

use App\Models\User;
use Modules\Upgrade\Abstracts\PlanContract;
use Modules\Upgrade\Entities\Plan;
use Modules\Upgrade\Enum\UpgradePlanEnum;

class ProfessionalPlan  extends PlanContract
{
    private $key  = UpgradePlanEnum::PROFESSIONAL;


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
    }
}
