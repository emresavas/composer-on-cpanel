# Composer on cPanel

A simple PHP app showing how to set up cPanel auto-deployment with Git and Composer. It uses the **Carbon** library to display formatted server time and shows PHP version on a basic HTML page served from `public_html`.

## Prerequisites

To get going, you’ll need:

- A cPanel account with Git Version Control enabled
- A remote Git repository (GitHub, GitLab, Bitbucket, etc.)
- PHP 7.4 or higher on your hosting environment
- Composer available on the server (cPanel’s `.cpanel.yml` runs it automatically)
- SSH access to your server (optional)

## Deployment Structure

When you add your repo in cPanel’s **Git Version Control**, cPanel clones it into:

```
/home/username/repositories/composer-on-cpanel/
```

But your actual web root is:

```
/home/username/public_html/
```

We’ll use `.cpanel.yml` to:

1. Run Composer
2. Copy the fresh build into `public_html`


## Project Structure

```
/home/username/
├── repositories/
│   └── composer-on-cpanel/         # your Git repo root
│       ├── composer.json           # project dependencies (Carbon)
│       ├── .cpanel.yml             # cPanel deployment tasks
│       └── index.php               # demo script
└── public_html/                    # live site served by Apache
    ├── index.php                   # demo script
    └── vendor/                     # Composer dependencies
```  

## Setup & Deployment

1. **Configure cPanel**

   - In cPanel, open **Git Version Control**.
   - Click **Clone Repository**, paste your repo URL.
   - Set **Clone Path** to `/home/username/repositories/composer-on-cpanel`.
   - Enable **Auto Deploy** on the `main` branch.

2. **Every push** triggers:
   - Git pull in `/repositories/composer-on-cpanel`
   - Composer install (installs Carbon)
   - New files copied into `public_html`

Visit your domain to see the formatted Carbon date/time and PHP version.

## Tips

- Customize `.cpanel.yml` cp commands if you need to preserve files across deploys.
- Use rsync instead of cp for better performance and exclude unnecessary files.
- The point of this demo is to show how to set up cPanel auto-deployment with Git and Composer if you don't have SSH access to your server. But optional SSH access is recommended for production use.
