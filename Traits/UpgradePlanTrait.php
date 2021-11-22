<?php

namespace Modules\UpgradeModule\Traits;

use App\Models\User;
use Modules\UpgradeModule\Enum\UpgradeStatusEnum;

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
