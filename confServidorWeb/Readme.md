# Configuracion Servidor Web
## instalando dependencias
```console
dnf install httpd php php-mysql php-pgsql
```
## SELinux y Apache
### Para que el servidor pueda realizar consultas 
```console
#setsebool -P httpd_can_sendmail 1
#setsebool -P httpd_read_user_content 1
#setsebool -P httpd_can_network_connect_db 1
# systemctl enable httpd
# systemctl start httpd
# systemctl status httpd
$ nmap localhost
```
vericamos el puerto 80 abierto

## Ocultar la version de apache
### abrir el archivo
```console
#vi /etc/httpd/conf/httpd.conf
```
### Añadir las siguientes lineas en la parte final:
ServerSignature Off
ServerTokens Prod

### Reiniciar el servidor
```console
systemctl restart httpd
```
