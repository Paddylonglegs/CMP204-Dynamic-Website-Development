<!--
Author: Patrick Collins
©️license MIT
https://github.com/Paddylonglegs/
-->

<!Doctype HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Requirements page</title>
  <link rel="stylesheet" href="reqStyle.css">
  <?php include('head.php'); ?>
</head>
<body>

  <?php include('navbar.php'); ?> <!--Regular Navbar-->

  <h1>CMP204 Requirements Page - Unit 2 Assessment</h1>
  <table>
    <tr>
      <th class="reqCol">Requirement</th>
      <th class="metCol">How did you meet this requirement?</th>
      <th class="fileCol">File name(s), line no.</th>
    </tr>
    <tr>
      <td>A clear use of HTML5</td>
      <td>HTML5 standard has been used throughout website. Multiple files have been made to separate website pages.</td>
      <td>index(-LI).php, begin(-LI).php, classic(-LI).php, req(-LI).php</td>
    </tr>
    <tr>
      <td>Use of the Bootstrap framework providing a responsive layout </td>
      <td>Bootstrap files have been included to give the user a responsive layout whatever device they are on. Furthermore, if the user is on a device with a small screen, the navigation bar changes to a button, making the layout of website links far more easier to follow</td>
      <td>head.php, navbar(-LI).php</td>
    </tr>
    <tr>
      <td>Use of AJAX (pure JavaScript i.e. without the use of a library)</td>
      <td>AJAX is used to import the two forms on profile.php using text files to either: Change Username or Delete Account. Also, on index.php it is used to import the video of frank's concert. Once the button is clicked an AJAX request gets the text file and then displays the forms and video using InnerHTML to a Div. I found this to meet the requirement whilst adding good functionality.</td>
      <td>ChangeAjax.js, Change.txt, ConfirmAjax.js, Confirmation.txt, profile.php(lines 30 & 38), ConcertAjax.js, Concert.txt, index.php(line 27)</td>
    </tr>
    <tr>
      <td>Use of the jQuery AJAX function</td>
      <td>Checking the Username Availability on CreateAnAccount.php is done using jQuery Ajax. This is done by taking the Username that is being typed, sending this to CheckUsername.php and displaying it's response to the user in real-time.</td>
      <td>CheckUsername.js(jQuery Ajax lines 10-20), CheckUsername.php(lines 40-50 is checking Username and determines response)</td>
    </tr>
    <tr>
      <td>User login functionality (PHP/MySQL)</td>
      <td>User Can Create an Account, and Log in with their created account. Once Logged in, an option to Log Out will appear on the navbar instead. If clicked, this will end the session and bring user to index.php(home page).</td>
      <td>CreateAnAccount.php, CreateAccount.php, login.php, UserAuth.php, logout.php</td>
    </tr>
    <tr>
      <td>Ability to select, add, edit and delete information from a database (PHP/MySQL)</td>
      <td>All interaction with the database is done using prepared statements. Select statements are used when checking the database for a row(mainly creating account and logging in). Insert statements are used when creating an account to add information to the database. Update statements are used on profile.php section when logged in, which lets the user Edit their Username. Also, they can Delete their account entirely in profile.php using Delete statements.</td>
      <td>UserAuth.php, CreateAccount.php, newUsername.php, DeleteAccount.php, </td>
    </tr>
    <tr>
      <td>Appropriate consideration of relevant laws</td>
      <td>On PrivacyPolicy(-LI).php GDPR laws is covered, which let's the user know how their data is being processed, stored and what power they have over this data. The cookie law is also considered by a pop up on index.php, which lets the user know cookies are in use and give them the option to accept. This is done using the Cookie Consent Plugin-ihavecookies.js</td>
      <td>PrivacyPolicy(-LI).php, jquery.ihavecookies.js (In head.php(line 14), script.js(lines 8+)</td>
    </tr>
    <tr>
      <td>SQL queries should be written as prepared statements</td>
      <td>All interaction with the database is done using prepared statements. The SQL queries does not take the user input directly at all, and furthermore this input is checked for malicious input using "test_input" function on top of prepared statements.</td>
      <td>UserAuth.php, lines 36-41. CreateAccount.php, lines 36-40, CheckUsername.php, lines 27-32, newUsername.php, lines 48-52, DeleteAccount.php, lines 37-42 and 55-60. Test_input: lines 22-26 all listed files  </td>
    </tr>
    <tr>
      <td>Passwords should be salted and hashed</td>
      <td>Upon submitting the form when creating an account, the password is hashed and salted using the password_hash function before inserting into the database. Max hash length has been set for database to ensure validation of password is accurate upon log in.</td>
      <td>CreateAccount.php, lines 31,32,36,39.</td>
    </tr>
    <tr>
      <td>Validation of user input</td>
      <td>Before any User input is used in any file, it is checked for malicious input using "test_input" function.</td>
      <td>lines 22-26 all connection based files.</td>
    <tr>
      <td></td>
      <td>Creating An Account: When a User attempts to create an account, both fields have to be filled in or an error appears. Furthermore, a Username cannot be used twice. It has to be unique and Availability is shown to the User whilst typing. If a User ignores this and attempts to submit with a taken name, an error message will appear.</td>
      <td>CreateAccount.php, lines 49-82</td>
    </tr>
    <tr>
      <td></td>
      <td>Logging in: When a user attempts to log in, their input will be checked against the database. First checking if the fields are empty. Then checking if Username matches a row in the database, and if found selecting the hash(password) in that row. This hash is then checked using the password_validation function to see if it matches the password inputted in the log in form. </td>
      <td>UserAuth.php, lines 48-80.</td>  
    </tr>
    </tr>
  </table>
		
</body>
</html>



