<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Fortify\Fortify;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configurePermissions();

        Fortify::authenticateUsing(function (Request $request) {
            // Validate the captcha using the Validator facade
            $validator = Validator::make($request->all(), [
                'captcha' => ['required', 'captcha'],
            ]);

            if (config('app.login_captcha') === true && $validator->fails()) {
                throw ValidationException::withMessages([
                    'captcha' => __('The captcha verification failed. Please try again.'),
                ]);
            }

            $user = User::where('email', $request->email)->first();
            if ($user) {
                if ($user->status == 1 && Hash::check($request->password, $user->password)) {
                    if (!session()->has('locale')) {
                        session(['locale' => app()->getLocale()]);
                    }

                    return $user;
                } else {
                    throw ValidationException::withMessages([
                        'email' => $user->status != 1 ? __('Your account is inactive.') : __('These credentials do not match our records.'),
                    ]);
                }
            }
        });

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     */
    protected function configurePermissions(): void
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::permissions([
            'create',
            'read',
            'update',
            'delete',
        ]);
    }
}
