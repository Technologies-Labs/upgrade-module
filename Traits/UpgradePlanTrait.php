<?php

namespace Modules\Upgrade\Traits;

use App\Models\User;
use Modules\Upgrade\Enum\UpgradeStatusEnum;

trait UpgradePlanTrait
{
    public function checkUpgrade(User $user , $plan)
    {
        return $user->upgrades
        ->where('next_package',$plan)
        ->where('status', UpgradeStatusEnum::APPROVED)
        ->where('is_active', 1)
        ->first();
    }
}
