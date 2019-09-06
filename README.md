<pre>
                                                                     
    _/_/_/                              _/                           
   _/    _/    _/_/      _/_/_/    _/_/_/  _/_/_/  _/_/      _/_/    
  _/_/_/    _/_/_/_/  _/    _/  _/    _/  _/    _/    _/  _/_/_/_/   
 _/    _/  _/        _/    _/  _/    _/  _/    _/    _/  _/          
_/    _/    _/_/_/    _/_/_/    _/_/_/  _/    _/    _/    _/_/_/     
                                                                     
</pre>

# WordPress 

Building a WP plugin.
Best used with the simple [wordpress theme from the same guy](https://github.com/mijkami/Another-Wordpress-Theme/).
Best used as a sidebar widget.
Made using the simple [RPG dice module](https://fr.wordpress.org/plugins/rpg-dice-roller/) and expanding / modifying from there (adding support of different dice and crafting the whole graphical interface).


## How-to

- Use a working WordPress theme such as my simple [wordpress theme](https://github.com/mijkami/Another-Wordpress-Theme/),
- Download the current project,
- Paste the whole "/Another-RPG-Dice-Plugin/" folder into "mainFolder/wp-content/themes/",
- Log into your dashboard (going to http://yourwebsite/wp-admin/)
- In the right sidebar : go to Extensions
- Scroll down and activate "RPG Dice Roller - DG Edition",
- In the right sidebar : Appearance > Widgets
- Scroll down and click on "RPG Dice Roller" , select "Sidebar Widget Area" then "add the Widget",
- You're done ! Check your website and use the addon.

## TODOs

Some features are not yet implement, especially :

- finish to add the "Reset" feature to the Reset button,
- building the needed database feature (using the guide from [there](https://mosaika.fr/creer-table-sql-wordpress-commission/)),
- using the database feature to show the last 500 rolls from all users.