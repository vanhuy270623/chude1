Mở file php.ini (thường nằm trong C:/wamp64/bin/php/php<version>/php.ini).

Tìm dòng curl.cainfo và thêm đường dẫn đến file cacert.pem:

curl.cainfo = "C:/wamp64/cacert.pem"