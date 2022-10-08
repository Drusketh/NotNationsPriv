function GetRealUserIp($default = NULL, $filter_options = 12582912) {
    $HTTP_X_FORWARDED_FOR = isset($_SERVER)? $_SERVER["HTTP_X_FORWARDED_FOR"]:getenv('HTTP_X_FORWARDED_FOR');
    $HTTP_CLIENT_IP = isset($_SERVER)?$_SERVER["HTTP_CLIENT_IP"]:getenv('HTTP_CLIENT_IP');
    $HTTP_CF_CONNECTING_IP = isset($_SERVER)?$_SERVER["HTTP_CF_CONNECTING_IP"]:getenv('HTTP_CF_CONNECTING_IP');
    $REMOTE_ADDR = isset($_SERVER)?$_SERVER["REMOTE_ADDR"]:getenv('REMOTE_ADDR');

    $all_ips = explode(",", "$HTTP_X_FORWARDED_FOR,$HTTP_CLIENT_IP,$HTTP_CF_CONNECTING_IP,$REMOTE_ADDR");
    foreach ($all_ips as $ip) {
        if ($ip = filter_var($ip, FILTER_VALIDATE_IP, $filter_options))
            break;
    }
    return $ip?$ip:$default;
}

function getUserIP() {
    if( array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER) && !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
        if (strpos($_SERVER['HTTP_X_FORWARDED_FOR'], ',')>0) {
            $addr = explode(",",$_SERVER['HTTP_X_FORWARDED_FOR']);
            return trim($addr[0]);
        } else {
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
        }
    }
    else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

https://stackoverflow.com/questions/13646690/how-to-get-real-ip-from-visitor