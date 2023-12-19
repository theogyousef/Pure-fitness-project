<?php
function logger($log) {
    // Client IP
    $ipv6 = $_SERVER['HTTP_X_FORWARDED_FOR'] ?? $_SERVER['REMOTE_ADDR'];
    $ip=ipv6_to_ipv4($ipv6);
    // Current time
    $time = date('m/d/y h:iA', time());
    
    // Log contents
    $contents = "Client IP: $ip\tTime: $time\t$log\r";
    
    // Append to the log file
    file_put_contents('log.txt', $contents, FILE_APPEND | LOCK_EX);
}


function ipv6_to_ipv4($ipv6) {
    // Check if the input is the loopback address in IPv6 (::1)
    if ($ipv6 == '::1') {
        return '127.0.0.1';
    }

    // Check if the input is a valid IPv6 address
    if (!filter_var($ipv6, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        return false;
    }

    // Convert IPv6 to packed in_addr representation
    $packedIPv6 = inet_pton($ipv6);

    // Check if the packed representation is not false
    if ($packedIPv6 === false) {
        return false;
    }

    // Unpack the packed representation to get IPv4-mapped IPv6 address
    $unpackedIPv6 = unpack('N', $packedIPv6);

    // Get the last 32 bits as the IPv4 address
    $ipv4 = long2ip($unpackedIPv6[1]);

    return $ipv4;
}


