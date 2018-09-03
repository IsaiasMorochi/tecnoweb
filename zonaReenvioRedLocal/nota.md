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
7	nslookup www.midomio.com.bo localhost
8	nslookup mail.midominio.com.bo localhost
9	nslookup ftp.midominio.com.bo localhost
#	Verificar DNS inverso
10	nslookup 172.20.172.110 localhost
