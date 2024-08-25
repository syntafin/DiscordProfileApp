<?php

namespace App\Http\Controllers;

use App\Models\Lookup;
use App\Models\Setting;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Native\Laravel\Facades\Window;

class MainController extends Controller
{
    public function index()
    {
        if (is_null($this->token())) {
            return inertia('TokenInput');
        }

        return inertia('Index', [
            'lookups' => Lookup::orderBy('id', 'desc')->paginate(10),
        ]);
    }

    public function settingStore(Request $request)
    {
        $request->validate([
            'token' => 'required|string'
        ]);

        Setting::updateOrCreate([
            'key' => 'token'
        ], [
            'value' => $request->token
        ]);
    }

    /**
     * @throws ConnectionException
     */
    public function profile(Request $request)
    {
        $request->validate([
            'userid' => 'required|integer'
        ]);

        $response = Http::withHeader('Authorization', 'Bot '.$this->token())
            ->get('https://discordapp.com/api/users/'.$request->userid);

        if ($response->successful()) {
            $user = $response->json();

            $user['avatar_url'] = $user['avatar'] ? 'https://cdn.discordapp.com/avatars/'.$user['id'].'/'.$user['avatar'].'.webp?size=512' : 'https://cdn.discordapp.com/embed/avatars/0.png';
            $user['banner_url'] = 'https://cdn.discordapp.com/banners/'.$user['id'].'/'.$user['banner'].'.webp?size=512';

            Lookup::updateOrCreate([
                'userid' => $user['id'],
            ], [
                'username' => $user['username'],
                'avatar_url' => $user['avatar_url'],
            ]);

            return inertia('Profile', [
                'user' => $user
            ]);
        }

        return to_route('app.index', [
            'error' => true,
        ]);
    }

    public function minimizeWindow()
    {
        Window::minimize();
    }

    public function closeWindow()
    {
        Window::close();
    }

    protected function token(): string|null
    {
        return Setting::where('key', 'token')->pluck('value')->first();
    }
}
