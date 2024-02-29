<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="navbar">
 <a href="dashboard.php" class="nav-link">Dashboard</a>
       <a href="index.php" class="w3-bar-item w3-button">Index</a>
	  <a href="profile.php" class="w3-bar-item w3-button">Profile</a>
	<a href="logout.php" class="w3-bar-item w3-button">Logout</a>
</div>
</body>
</html>
<style>
* {
  box-sizing: border-box;
}

/* Add a gray background color with some padding */
body {
  font-family: Arial;
  padding: 20px;
  background: #f1f1f1;
}

/* Header/Blog Title */
.header {
  padding: 30px;
  font-size: 40px;
  text-align: center;
  background: white;
}

/* Create two unequal columns that floats next to each other */
/* Left column */
.leftcolumn {   
  float: left;
  width: 75%;
}

/* Right column */
.rightcolumn {
  float: left;
  width: 25%;
  padding-left: 20px;
}

/* Fake image */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Add a card effect for articles */
.card {
   background-color: white;
   padding: 20px;
   margin-top: 20px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Footer */
.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
  margin-top: 20px;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 800px) {
  .leftcolumn, .rightcolumn {   
    width: 100%;
    padding: 0;
  }
}
</style>
</head>
<body>

<div class="header">
  <h2>Blogs</h2>
   <!-- Add Upload Blog Button -->
  <button onclick="window.location.href = 'upload_blog.php';">Upload Blog</button>
</div>

<div class="row">
  <div class="leftcolumn">
    <div class="card">
      <h2>Example Blog</h2>
      <h5>Iran-Linked UNC1549 Hackers Target Middle East Aerospace & Defense Sectors, Feb 28, 2024</h5>
      <img src="images/cyberattack.webp" alt="WebP Image" style="height:300px; width:auto;" />
      <p>Source- TheHackerNews</p>
      <p>An Iran-nexus threat actor known as UNC1549 has been attributed 
		Other targets of the cyber espionage activity likely include Turkey, India, and Albania, Google-owned Mandiant said in a new analysis.
		UNC1549 is said to overlap with Smoke Sandstorm (previously Bohrium) and Crimson Sandstorm (previously Curium), the latter of which is an Islamic Revolutionary Guard Corps (IRGC) affiliated group which is also known as Imperial Kitten, TA456, Tortoiseshell, and Yellow Liderc.
		"This suspected UNC1549 activity has been active since at least June 2022 and is still ongoing as of February 2024," the company said. "While regional in nature and focused mostly in the Middle East, the targeting includes entities operating worldwide." The attacks entail the use of Microsoft Azure cloud infrastructure for command-and-control (C2) and social engineering involving job-related lures to deliver two backdoors dubbed MINIBIKE and MINIBUS.
		The spear-phishing emails are designed to disseminate links to fake websites containing Israel-Hamas related content or phony job offers, resulting in the deployment of a malicious payload.</p>
    </div>
    <div class="card">
      <h2>Example Blog 2</h2>
      <h5>Snowden SEPTEMBER 19, 2019</h5>
		<img src="images/snowden.jpg" alt="Jpg Image" style="height:500px; width:auto;" />
      <p>In 2013, Edward Snowden was an IT systems expert working under contract for the National Security Agency when he traveled to Hong Kong to provide three journalists with thousands of top-secret documents about U.S. intelligence agencies' surveillance of American citizens.
		To Snowden, the classified information he shared with the journalists exposed privacy abuses by government intelligence agencies. He saw himself as a whistleblower. But the U.S. government considered him a traitor in violation of the Espionage Act.
		After meeting with the journalists, Snowden intended to leave Hong Kong and travel — via Russia — to Ecuador, where he would seek asylum. But when his plane landed at Moscow's Sheremetyevo International Airport, things didn't go according to plan as America cancelled his passport. Snowden was directed to a room where Russian intelligence agents offered to assist him — in return for access to any secrets he harbored. Snowden says he refused.</p>
    </div>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>Cyber Security</h2>
      <<img src="images/cybersecurity.jpg" alt="Jpg Image" style="height:160px; width:auto;" />
      <p>Cyber security is how individuals and organisations reduce the risk of cyber attack.
		Cyber security's core function is to protect the devices we all use (smartphones, laptops, tablets and computers), and the services we access - both online and at work - from theft or damage.
		It's also about preventing unauthorised access to the vast amounts of personal information we store on these devices, and online.</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
	   <img src="images/cyberchallenges.jpg" alt="Jpg Image" style="height:160px; width:auto;" />
      <img src="images/cyberproject.jpg" alt="Jpg Image" style="height:160px; width:auto;" />
       <img src="images/cyber.jpg" alt="Jpg Image" style="height:160px; width:auto;" />
    </div>
    <div class="card">
      <h3>Popular Cyber Security Blogs</h3>
	  <a href="https://krebsonsecurity.com/">Krebson Security Blog</a><br>
	  <a href="https://thehackernews.com/" >The Hacker News Blog</a><br>
	  <a href="https://darkreading.com/" >Dark Reading cyber security blog</a>
	
      <p></p>
    </div>
  </div>
</div>

<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>