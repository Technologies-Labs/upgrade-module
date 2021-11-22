<?php

namespace Modules\UpgradeModule\Services;

use App\Models\User;
use Modules\UpgradeModule\Entities\Upgrade;
use phpDocumentor\Reflection\Types\This;

class UpgradeService
{
    public $currentPackage;
    public $nextPackage;
    public $status;
    public $isActive;
    public $message;
    public $startDate;
    public $endDate;
    public $user;



    public function setCurrentPackage($currentPackage)
    {
        $this->currentPackage = $currentPackage;
        return $this;
    }

    public function setNextPackage($nextPackage)
    {
        $this->nextPackage = $nextPackage;
        return $this;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
        return $this;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
        return $this;
    }

    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;
        return $this;
    }

    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function createUpgrade()
    {
        $upgrade = Upgrade::create([
            'current_package'   => $this->currentPackage,
            'next_package'      => $this->nextPackage,
            'status'            => $this->status,
            'is_active'         => $this->isActive,
            'message'           => $this->message,
            'user_id'           => $this->user->id,
            'start_date'        => $this->startDate,
            'end_date'          => $this->endDate,
        ]);
        return response()->json([
            'success'       =>  true,
            'icon'          => 'success',
            'message'       => 'Upgrade created successfully',
        ]);
    }
}
