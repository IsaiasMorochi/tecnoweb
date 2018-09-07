# 3

#paquetes


#alta de la cuenta del usuario en el sistema
useradd -g mail -s /sbin/nologin juan.chumacero

#creamos su contrasena
passwd juan.chumacero
(pass: 123456)

#En este archivo se agregan los usuarios
more /etc/shadow/

#En este archivo los grupos que tiene linux
more /etc/group

#En el fichero /etc/mail/local-host-names registramos nuestro dominio

midomio.com.bo
mail.midomio.com.bo

#Definir lista de control de acceso en el fichero #nano /etc/mail/access
RELAY //para reenvio de dominios externos
OK	//para reenvio de domio local
REJECT //rechaza las peticionies

Connect:172.20.172		OK
Connect:172.20.172.0		REJECT
evopueblo@presidencia.gob.bo	REJECT

#Mapear el archivo configurado
makemap hash /etc/mail/acces.db < /etc/mail/access

#Configuracion de funciones de sendmail el fichero. vi /etc/mail/sendmail.mc
para que el servidor no informe los servicios que estamos utilizando (ej. apache, mysql.. etc)
(ESC + shift + : + set nu - para tener el numero de linea)


 16 => dnl define(`confSMTP_LOGIN_MSG', `$j ; $b')dnl
 118 DAEMON_OPTIONS(`Port=smtp, Name=MTA')dnl
151 dnl FEATURE(`accept_unresolvable_domains')dnl

#arrancar el servicio sendmail (smtp)
systemctl enable sendmail.service
systemctl start
systemctl status 

#Verificar los puerto habirtos
nmap localhost  //PUERTO 25 Y 53 ABIERTOS
mmap 172.20.172.10 //IP lan que puertos ven de afuera

#Probar el funcionamiento del servidor
telnet ip 25
telnet 127.0.0.1 25

ENVIAR UN CORREO AL DOMIO CREADO

HELO LOCALHOST
MAIL FROM: evapueblo@presidencia.gob.bo
RCPT TO : juan.chumacero@localhost
DATA
SUBJECT : DEMO SENDMAIL
hola como estas sendmail
.
250 2.0.0 w87JmWen003936 Message accepted for delivery
quit

#TODO OK.

#Control de correo chatarra (Spam)
en el fichero /etc/mail/sendmail.mc agregar al final del fichero

FEATURE(dnsbl, `blackholes, mail-abuse.org', `Rechazado - vea http://www.mail-abuse.org/rbl/')dnl

#Protocolos para acceder hacia el correo el fichero /etc/dovecot/dovecot.conf
Descomentamos la linea.
24 => protocols = pop3

#Para recibir el servidor la constraseña en texto plano o cifrado el fichero
vi /etc/dovecot/conf.d/10-auth.conf 
Descomentar la linea (yes o no)
10 => disable_plaintext_auth = no

#La forma que el servidor guardar los correos el fichero
vi /etc/dovecot/conf.d/10-mail.conf 

  25     mail_location = mbox:~/mail:INBOX=/var/mail/%u
 114 mail_privileged_group = mail
121 mail_access_groups = mail

#Arrancar el servicio dovecot (pop3)
systemctl enable dovecot
systemctl start dovecot
systemctl status dovecot

#Probamos el correo y todo ok.
telnet localhost 110

USER juan.chumacero
PASS 123456





