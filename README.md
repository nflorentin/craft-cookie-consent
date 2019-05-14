# Craft Cookie Consent

Ellera Cookie Consent Plugin

## Install the plugin
You can install this plugin from the Plugin Store.

## Create hook in your template
To give you full control over where the plugin is rendering the consent template, you neede to add this line before your end-body-tag in the relevant layout file(s):

`{% hook 'before-body-end' %}`
## Activate the plugin for your site
Navigate to the plugin inside your Control Panel. If you have the correct permissions, it should be visible in the menu.

Go to "Site Settings" and add your cookies and cookie groups (We've added some basic ones for you already).

Toggle the "Activated" lightswitch and you're off!

## Customize

### Using a custom template
Update the template file under Site Settings to point to your template file.
The path is rendered with `Craft::$app->view->renderTemplate()`.

### Using custom CSS and/or JS
You can turn off loading of assets in Site Settings if you have your own.

You can look in `vendor/elleracompany/craft-cookie-consent/src/resources` to see the functionality currently implemented by the plugin.

## Check for user consent
You can use this function to manage cookie generation for your scripts

`{% if craft.cookieConsent.getConsent('slug') %}`

You can use it in SEOmatic by navigating to `admin/seomatic/tracking` and updating the script template.

## Planned features
- Project.yaml compatibility

## Example using SEOmatic
```
{% if trackingId.value is defined and trackingId.value %}
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','{{ analyticsUrl.value }}','ga');
ga('create', '{{ trackingId.value |raw }}', 'auto'{% if linker.value %}, {allowLinker: true}{% endif %});
{% if ipAnonymization.value or craft.cookieConsent.getConsent('default-marketing') != true %}
ga('set', 'anonymizeIp', true);
{% endif %}
{% if displayFeatures.value and craft.cookieConsent.getConsent('default-marketing') %}
ga('require', 'displayfeatures');
{% endif %}
{% if ecommerce.value and craft.cookieConsent.getConsent('default-marketing') %}
ga('require', 'ecommerce');
{% endif %}
{% if enhancedEcommerce.value and craft.cookieConsent.getConsent('default-marketing') %}
ga('require', 'ec');
{% endif %}
{% if enhancedLinkAttribution.value and craft.cookieConsent.getConsent('default-marketing') %}
ga('require', 'linkid');
{% endif %}
{% if enhancedLinkAttribution.value and craft.cookieConsent.getConsent('default-marketing') %}
ga('require', 'linker');
{% endif %}
{% set pageView = (sendPageView.value and not craft.app.request.isLivePreview) %}
{% if pageView %}
ga('send', 'pageview');
{% endif %}
{% endif %}
```

## Acknowledgements
Plugin Icon designed by Trinh Ho from Flaticon