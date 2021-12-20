<?php

namespace Modules\Upgrade\Enum;

use Modules\Upgrade\Plans\AdvancedPlan;
use Modules\Upgrade\Plans\BasicPlan;
use Modules\Upgrade\Plans\ProfessionalPlan;

class UpgradePlanEnum
{
    const SUPER_ADMIN   = "SUPER_ADMIN";
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
