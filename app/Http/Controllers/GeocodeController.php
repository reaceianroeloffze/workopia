<?php

namespace App\Http\Controllers;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GeocodeController extends Controller
{
    /**
     * Make requests to mapbox api to get the coordinates of the locations of jobs
     *
     * @route GET /geocode
     *
     * @param Request $request <p>
     *     The request object containing the search query.
     * </p>
     *
     * @return array <p>
     *     A json array containing the coordinates of the locations.
     * </p>
     *
     * @throws ConnectionException <p>
     *     If the request to the mapbox api fails.
     * </p>
     *
     * */
    public function geocode(Request $request): array
    {
        $address = $request->input('address');
        $apiKey = config('services.mapbox.api_key');
        $response = Http::get(
            "https://api.mapbox.com/geocoding/v5/mapbox.places/$address.json",
            [
                'access_token' => $apiKey,
            ]
        );

        return $response->json();
    }
}
