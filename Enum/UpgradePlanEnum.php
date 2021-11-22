<?php

namespace Modules\UpgradeModule\Enum;

use Modules\UpgradeModule\Plans\AdvancedPlan;
use Modules\UpgradeModule\Plans\BasicPlan;
use Modules\UpgradeModule\Plans\ProfessionalPlan;

class UpgradePlanEnum
{
    const BASIC         = "BASIC";
    const PROFESSIONAL  = "PROFESSIONAL";
    const ADVANCED      = "ADVANCED";

    const PLANS = [
        self::BASIC,
        self::PROFESSIONAL,
        self::ADVANCED,
    ];

    public static function getPlanClass($plan)
    {
        if(!in_array($plan, self::PLANS))
        {
            return null;
        }

        $plans =[
            self::BASIC         => new BasicPlan(),
            self::PROFESSIONAL  => new ProfessionalPlan(),
            self::ADVANCED      => new AdvancedPlan(),
        ];

        return $plans[$plan];
    }

}
