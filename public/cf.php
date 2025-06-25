<?php

// Cloudflare API anahtarınız
$cloudflare_api_key = "e6eb7425bae1974170eb33d4f3c6c6832ed35";

// Cloudflare e-posta adresiniz
$cloudflare_email = "bgoglu@gmail.com";

// Zone ID'leriniz - birden fazla alan adı için zone ID'lerini dizi olarak tanımlayın
$zone_ids = array(
    "e6035d35aa8b1347bb9dec3b289cb390",  
    // Diğer alan adlarının zone ID'lerini buraya ekleyin...
);

// Tüm önbelleği temizlemek için Cloudflare API'sini çağıran işlev
function clear_cloudflare_cache($cloudflare_api_key, $cloudflare_email, $zone_id)
{
    $endpoint = "https://api.cloudflare.com/client/v4/zones/{$zone_id}/purge_cache";
    $headers = array(
        "X-Auth-Email: {$cloudflare_email}",
        "X-Auth-Key: {$cloudflare_api_key}",
        "Content-Type: application/json"
    );
    $data = array(
        "purge_everything" => true
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpoint);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    return $response;
}

// Tüm alan adları için önbelleği temizle
foreach ($zone_ids as $zone_id) {
    $response = clear_cloudflare_cache($cloudflare_api_key, $cloudflare_email, $zone_id);
    
    // Yanıtı kontrol et
    if ($response) {
        $json_response = json_decode($response, true);
        if ($json_response && isset($json_response['success']) && $json_response['success']) {
            echo "megaverse.coach Alan adı için önbellek başarıyla temizlendi. Zone ID: {$zone_id}\n";
        } else {
            echo "Alan adı için önbelleği temizlemede bir hata oluştu. Zone ID: {$zone_id}, Hata: " . $json_response['errors'][0]['message'] . "\n";
        }
    } else {
        echo "Cloudflare API'ye bağlanırken bir hata oluştu. Zone ID: {$zone_id}\n";
    }
}
