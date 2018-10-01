# Configuracion DB PGSQL
## Instalar paquetes
 dnf -y install postgresql-server postgresql pgadmin3

nombre: cnx_ficct_grupo03sa
host: mail.ficct.uagrm.edu.bo
port: 5432
Maintenance DB: db_grupo03sa
username: grupo03sa
password: grupo03grupo03

aceptar ok

## Desde consola
psql -U grupo03sa -d db_grupo03sa -h mail.ficct.uagrm.edu.bo -c 'select * from user'

## Primera configuracion
postgresql-setup --initdb
*Initizalizin database in '/var/lib/pgsql/data'
*Initilized, logs are in

## Configurar el inicio del servicio
systemctl enable postgresql.service
systemctl start postgresql.service
systemctl status postgresql.service


## Conectarnos al servicio
nombre: cnx_local_root
host: 127.0.0.1
port: 5432
Maintance DB: postgres
Username: postgres

## COnfigurar archivo principal de postgreSQL Conexion SUPERUSUARIO
### el fichero /var/lib/pgsql/data/postgresql.conf
59 => listen_addresses='localhost' => listen_addresses ='*'
63 =>

## Control de acceso PostgreSQL
### el fichero /var/lib/pgsql/data/pghba.conf
82 => host all all 127.0.0.1 trust

### agregar las siguientes 
#### usuario:
host db_grupo03sa grupo03sa 172.20.172.97/32
#### password:
host db_grupo03sa grupo03sa	0.0.0.0/0	password
host db_grupo03sa grupo03sa	0.0.0.0/0	password

## Reiniciar el servidor
systemctl restart postgresql


## opcional ver numero de linea en vim
: set nu

## Conexion exitosa al servidor
### Establecer Login Roles en pgadmin III
role name: grupo03sa
password: grupo03grupo03

### Establecer BD
nombre: db_grupo03sa
owner: grupo03sa

### Probando conexion
ip: 172.20.172.8

nombre: cnx_lan_grupo03sa
host: 172.20.172.8
Maintance DB: db_grupo03sa
username gupo03sa
password: grupo03grupo03


## EXITO
