piwik_for_esotalk
=================

A esoTalk (http://esotalk.org/) plugin. Adds Piwik (http://www.piwik.org) tracking to esoTalk Forum. The Trackingcode is editable over Administration panel:

Installation:
=================
Just clone this repo into esoTalkRoot/addons/plugins. Then you can activate and konfigure the plugin over the pluginmanager in the administration section of esoTalk:

~~~bash
$> cd esoTalkRoot/addons/plugins
$> git clone https://github.com/Bravehartk2/piwik_for_esotalk.git
~~~

External requirements:
==================
This plugin requires the following additional components that must be installed separately:

- MySQL Database for Piwik
- PHP with mysql support
- an existing piwik installation that the trackingscript can send data to