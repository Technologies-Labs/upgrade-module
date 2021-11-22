<?php

namespace Modules\UpgradeModule\Enum;

class UpgradeStatusEnum
{
    const PENDING       = "Pending";
    const APPROVED      = "Approved";
    const CANCELED      = "Canceled";
    const FAILED        = "Failed";


    const STATUS = [
        self::PENDING,
        self::APPROVED,
        self::CANCELED,
    ];

}
