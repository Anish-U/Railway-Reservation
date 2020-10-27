# Railway-Reservation

Designing an Online Railway ticket booking, reservation and cancellation system.<br>
The main aim of the project is to develop a website which would facilitate the reservation of online train tickets through an effective and yet simple GUI for a normal passenger intending to travel in railways. 

Technologies used:

Front end: HTML, CSS, JavaScript<br>
Back end: PHP, MySQL Database

---

# Purpose

The purpose of this project is for best practice of Database Management.<br>
This is a project for CSE course Database Management Systems | Vellore Institute of Technology.

---

# Development setup

### 1. Retrieve our project (if you haven't done so already)

```git
 $ git clone git@github.com:Anish-U/Railway-Reservation.git
```
### 2. Move project folder to htdocs folder

   if you cannot find the htdocs folder please follow the below links,

  * [Where to find htdocs in XAMPP Mac](https://stackoverflow.com/questions/45518021/where-to-find-htdocs-in-xampp-mac)
  * [Find htdocs path, no matter where file is stored](https://stackoverflow.com/questions/5536730/find-htdocs-path-no-matter-where-file-is-stored)
  * [htdocs path in linux](https://stackoverflow.com/questions/1582851/htdocs-path-in-linux)
  * [https://stackoverflow.com/questions/1582851/htdocs-path-in-linux](https://stackoverflow.com/questions/44989243/unable-to-find-htdocs-on-xampp)

### 3. Restore Database

   * Goto phpMyAdmin and select Import.
   * Find 'File to import:' section and choose the file 'railway_reservation.sql' which is located under project folder and hit GO.
   
### 4.Setup Database Configurations

  * Goto project folder -> source code -> database.inc.php.
    * setup your configuratons related to MySQL.
  
 ### 5. Start Server
  * start the server and run;
    * http://localhost:8888/Folder_name/index.php (replace the port number 8888 to your port).
    
