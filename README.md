# Tungsten plugin for Craft CMS 3.x

This plugin allows to add a widget to the dashboard that includes some useful links and resources. It also ties the Gulp JS and CSS workflow into the Craft template.

![Screenshot](resources/img/plugin-logo.png)

## Requirements

This plugin requires Craft CMS 3.0.0 or later.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require ohlincik/tungsten

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for Tungsten.

## Overview

### Resources

* Submit Support Ticket link
* My Newline link
* Training Videos link (editable) -- a link to custom YouTube channel can be added that contains training videos for the specific website

### Notes from Tungsten

This section allows to provide customized notes intended as a reference for anyone using the CMS.

### Plugin Variable (assetUrl)

This variable is used to select the appropriate CSS or JS file to be included in the templates.

    <!-- Custom styles for this template -->
    <link href="{{ craft.tungsten.assetUrl('styles.css') }}" rel="stylesheet">

    {# Custom Js Files #}
    <script src="{{ craft.tungsten.assetUrl('scripts.js') }}"></script>
