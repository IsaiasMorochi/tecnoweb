#Hosting Desarrollador

## Insatalamos dependencias
```console
dnf -y install vsftpd
```
>Acceso SELinux:
>#setsebool -P allow_ftpd_full_access on
>

...* Configuramos el servicio 
```console
#systemctl enable vsftpd
#systemctl start vsftpd
#vi /etc/vstfpd/vsftpd.conf
12 => anonymous_enable=YES
16 => local_enable=YES
19 => write_enable=YES
86 => ftpd_banner=Bienvenido al servidor FTP de nuestra empresa
100 => chroot_local_user=YES
101 => chroot_list_enable=YES
103 => chroot_list_file=/etc/vsftpd/vsftpd.chroot_list
* Add Line
105 => allow_writeable_chroot=YES

130 => anon_max_rate=5120
131 => local_max_rate=5120
132 => max_clients=5
133 => max_per_ip=5


*Creamos el archivo
touch /etc/vsftpd/vsftpd.chroot_list

...*listamos los usuarios creados
*cd /home
user: juan.chumacero
password: 12345
...* cambiamos su contraseña del usuario si no recordamos la contraseña
passwd juan.chumacero

conectase a ftp 
server: 127.0.0.1
user: juan.chumacero
contraseña: 123456juanchumacero

