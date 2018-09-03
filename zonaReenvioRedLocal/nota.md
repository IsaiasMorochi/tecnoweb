#	Crear las zonas de reenvio(zonas DNS)
1	crear los inverso y dominio en var/named
#	Agregar las zone en el archivo
2	agregar los zone en etc/named.conf
#	Verificar que no tenga errores "named.conf"
3	/usr/sbin/named-checkconf -z /etc/named.conf
#	Habilitar el servicio
4	systemctl enable named
5	systemctl start named
#	Verificar puerto abierto 53(DNS)
6	nmap ip
#	Verificar los servicios
6	nslookup www.midomio.com.bo localhost
7	nslookup mail.midominio.com.bo localhost
8	nslookup ftp.midominio.com.bo localhost

