# Security
Security, user authentication for caMicroscope 


## Step 1. Setting up Google Sign-In

* Setup [Google sign-in](https://developers.google.com/+/web/signin/)

Make sure you Enable the Google+ APIservice.
Also take note of the *client ID* and *client secret*

## Step 2. Configuration

Edit `config/security_config.php`.
* Set `$client_id` and `$client_secret` obtained from Step1.
* Set `$bindaas_trusted_id` and `$bindaas_trusted_secret`.
* Set `$bindaas_trusted_url` as the IP/hostname of the data container.
* Set `$mongo_client_url` as IP/hostname of data container.  

## Step 3. Enabling authentication in Bindaas

* Login to the `data` container. 
* Edit `/root/bindaas/bin/bindaas.config.json`. Set `enableAuthentication: true`. (See: https://github.com/camicroscope/DataDockerContainer/blob/master/bindaas.config.json#L5)
* Restart bindaas. 


## Step 4. Configuring super user account

 * step1: go to /etc/apache2 folder with this command to create admin user with 'password' as password: `htpasswd -c /etc/apache2/.htpasswd admin`
 
 * step2: edit /etc/apache2/sites-available/000-default.conf by adding Directory section
```
 <VirtualHost *:80> 
        #go to the end of <VirtualHost>        
        #add password protection to this folder
        <Directory "/var/www/html/camicSignup">
            AuthType Basic
            AuthName "Restricted Content"
            AuthUserFile /etc/apache2/.htpasswd
            Require valid-user
        </Directory>
</VirtualHost>
```

 
* step3: in viewer container with this command to restart apache server:
       service apache2 restart
	   
