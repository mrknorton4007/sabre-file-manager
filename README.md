# Sabre file manager
Sabre is a simple web file manager written in PHP with upload and password protection features.
You can upload, download and delete file through a simple, clean and responsive web-based interface.
There are a guest mode to allow free access to files and a restricted mode protected with a password.

![Sabre File Manager preview](http://mrknorton.altervista.org/wp-content/uploads/2014/06/sabre-file-manager-full.jpg)


## Main Features
* File list: show files in a specific folder
* User permission: choose what guest/logged users can do
* Upload form: add new files in one-click
* Password protection: free access or ask for a password
* Modern style: clean and responsive interface
* Config file editor: change settings directly from Sabre

Coming soon: ~~delete files~~, rename files, ~~config editor~~, multi-language


## Installation
Extract and copy the Sabre folder on your web server.
To start configure Sabre you can use the included editor that you can find inside the "install" folder.
You can also create/edit the settings.php inside the "config" folder with a classic text editor like Notepad++.

* sb_site_name: simply the name of your site
* sb_root_path: absolute path that contain the Sabre main file
* sb_file_path: name of the folder that contain your files
* sb_public_file: false if file access must be protected by a password
* sb_password_hash: md5 hash of the required password
* sb_user_upload: true if users can upload files
* sb_user_delete: true if users can delete files
* sb_date_style: date string format. See php function date()
* sb_maintenance_mode: true when you want to put Sabre temporaly inaccessible


### Warning
After configuration, rename or delete che "install" folder.
Is not protected and it can be used by an unauthorized user to rewrite the configuration!


### Changelog
* v1.0.0: initial release
* v1.0.1: download function updated
* v1.0.2: config editor added
* v1.0.5: bugfix
* v1.0.6: upload script updated
* v1.1.0: delete function added
* v1.1.1: config editor bugfix
* v1.1.2: guest mode/login mode
* v2.0.0: new style
* v2.0.1: header and function files updated


### License
This program is free software. You can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation.
This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY.
See the GNU General Public License for more details. 
