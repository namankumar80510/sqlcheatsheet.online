# SQL Cheat Sheet or Quick Reference

<a href="https://github.com/namankumar80510/sqlcheatsheet.online"><img src="https://img.shields.io/github/stars/namankumar80510/sqlcheatsheet.online?style=social"></a>

<a href="https://github.com/namankumar80510/sqlcheatsheet.online/blob/main/LICENSE"><img src="https://img.shields.io/github/license/namankumar80510/sqlcheatsheet.online?style=social"></a>

A quick reference cheatsheet for SQL Developers. [**CURRENTLY UNDER DEVELOPMENT**]

## Live Site

You can view the current sql cheat sheet at [https://sqlcheatsheet.online](https://sqlcheatsheet.online).

## Directory Structure

```
.
├── html              # output html directory
├── content
│   └── index.md
├── static
│   ├── 404.html
│   ├── favicon.ico
│   ├── favicon.png
│   ├── robots.txt
│   └── site.css      # generate css from tailwind (output)
├── config.neon
├── composer.json
├── package.json
├── site.css          # tailwind source css (input)
├── tailwind.config.js
├── build.php         # site generator
├── tailwind.config.js
└── templates
    └── page.php      # Theme files
```

## Contributing

If you are considering contributing to this project, my heartfelt thank you. If not... SCROLL PAST BEFORE MY FLYING SANALS REACH YOUR FACE. 😈

Anyway 😌 I was saying that if you're considering contributing to this project, I am thankful because your contributing will surely make sqlcheatsheet.online a valuable resource.

Please feel free to submit issues and enhancement requests.

Right now, I am actively developing this project. You can help by contributing to the content directory, where the main site content reside.

All the HTML files are generated inside html directory via our custom static site generator (see `build.php` in the root).

You can just edit the content files and submit a pull request. I will do the remaining tasks such as generating html files from the content and deploying it.

### Running Locally

If you want to locally develop/install this project, you'd need [PHP 8](https://www.php.net/downloads.php) installed on your system to generate html from the content.

If you have php installed on your system (see link attached above to download PHP; alternatively you can download XAMPP instead if you're having any trouble), follow the below steps.

1. **CLONE REPO**: run `git clone https://github.com/namankumar80510/sqlcheatsheet.online`. Change to the directory and proceed.
2. **Install dependencies**: run `php composer.phar install` to install the dependencies for static site generator.
3. **EDIT CONTENT**: You can edit the content inside `content` directory.
4. **BUILD** (optional): You can just edit the content and make a pull request. However, if you also want to generate the html files, run `php build.php build` in the terminal and html pages will be generated inside html folder.

## LICENSE

This project is licensed under [AGPL](https://github.com/namankumar80510/sqlcheatsheet.online/blob/main/LICENSE) and is maintained by [Naman](https://github.com/namankumar80510).
