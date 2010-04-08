sfCSSNakedDayPlugin
====

*CSS Naked Day in symfony.*

sfCSSNakedDayPlugin is a plugin for symfony applications. It automatically removes all CSS links from your application response every year on April 9th.

Installation
============

Using git clone
-----------------------------------

Use this to install as a plugin in a symfony app:

	$ cd plugins && git clone git://github.com/everzet/sfCSSNakedDayPlugin.git

Using git submodules
-----------------------------------

Use this if you prefer to use git submodules for plugins:

	$ git submodule add git://github.com/everzet/sfCSSNakedDayPlugin.git plugins/sfCSSNakedDayPlugin

Configuring your applications
-----------------------------------

Add this line to `ProjectConfiguration::setup()` method:

	$this->enablePlugins('sfCSSNakedDayPlugin');


Usage
=====

After installation, all set. Your application will strip on every 9th April =)


Contributors
============

* everzet (lead): [http://github.com/everzet](http://github.com/everzet)

CSS Naked Day is Dustin Diaz idea [http://naked.dustindiaz.com/](http://naked.dustindiaz.com/)
