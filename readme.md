<img src="https://avatars.githubusercontent.com/u/56885001?s=200&v=4" alt="logo" width="130" height="130" align="right"/>

[![](https://img.shields.io/badge/TgChat-@UnOfficialV2board讨论-blue.svg)](https://t.me/unofficialV2board)

## Backends Supported by This Branch
 
 - [Modified XrayR](https://github.com/wyx2685/XrayR)
 - [Modified V2bX](https://github.com/wyx2685/V2bX)
 - [V2bX](https://github.com/InazumaV/V2bX)

## Migration Steps from Original Version

Follow the steps below to migrate the panel files:

    git remote set-url origin https://github.com/QuLOVE/v2board
    git checkout master  
    ./update.sh  


Follow the steps below to refresh the settings cache and restart the queue:

    php artisan config:clear
    php artisan config:cache
    php artisan horizon:terminate

Finally, go back to the backend and save the theme again: Theme Configuration - Theme Settings - OK

# **V2Board**

- PHP7.3+
- Composer
- MySQL5.5+
- Redis
- Laravel

## Demo
[Demo](https://demo.v2board.com)

## Document
[Click](https://v2board.com)

## Sponsors
Thanks to the open source project license provided by [Jetbrains](https://www.jetbrains.com/)

## Community
🔔Telegram Channel: [@v2board](https://t.me/v2board)  

## How to Feedback
Follow the template in the issue to submit your question correctly, and we will have someone follow up with you.

## Thanks
Also thanks to everyone who had a hand in creating and modifying this project
