<?php
namespace Flutterwave;

class Bin {

  //@var array respresents both staging and production server url
  private static $url = [
    "staging" => "http://staging1flutterwave.co:8080/pwc/rest/fw/check/",
    "production" => ""
  ];

  /**
  * used to retrieve card information with first 6 digits
  * @param string $first6digits
  * @return ApiResponse
  */
  public static function check($first6digits) {
    $resource = self::$url[Flutterwave::getEnv()];
    return (new ApiRequest($resource))
            ->addBody("card6", $first6digits)
            ->makePostRequest();
  }
}