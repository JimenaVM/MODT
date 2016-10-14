<?php
	$MENSAJE = "Bievenido al Sistema SUPERSOL, sus credenciales de acceso son: usuario: gogo1324  --- password: 1234567";
					$to = 'nonicito@gmail.com';
					$subject = 'Credencial de Acceso al Sistema ...';
					$header = 'From: dani292dani@gmail.com'.
					'MIME-Version: 1.0'.'\r\n'.
					'Content-type: text/html; charset=utf-8';
					if (mail($to,$subject,$MENSAJE,$header)) {
						echo "email enviado!";
					} else {
						echo "error al enviar email!";
					}
?>