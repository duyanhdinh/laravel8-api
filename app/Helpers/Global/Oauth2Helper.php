<?php

use Illuminate\Support\Facades\Http;

if (! function_exists('oauth2')) {
    /**
     * @param $params
     * @return array
     */
    function oauth2($params)
    {
        try {
            $response = Http::asForm()
                ->post(env('APP_URL_DOCKER') . '/oauth/token', [
                    'grant_type' => 'password',
                    'client_id' => $params['id'],
                    'client_secret' => $params['secret'],
                    'username' => $params['email'],
                    'password' => $params['password'],
                    'scope' => '*',
                ]);

            return [
                'code' => config('constants.code.success'),
                'data' => json_decode((string) $response->getBody(), true),
            ];
        } catch(\Exception $e) {
            return [
                'code' => config('constants.code.error'),
                'message' => $e->getMessage(),
            ];
        }
    }
}

if (! function_exists('oauth2_user')) {
    /**
     * @param $email
     * @param $password
     * @return array
     */
    function oauth2_user($email, $password)
    {
        $data = [
            'id' => env('GRAND_USER_ID'),
            'secret' => env('GRAND_USER'),
            'email' => $email,
            'password' => $password,
        ];

        return oauth2($data);
    }
}
