# crimson-social-media-web-app
Prerequisites
Before you begin, ensure that you have the following software installed on your machine:

WAMP Server: WAMP is a software stack that includes Apache, MySQL, and PHP, making it easier to set up a local development environment.
Download and install WAMP Server from the official website: WAMP Server.
Git: Git is a version control system that allows you to clone the repository and manage its codebase.
Download and install Git from the official website: Git.
Installation and Setup

Follow the steps below to install and set up the "Crimson Social Media Web App" locally:

Clone the Repository:

Open a terminal or command prompt.
Change the current directory to the desired location where you want to clone the repository.
Run the following command to clone the repository:
bash
Copy code
git clone https://github.com/YunoGasasi9862/crimson-social-media-web-app.git


Configure WAMP Server:

Launch the WAMP Server application.
Make sure the Apache and MySQL services are running. You should see their icons in the system tray.
Open your web browser and enter http://localhost in the address bar. If the WAMP Server homepage is displayed, then the server is running correctly.
Database Setup:

Open phpMyAdmin by clicking on the WAMP Server icon in the system tray, then selecting "phpMyAdmin."
Create a new database named crimson.
Import the SQL file included in the repository. Inside the repository folder, you should find a file named Database.sql. Import this file into the crimson database using phpMyAdmin's import feature.
Make sure the username is set as "root" and password is " " (empty), otherwise make necessary changes accordingly into the config file found in the project folder.

Configure Application:

In the cloned repository, navigate to the config directory.
Rename the config.php file to config.php.
Open the config.php file in a text editor.
Modify the database connection details to match your local setup:
Update the DB_HOST to localhost.
Update the DB_NAME to crimson.
Update the DB_USER and DB_PASSWORD fields with your MySQL credentials if necessary.
Start the Application:

Move the entire cloned repository folder (crimson-social-media-web-app) to the WAMP Server's document root directory. By default, it is located at C:\wamp64\www.
Open your web browser.
Enter the following URL in the address bar: http://localhost/crimson-social-media-web-app.
If everything is set up correctly, the "Crimson Social Media Web App" should now be running locally.
