<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Maps Event</title>
</head>
<body>
    <iframe 
        id="mapIframe"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2527.0827631687616!2d106.67305021873919!3d10.765712169827685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggdOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e1!3m2!1svi!2s!4v1735384642311!5m2!1svi!2s" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
 
    <button id="viewOnGoogleMaps" style="margin-top: 10px;">Xem trên Google Maps</button>

    <script>
        document.getElementById("viewOnGoogleMaps").addEventListener("click", function() {
            // Lấy URL từ iframe
            const iframeSrc = document.getElementById("mapIframe").src;

            // Chuyển iframe đến trang Google Maps đầy đủ
            window.location.href = iframeSrc.replace("/embed?", "/place?");
        });
    </script>
</body>
</html>
