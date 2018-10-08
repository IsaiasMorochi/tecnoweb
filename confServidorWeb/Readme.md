# Configuracion Servidor Web
..* instalando dependencias
```console
dnf install httpd php php-mysql php-pgsql
```
## SELinux y Apache
### Para que el servidor pueda realizar consultas 
```console
#setsebool -P httpd_can_sendmail 1
#setsebool -P httpd_read_user_content 1
#setsebool -P httpd_can_network_connect_db 1
#systemctl enable httpd
#systemctl start httpd
#systemctl status httpd
$nmap localhost
```
vericamos el puerto 80 abierto

## Ocultar la version de apache
### abrir el archivo
```console
#vi /etc/httpd/conf/httpd.conf
```
### Añadir las siguientes lineas en la parte final:
linea 86 => ServerAdmin root@localhost  // correo del administrador del servidor
linea 95 => ServerName www.example.com:80 // dar el nombre del dominio al servidor que queremos que atienda
linea 119 => "/var/www/html" // carpeta de la pag web del sitio
linea 316 => AddDefaultCharset UTF-8 //juego de caracteres a utilizar en el server
ServerSignature Off
ServerTokens Prod

### Reiniciar el servidor
```console
systemctl restart httpd
```
### Crear carpeta:
```console
#mkdir -p /var/www/mydir
```
selinux:
```console
#chcon -t httpd_sys_content_t /var/www/mydir
#semanage fcontext -a -t httpd_sys_content_t /var/www/mydir
```
creamos el archivo:
```console
#vi /etc/httpd/conf.d/mydir.conf
```
agregar las siguiente linea:
```console
Alias /mydir /var/www/mydir
<Directory "/var/www/mydir">
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        Allow from all
        Require local
        Require all granted
	#Para restring el acceso a la carpeta
	#2.2 allow from 172.20.172.0/24
	#2.4 Require ip 172.20.172.0/24
</Directory>
```
Reiniciar el servidor
```console
systemctl restart httpd
```
...* instalar un editor 
```console
#dnf install lynx

### Crear el archivo de control de acceso
```console
#vi /var/www/mydir/.htacces
```
*agregar
>AuthName "Solamente usuarios autorizados"
>AuthType Basic
>Require valid-user
>AuthUserFile /var/www/mydir/.claves

*crear archivo de contraseñas
#touch /var/www/mydir/.claves

*agregar usuarios:
```console
#htpasswd /var/www/mydir/.claves juan
New password:
Re-type new password:
Adding password
```

### agregar algunas directivas
#vi /var/www/mydir/.httacces
*agregar:
php_value post_max_
php_value

*carpeta compartida para subir tareas con filezilla
mail.ficct.uagrm.edu.bo/inf513/grupo01sa/
passwd gr...gr..

```console
#dnf install filezilla
```
