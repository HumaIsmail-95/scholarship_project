<?php

namespace App\Services\admin;

// use App\Models\Subscription;

use App\Http\Requests\admin\SubscriptionPackageRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\SubscriptionPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionService
{
    public static function getSubscriptions()
    {

        $subscription_packages = SubscriptionPackage::orderBy('id', 'DESC')->paginate(20);
        return $subscription_packages;
    }
    public  static function store(SubscriptionPackageRequest $request)
    {

        DB::beginTransaction();
        $data = $request->validated();
        $data['created_by'] = Auth::user()->id;
        $subscription_package = SubscriptionPackage::create($data);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Subscription added successfully.', 'subscription_package' => $subscription_package];

        return $response;
    }


    public static function update(SubscriptionPackageRequest $request, SubscriptionPackage $subscription_package)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $res = $subscription_package->update($data);
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => ' Subscription updated successfully.', 'subscription_package' => $subscription_package];
        return $response;
    }
    public static function destroy($id)
    {
        DB::beginTransaction();
        $package = SubscriptionPackage::findorFail($id);
        $package->delete();
        DB::commit();
        $response = ['status' => true, 'icon' => 'success', 'heading' => 'Success', 'message' => 'Subscription removed successfully.'];
        return $response;
    }
}
