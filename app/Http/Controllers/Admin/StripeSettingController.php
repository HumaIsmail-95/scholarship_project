<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class StripeSettingController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:view-stripe', ['only' => ['index']]);
        $this->middleware('permission:edit-stripe-key', ['only' => ['update']]);
    }
    public function index()
    {
        try {
            $stripePublicKey = env('STRIPE_KEY');
            $stripeSecretKey = env('STRIPE_SECRET');

            return view('admin.pages.settings.stripe.edit', compact('stripePublicKey', 'stripeSecretKey'));
        } catch (\Throwable $th) {
            return [
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ];
        }
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'stripe_public_key' => 'required',
                'stripe_secret_key' => 'required',
            ]);
            $newPublicKey = $request->input('stripe_public_key');
            $newSecretKey = $request->input('stripe_secret_key');
            // Update the .env file programmatically
            $envFilePath = base_path('.env');
            if (file_exists($envFilePath)) {
                // Read the existing .env file
                $envFileContents = file_get_contents($envFilePath);

                // Replace the existing values with the new values
                $envFileContents = preg_replace(
                    '/STRIPE_KEY=.*/',
                    'STRIPE_KEY=' . $newPublicKey,
                    $envFileContents
                );

                $envFileContents = preg_replace(
                    '/STRIPE_SECRET=.*/',
                    'STRIPE_SECRET=' . $newSecretKey,
                    $envFileContents
                );

                // Write the updated contents back to the .env file
                file_put_contents($envFilePath, $envFileContents);

                // Update the configuration values in the current runtime
                config(['services.stripe.key' => $newPublicKey]);
                config(['services.stripe.secret' => $newSecretKey]);
            }
            return redirect()->back()->with([
                'status' => true, 'icon' => 'success', 'heading' => 'Success',
                'message' => 'Stripe API keys updated successfully'
            ]);
        } catch (\Throwable $th) {
            return redirect()->back()->with([
                'status' => false, 'icon' => 'error', 'heading' => 'Error',
                'message' => $th->getMessage()
            ]);
        }
    }
}
