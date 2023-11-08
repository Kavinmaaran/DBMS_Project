# DeltaTask3_SysAd

### Commands to be executed for docker-compose

``docker-compose build``   
``docker-compose up`` 

to stop containers: ``docker-compose down``   

Add a host to your local machine:   
      1. Windows : add ``127.0.0.1 omegabank.local`` to **c:\Windows\System32\Drivers\etc\hosts** file    
      2. Linux : add 127.0.0.1  ``omegabank.local``  to **/etc/hosts** file
#### URL :
adminer : localhost:8080    
server : http://omegabank.local      
         http://omegabank.local/Statistics   

sign in as root in adminer and import the database.  

import file name: "migrations.sql"  


to sign in adminer for mysql:
for root   
username:root     
password:example

for bank manager(user with only read permissions)  

username:omega   
password:omega  


For web login passwd:   
ACC0001 - ACC0050 : example  
Branch1_manager - Branch4_manager : example  
CEO : example  
