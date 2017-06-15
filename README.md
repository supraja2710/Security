# Security
## User authentication for caMicroscope 

### Enabling Authentication

### Step 1. Setting up Google Sign-In

In order to use Google's authentication service, you will need to let Google know the URL where you will be running QuIP.  Please follow the (3) steps, and then set up Configuration.  If testing on localhost, please see "Disabling Authentication", below.

1. First, [Set up Google Sign-In](https://developers.google.com/+/web/signin/#set_up_google_sign-in_for_google)
2. Then, [Enable the Google+ API](https://developers.google.com/+/web/signin/#enable_the_google_api)
3. Take note of the *client ID* and *client secret*

### Step 2. Configuration

Edit `config/security_config.php`:

* Set `$client_id` and `$client_secret` obtained from Step1.
* Set `$bindaas_trusted_id` and `$bindaas_trusted_secret`.
* Set `$bindaas_trusted_url` as the IP/hostname of the data container.
* Set `$mongo_client_url` as IP/hostname of data container.  


### Disabling Authentication

To disable authentication:

* Log in to the `quip-viewer` container
* Open `/var/www/html/authenticate.php`
* Uncomment the [Disable authentication](https://github.com/camicroscope/Security/blob/release/authenticate.php#L6-L10) section
* Save and close.
* Check the file again, and now it should be populated with the correct API key.
* Copy the API key from `authenticate.php`, and set the `$apiKey` for [FlexTables](https://github.com/camicroscope/ViewerDockerContainer/blob/release/html/FlexTables/index.php#L227) as well.
