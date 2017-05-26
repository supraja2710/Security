# Security + Landing page for QuIP
Security, user authentication for caMicroscope 

## Enabling authentication
### Step 1. Setting up Google Sign-In

* Setup [Google sign-in](https://developers.google.com/+/web/signin/)

Make sure you Enable the Google+ APIservice.
Also take note of the *client ID* and *client secret*

### Step 2. Configuration

Edit `config/security_config.php`.
* Set `$client_id` and `$client_secret` obtained from Step1.
* Set `$bindaas_trusted_id` and `$bindaas_trusted_secret`.
* Set `$bindaas_trusted_url` as the IP/hostname of the data container.
* Set `$mongo_client_url` as IP/hostname of data container.  


## Disabling authentication

To disable authentication
* Log in to the `quip-viewer` container
* Open `/var/www/html/authenticate.php`
* Uncomment lines 7 and 8 https://github.com/camicroscope/Security/blob/release/authenticate.php#L6 which would be populated with the right api key.
Congratulations, you've disabled authentication! 👏🏻
