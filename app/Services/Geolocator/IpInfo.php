<?php

namespace App\Services\Geolocator;

use App\Contracts\Geolocator;
use App\DataTransferObjects\Geolocation;
use ipinfo\ipinfo\IPinfo as BaseIpInfo;

class IpInfo implements Geolocator
{
  public function locate(string $ip): Geolocation
  {
    $ipInfo = new BaseIpInfo(config("ipinfo.access_token"));

    $details = $ipInfo->getDetails($ip);

    return new Geolocation($ip, $details->city, $details->country, $details->timezone, $details->org);
  }
}