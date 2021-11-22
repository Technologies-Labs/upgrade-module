<?php

namespace Modules\UpgradeModule\Http\Livewire\Plans;

use Auth;
use Carbon\Carbon;
use DB;
use Livewire\Component;
use Modules\UpgradeModule\Enum\UpgradePlanEnum;
use Modules\UpgradeModule\Enum\UpgradeStatusEnum;
use Modules\UpgradeModule\Services\UpgradeService;
use Modules\UpgradeModule\Traits\UpgradePlanTrait;

class ChoosePlan extends Component
{
    use UpgradePlanTrait;
    public $user;
    public $plans;
    public $currentPackage;

    public function __construct()
    {
        $this->plans = UpgradePlanEnum::PLANS;
    }

    public function mount()
    {
        $this->currentPackage = $this->user->roles->first()->name;
    }

    public function render()
    {
        return view('upgrademodule::livewire.plans.choose-plan');
    }

    public function upgrade($plan)
    {

        if (!in_array($plan , $this->plans)) {
            $this->emit('showMessage', ['icon' =>'error', 'text' => 'ERROR', 'title' => 'ERROR']);
            return;
        }
        $user    = $this->user;
        $upgrade = $this->checkUpgrade($user, $plan);
        if ($upgrade) {
            $this->emit('showMessage', ['icon' =>'info', 'text' => 'Already Exists', 'title' => 'Already Exists']);
            return;
        }

        $planClass  = UpgradePlanEnum::getPlanClass($plan);
        $handler    = $planClass->handler($user);

        if($handler->success){
            $user->upgrades()
            ->where('status', UpgradeStatusEnum::APPROVED)
            ->update([
                'is_active'     => 0 ,
                'status'        => UpgradeStatusEnum::CANCELED,
                'start_date'    => null,
                'end_date'      => null,
            ]);
        }

        $upgrade     = (new UpgradeService())
            ->setCurrentPackage($this->currentPackage)
            ->setNextPackage($plan)
            ->setUser($user)
            ->setIsActive($handler->success)
            ->setStatus($handler->success ? UpgradeStatusEnum::APPROVED : UpgradeStatusEnum::FAILED )
            ->setMessage(!$handler->success ? $handler->message : '' )
            ->setStartDate($handler->success ? Carbon::now() : null )
            ->setEndDate($handler->success ? Carbon::now()->addMonths($planClass->period) : null )
            ->createUpgrade()
            ->getData();

        if ($handler->success) {
            DB::table('model_has_roles')->where('model_id',$user ->id)->delete();
            $user->assignRole($plan);
            $this->currentPackage = $plan;
        }

        $this->emit('showMessage', ['icon' => $handler->icon, 'text' => $handler->message, 'title' => $handler->message]);
    }
}
