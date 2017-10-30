# phantomjscontext

phantomjscontext starts and stops PhantomJS before and after each scenario. It enables each site to use it's own port for running PhantomJS. It utilises dennisdigital/phantomjs-extension which is a driver for PhantomJS: https://github.com/dennisinteractive/PhantomJs-Extension

## Usage

### In behat.yml:
Add the context under contexts: `Behat\PhantomContext\Context\PhantomJsContext`

Add the extension under extensions: `Behat\PhantomJsExtension: ~`

Change `javascript_session` to `phantomjs`

Add the configuration replacing the port number with the site specific one: 
```
phantomjs:
        bin: phantomjs2
        wd_port: 60301
        wd_host: http://localhost:60301/wd/hub
```
The site specific port numbers are available from google docs.

Example behat.yml: 
``` 
     contexts:
        - FeatureContext:
        - Drupal\DrupalExtension\Context\MinkContext
        - Drupal\DrupalExtension\Context\RawDrupalContext
        - Behat\PhantomContext\Context\PhantomJsContext
        - Behat\BDDCommonExtension\Context\BDDCommonContext:
            parameters:
              screen_shot_path: %paths.base%/captured/screenshot
              screen_shot_url: %mink.base_url%/sites/carbuyer/tests/captured/screenshot
              html_path: %paths.base%/captured/html
              html_url: %mink.base_url%/sites/carbuyer/tests/captured/html
              drupal_users:
                drupal:
                  'drupal'
                behat_editor:
                  'editor3'
  extensions:
    Behat\PhantomJsExtension: ~
    Behat\MinkExtension:
      base_url: 'http://carbuyer.vm.didev.co.uk/'
      default_session: goutte
      javascript_session: phantomjs
      phantomjs:
        bin: phantomjs2
        wd_port: 60301
        wd_host: http://localhost:60301/wd/hub
      goutte: ~
```
      
### In composer.json

Under require add `"dennisdigital/phantomjscontext": "1.0"`
