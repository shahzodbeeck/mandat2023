<?php
ob_start();
error_reporting(0);
date_default_timezone_set("Asia/Tashkent");
header("Content-Type: application/json; charset=UTF-8");
$id = $_GET['id'];
$ch2 = curl_init();
$url2 = "https://mandat.uzbmb.uz/Home2023/Index";
$headers2 = [
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    "Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,uz;q=0.6",
    "Cache-Control: max-age=0",
    "Connection: keep-alive",
    "Cookie: .AspNetCore.Culture=c%3Duz%7Cuic%3Duz; .AspNetCore.Antiforgery.bnDOLbEMdVI=CfDJ8B2eRvtN3BxLpcL7NU_ZAUtFvEjX9RCRnJTkgHDY1v6H0Vgr4Cexc6jvQsPuRGuS3OcFznjybpNM4FkuxSo_CbEHa-dlwATtXr-HQwHnMSEKEKyKg8O7pspEBkp9986QPF6f9X-YYL-On0ffKJHBxlw",
    "Referer: https://mandat.uzbmb.uz/",
    "Sec-Fetch-Dest: document",
    "Sec-Fetch-Mode: navigate",
    "Sec-Fetch-Site: same-origin",
    "Sec-Fetch-User: ?1",
    "Upgrade-Insecure-Requests: 1",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36",
    "sec-ch-ua: \"Not A)Brand\";v=\"99\", \"Google Chrome\";v=\"115\", \"Chromium\";v=\"115\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
];
curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch2, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);
$response2 = curl_exec($ch2);
if ($response2 === false) {
    echo "Xato: " . curl_error($ch);
} else {
  $doc2 = new DOMDocument();
$doc2->loadHTML($response2 );
$xpath2 = new DOMXPath($doc2);
$inputElement = $xpath2->query("//input[@name='__RequestVerificationToken'][@type='hidden']")->item(0);
$tokenValue = $inputElement->getAttribute('value');
}
curl_close($ch2);
$ch = curl_init();
$url = "https://mandat.uzbmb.uz/Home2023/AfterFilter";
$headers = [
    "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    "Accept-Language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,uz;q=0.6",
    "Cache-Control: max-age=0",
    "Connection: keep-alive",
    "Content-Type: application/x-www-form-urlencoded",
    "Cookie: .AspNetCore.Culture=c%3Duz%7Cuic%3Duz; .AspNetCore.Antiforgery.bnDOLbEMdVI=CfDJ8B2eRvtN3BxLpcL7NU_ZAUtFvEjX9RCRnJTkgHDY1v6H0Vgr4Cexc6jvQsPuRGuS3OcFznjybpNM4FkuxSo_CbEHa-dlwATtXr-HQwHnMSEKEKyKg8O7pspEBkp9986QPF6f9X-YYL-On0ffKJHBxlw",
    "Origin: https://mandat.uzbmb.uz",
    "Referer: https://mandat.uzbmb.uz/Home2023/Index",
    "Sec-Fetch-Dest: document",
    "Sec-Fetch-Mode: navigate",
    "Sec-Fetch-Site: same-origin",
    "Sec-Fetch-User: ?1",
    "Upgrade-Insecure-Requests: 1",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36",
    "sec-ch-ua: \"Not A)Brand\";v=\"99\", \"Google Chrome\";v=\"115\", \"Chromium\";v=\"115\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
];
$postData = "name=$id&region=0&__RequestVerificationToken=$tokenValue";
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
$response = curl_exec($ch);
if ($response === false) {
    echo "Xato: " . curl_error($ch);
} else {
$tr_pattern = '/<td>([^<]+)<\/td>/';
preg_match_all($tr_pattern, $response, $matches222, PREG_SET_ORDER);
$td_pattern = '/<td style="text-align: center">([^<]+)<\/td>/';
 preg_match_all($td_pattern, $response, $td_matches);
    $link =  '/<a\s+[^>]*href="([^"]+)"/';
preg_match_all($link, $response, $link);
$shaha = file_get_contents("https://mandat.uzbmb.uz".$link[1][17]);
$doc = new DOMDocument();
$doc->loadHTML($shaha);
$xpath = new DOMXPath($doc);
$h5Text = $xpath->query("//div[contains(@class, 'alert alert-')]/h5")->item(0)->textContent;
    $shaha_cleaned = str_replace(array("r", "n", "t"), '', $h5Text);
    $data[] = [
        "id" => $td_matches[1][0],
        "tavsiya" => $h5Text,
        "name" => $matches222[0][1],
        "yunalish" => $td_matches[1][1],
        "muassasa" => $td_matches[1][2],
        "ball" => $td_matches[1][3],
        "til" => $td_matches[1][4],
        "shakli" => $td_matches[1][5]
    ];
    $e = [
        'short' => $data,
 
    ];
    echo json_encode($e, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
}

?>
