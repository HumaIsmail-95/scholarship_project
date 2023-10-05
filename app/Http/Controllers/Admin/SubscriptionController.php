<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\SubscriptionPackageRequest;
use App\Models\SubscriptionPackage;
use App\Services\admin\SubscriptionService;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:list-subscription', ['only' => ['index']]);
        $this->middleware('permission:create-subscription', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-subscription', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-subscription', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $packages = SubscriptionService::getSubscriptions();
        return view('admin.pages.subscriptions.index', compact('packages',));
    }
    public function create()
    {
        try {

            return view('admin.pages.subscriptions.create');
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function store(SubscriptionPackageRequest $request)
    {
        try {
            $discipline_response = SubscriptionService::store($request);
            return redirect()->back()->with($discipline_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }


    public function show(SubscriptionPackage $subscription_package)
    {
        // $uni_package = UniSubscription::find($id);
        return view('admin.pages.subscriptions.view', compact('subscription_package'));
    }
    public function edit(SubscriptionPackage $subscription_package)
    {
        try {
            return view('admin.pages.subscriptions.edit', compact(['subscription_package']));
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function update(SubscriptionPackageRequest $request, SubscriptionPackage $subscription_package)
    {
        try {
            $discipline_response = SubscriptionService::update($request, $subscription_package);
            return redirect()->back()->with($discipline_response);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
    public function destroy($id)
    {
        try {
            $discipline_response = SubscriptionService::destroy($id);
            return $discipline_response;
        } catch (\Throwable $th) {
            return [
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ];
        }
    }
}
