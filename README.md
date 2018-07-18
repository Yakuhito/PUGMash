# PUGMash
Open-source copy of FaceMash
# Install
1. Prepare DB
	- Make sure your server is running mySQL
	- Import db.sql (you can also copy the statements from db.sql and paste them into your phpmyadmin console)
Note: You can give your database any name, but you'll need to specify it in config.php
2. Edit config.php
	- db_host: Usually '127.0.0.1' (if you use 000webhostapp, set it to 'localhost')
	- db_database: The database which contains the 'data' table
	- db_user: Database user
	- db_pass: Database password
	- pass: Your admin password for adding images. Do NOT share this
	- leaderboard_max_cols: Max entries to display in the leaderboard (for example, if you only want to see top 10 images, set it to 10)
	- k_factor: ELO k-factor (if you don't know what this is, don't modify it)
	- app_name: Change this to your app's name (e.g. "Animal Mash" instead of "Pug Mash!")
	- default_score: ELO initial score (if you don't know what this is, don't modify it)
3. Copy your images to /images/
4. Add images to database
	- Run [host]/refresh.php?pass=[your admin password]
5. Test it!
