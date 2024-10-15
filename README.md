# Referral Source Tracker

**Referral Source Tracker** is a WordPress plugin that captures the original referral source of visitors and automatically assigns it to a hidden field in lead generation forms (e.g., Gravity Forms, WPForms). This helps track where your leads are coming from, such as Google Search, Google Ads, Bing Search, and more.

## Features

- Tracks the original referral source when a visitor lands on your website.
- Supports key referral sources like Google Search, Bing Search, Google Ads, Bing Ads, Facebook, LinkedIn, Capterra, G2, and SourceForge.
- Integrates seamlessly with Gravity Forms and WPForms using dynamic field values.
- Automatically populates hidden form fields with the referral source.
- Helps marketers analyze the effectiveness of different marketing channels.

## Installation

### Step 1: Download and Install the Plugin

1.  Download the repository as a ZIP file.
2.  Upload the ZIP file via the WordPress Admin:
    - Go to `Plugins > Add New`.
    - Click `Upload Plugin` and upload the ZIP file.
    - Install and activate the plugin.

Alternatively, you can manually upload the plugin folder to `wp-content/plugins/`.

### Step 2: Add a Hidden Field to Your Form

For Gravity Forms and WPForms, follow these steps to add a hidden field for the referral source:

#### Gravity Forms

1.  Add a hidden field to your form.
2.  Set the **Default Value** of the hidden field to the dynamic merge tag `{referral_source}`.

#### WPForms

1.  Add a hidden field to your form.
2.  Set the **Default Value** of the hidden field to `{referral_source}` under **Advanced Options**.

### Step 3: Use in Your Forms

Once the plugin is activated and you've added the hidden field to your forms, any submissions will automatically include the referral source (e.g., "Google Search", "Bing Ads", "Facebook").

## Supported Referral Sources

The plugin detects the following basic referral sources:

- **Google Search**
- **Bing Search**
- **Google Ads**
- **Bing Ads**
- **Facebook**
- **LinkedIn**
- **Capterra**
- **G2**
- **SourceForge**
- **Direct or Other**

## How It Works

1.  The plugin tracks the original referral source when a visitor arrives on your site.
2.  It stores the referral source in a session variable for the duration of the visit.
3.  When the user submits a form, the plugin automatically inserts the referral source into a hidden field.
4.  You can review the referral source data in your form submissions, allowing you to analyze lead sources.

## Development

### Prerequisites

- WordPress 5.0 or higher
- PHP 7.0 or higher
- Gravity Forms or WPForms (or another form plugin that allows dynamic fields)

### How to Contribute

1.  Fork the repository.
2.  Create a new branch (`git checkout -b feature/referral-source`).
3.  Commit your changes (`git commit -m 'Add new referral source'`).
4.  Push to the branch (`git push origin feature/referral-source`).
5.  Open a pull request.


## Changelog

### v1.0 (October 2024)

- Added support for **Bing Ads**, **LinkedIn**, **Capterra**, **G2**, and **SourceForge**.
