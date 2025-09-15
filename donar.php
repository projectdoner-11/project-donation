<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Life Blood Organ Network</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
  <style>
    /* Reset and Global Styles */
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body { font-family: 'Poppins', sans-serif; background-color: #f5f5f5; color: #333; }

    /* Slideshow Styles */
    .slideshow-container {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -2;
    }
    .slideshow-container img {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      opacity: 0;
      transition: opacity 1s ease-in-out;
    }
    .slideshow-container img.active {
      opacity: 1;
    }

    /* Header Styles */
    header {
      background: linear-gradient(to right, #ff6a00, #ee0979);      
      color: white;
      padding: 1rem 2rem;
      display: flex;
      justify-content: space-between;
      align-items: center;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 1;
    }
    header h1 { font-size: 1.8rem; }
    nav a {
      color: white;
      margin-left: 1rem;
      text-decoration: none;
      font-weight: 600;
      transition: color 0.3s ease;
    }
    nav a:hover { text-decoration: underline; }

    /* Marquee Styles */
    .marquee {
      background-color: #fff3cd;
      color: #d63333;
      padding: 0.5rem 1rem;
      font-weight: 600;
      text-align: center;
      overflow: hidden;
      white-space: nowrap;
      position: relative;
      z-index: 1;
    }
    .marquee-content {
      white-space: nowrap;
      display: inline-block;
      position: relative;
      left: 100%;
      animation: scrollOnce 25s linear forwards;
      animation-iteration-count: 15;
      animation-fill-mode: forwards;
    }
    @keyframes scrollOnce {
      0% { left: 100%; }
      100% { left: -100%; }
    }

     .two {
      padding: 20px;
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.8);
      margin: 20px auto;
      max-width: 420px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
	.three {
      padding: 20px;
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.8);
      margin: 20px auto;
      max-width: 830px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
	.four {
      padding: 20px;
      position: relative;
      z-index: 1;
      background-color: rgba(255, 255, 255, 0.8);
      margin: 29px auto;
      max-width: 950px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    /* Hero Section */
    .hero {
      background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.6));
      height: 500px;
      color: white;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 2rem;
      position: relative;
      z-index: 0;
    }
    .hero h2 { font-size: 3rem; margin-bottom: 1rem; animation: fadeIn 1.5s ease-in; }
    .hero p { font-size: 1.2rem; max-width: 600px; margin-bottom: 2rem; animation: fadeIn 2s ease-in; }
    .hero a {
      background-color: #e53935;
      padding: 0.75rem 2rem;
      border-radius: 999px;
      color: white;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s ease;
      animation: fadeIn 2.5s ease-in;
    }
    .hero a:hover { background-color: #c62828; }
    
	.toggle-buttons {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: 40px;
      z-index: 2;
      position: relative;
    }
    .toggle-buttons button {
      padding: 10px 20px;
      font-size: 16px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      background: #fff;
      border: 2px solid #ff6a00;
      color: #ff6a00;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    .toggle-buttons button.active,
    .toggle-buttons button:hover {
      background: linear-gradient(to right, #ee0979, #ff6a00);
      color: white;
    }

    /* Form Section */
    .form-container {
      display: flex;
      justify-content: center;
      align-items: flex-start;
      gap: 60px;
      flex-wrap: wrap;
      padding: 6px 20px;
    }
    form {
      display: none;
      flex-direction: column;
      max-width: 360px;
      width: 100%;
      background: rgba(255, 255, 255, 0.95);
      padding: 25px;
      border-radius: 15px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }
    form.active { display: flex; }
    input, select, textarea {
      margin: 12px 0;
      padding: 12px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 8px;
      outline: none;
      transition: border-color 0.3s ease;
    }
    input:focus, textarea:focus, select:focus {
      border-color: #ff6a00;
    }
    button {
      padding: 12px;
      background: linear-gradient(to right, #ee0979, #ff6a00);
      border: none;
      color: white;
      font-size: 16px;
      font-weight: 500;
      border-radius: 8px;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    button:hover { background: linear-gradient(to right, #ff3c00, #d1006f); }

    /* Footer Styles */
    footer {
      background-color: #263238;
      color: white;
      text-align: center;
      padding: 1rem;
      font-size: 0.9rem;
      position: relative;
      z-index: 1;
    }
	.h2 {
      text-align: center;
      color: #d84315;
      font-weight: 600;
    }
	h3 {
      text-align: none;
      color: #d84315;
      font-weight: 600;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background: white;
    }
    th, td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
    }
    th {
      background-color: #f2f2f2;
    }
	.donation-instructions {
      display: flex;
      justify-content: space-between;
      gap: 20px;
      margin: 20px 0;
    }

    .donation-type {
      background: rgba(255, 255, 255, 0.9);
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      max-width: 90%;
    }

    .donation-type h3 {
      color: #d84315;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .donation-type ul {
      margin-left: 20px;
      color: #555;
    }

    .donation-type strong {
      color: #e53935;
    }
form label {
  font-weight: 600;
  color: #444;
  margin-top: 12px;
  display: block;
}

	.thank-you-container {
      display: none;
      justify-content: center;
      align-items: center;
      flex-direction: column;
      padding: 2rem;
    }

    .thank-you-container img {
      width: 250px;
      margin-bottom: 1rem;
    }

    .thank-you-container h3 {
      font-size: 1.5rem;
      color: #d84315;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
	/* Spinner */
.spinner {
  border: 3.5px solid rgba(255, 255, 255, 0.4);
  border-top: 3.5px solid #fff;
  border-radius: 50%;
  width: 20px;
  height: 20px;
  animation: spin 1s linear infinite;
  vertical-align: middle;
  display: inline-block;
  margin-left: 8px;
}

@keyframes spin {
  0%   { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

  </style>
</head>
<body>

  <div class="slideshow-container">
    <img src="1.png" class="active" alt="Slide 1" />
    <img src="2.jpg" alt="Slide 2" />
    <img src="3.jpg" alt="Slide 3" />
  </div>

  <header>
    <h1>Life Blood Organ Network</h1>
    <nav>
      <a onclick="showSection('home')">About us</a>
      <a onclick="showSection('register')">Register</a>
      <a onclick="showSection('status')">Status</a>
      <a onclick="logout()">Logout</a>
    </nav>
  </header>

  <div class="marquee">
    <div class="marquee-content" id="newsMarquee">
      Hello Donors! There are urgent requests for blood and organs 
      <span id="newsdata" style="color:red;"><strong> loading requests!...</strong></span>. Please help save lives by fulfilling these needs.
    </div>
  </div>

  <div id="mainApp">

      <section class="hero">
	  <h2>Hello, <?php echo $_SESSION["dusername"] ?></h2>
        <h2>Be a Hero – Donate Blood & Organs</h2>
        <p>Join our life-saving mission and connect with people who need you the most.</p>
        <a onclick="showSection('register')">Get Started</a>
      </section>

    <section id="home" class="four" >
        <h2 class="h2">How to Donate</h2>
        <p align="center">Your donation can save lives! Below are the guidelines for donating blood and organs:</p>

        <div class="donation-instructions">
          <div class="donation-type">
            <h3>Blood Donation</h3>
            <p>Blood donations help patients who need immediate assistance. Here are the essential guidelines for blood donation:</p>
            <ul>
              <li><strong>Eligibility:</strong> Age 18-65 years</li>
              <li><strong>Weight:</strong> At least 45kg</li>
              <li><strong>Frequency:</strong> 
                <ul>
                  <li>Every 3 months (90 days) for men</li>
                  <li>Every 4 months (120 days) for women</li>
                </ul>
              </li>
            </ul>
            <p><strong>Important:</strong> Ensure that you are in good health before donating.</p>
          </div>

          <div class="donation-type">
            <h3>Organ Donation</h3>
            <p>Organ donations save lives by providing essential transplants. Below are the guidelines for organ donation:</p>
            <ul>
              <li><strong>Eligibility:</strong> Age 18-65 years</li>
              <li><strong>Frequency:</strong> Every 1 year (365 days) for organ donation.</li>
            </ul>
            <p><strong>Important:</strong> Organ donation should be considered carefully. Make sure you are fully informed about the process and potential impacts.</p>
          </div>
        </div>
	</section>
    <!-- Register Section -->
     <section id="register" style="display:none;" class="two">
      <h2 class="h2">Register as Donor</h2>
      <div class="toggle-buttons">
        <button id="bloodBtn" class="active" onclick="showForm('blood')">BLOOD</button>
        <button id="organBtn" onclick="showForm('organ')">ORGAN</button>
      </div>

      <div class="form-container">

<!-- Blood Donation Form -->
<form id="bloodForm" enctype="multipart/form-data" class="active" novalidate>
  <label for="bloodName">Full Name</label>
  <input type="text" id="bloodName" name="name" value="<?php echo $_SESSION["dusername"]; ?>" required />

  <label for="bloodPhone">Contact Number</label>
  <input type="text" id="bloodPhone" name="pno" value="<?php echo $_SESSION["dphone"]; ?>" required />

  <label for="aadhar1">Aadhar Number</label>
  <input type="text" id="aadhar1" name="aadhar" placeholder="XXXX-XXXX-XXXX" required />

  <label for="dob1">Date of Birth</label>
  <input type="date" id="dob1" name="dob" required />

  <label for="bloodGroup">Blood Group</label>
  <select name="bg" id="bloodGroup" required>
    <option value="" disabled selected>Select Blood Group</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>

  <label for="bloodPhoto">Upload Your Photo (Max 64KB)</label>
  <input type="file" id="bloodPhoto" name="photo" accept=".pdf,.jpg,.png" />

  <label for="bloodCertificate">Upload Donation Certificate (optional)</label>
  <input type="file" id="bloodCertificate" name="certificate" accept=".pdf,.jpg,.png" />

  <button type="submit">Register</button>
</form>


        <!-- Organ Donation Form -->
<form id="organForm" enctype="multipart/form-data">
  <label for="organName">Full Name</label>
  <input type="text" id="organName" name="name" value="<?php echo $_SESSION["dusername"]; ?>" required />

  <label for="organPhone">Contact Number</label>
  <input type="text" id="organPhone" name="pno" value="<?php echo $_SESSION["dphone"]; ?>" required />

  <label for="aadhar2">Aadhar Number</label>
  <input type="text" id="aadhar2" name="aadhar" placeholder="XXXX-XXXX-XXXX" required />

  <label for="dob2">Date of Birth</label>
  <input type="date" id="dob2" name="dob" required />

  <label for="organBloodGroup">Blood Group</label>
  <select name="bg" id="organBloodGroup" required>
    <option value="" disabled selected>Select Blood Group</option>
    <option value="A+">A+</option>
    <option value="A-">A-</option>
    <option value="B+">B+</option>
    <option value="B-">B-</option>
    <option value="AB+">AB+</option>
    <option value="AB-">AB-</option>
    <option value="O+">O+</option>
    <option value="O-">O-</option>
  </select>

  <label for="organType">Select Organ</label>
  <select name="ot" id="organType" required>
    <option value="" disabled selected>Select Organ</option>
    <option value="Kidney">Kidney</option>
    <option value="Liver">Liver</option>
    <option value="Heart">Heart</option>
    <option value="Lung">Lung</option>
  </select>

  <label for="organPhoto">Upload Your Photo (Max 64KB)</label>
  <input type="file" id="organPhoto" name="photo" accept=".pdf,.jpg,.png" />

  <label for="organCertificate">Upload Donation Certificate (optional)</label>
  <input type="file" id="organCertificate" name="certificate" accept=".pdf,.jpg,.png" />

  <button type="submit">Register</button>
</form>

      </div>
    </section>
	

    <!-- Status Section -->
    <section id="status" style="display:none;">
	  <div class="three">
	  <h2 class="h2">Donation Status</h2>
	  <h3>Details:</h3>
	<table id="requestTable" align="center">
	<thead>
	<tr>
	<th>Name</th>
	<th>Contact</th>
	<th>Dob</th>
	<th>Blood</th>
	<th>Organ</th>
	<th>Status</th>
	<th>Change</th>
	</tr>
	</thead>
	<tbody></tbody>
	</table>
	</div>
    </section>
  </div>

  <footer>
    <p>&copy; 2025 Life Blood Organ Network. All Rights Reserved.</p>
  </footer>

  <script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slideshow-container img');
    setInterval(() => {
      slides[currentSlide].classList.remove('active');
      currentSlide = (currentSlide + 1) % slides.length;
      slides[currentSlide].classList.add('active');
    }, 3000);

    function showSection(section) {
      const sections = document.querySelectorAll('section');
      sections.forEach(s => s.style.display = 'none');
      document.getElementById(section).style.display = 'block';
      if(section === 'status') loadRequests();
	}


    function showForm(type) {
      const bloodForm = document.getElementById('bloodForm');
      const organForm = document.getElementById('organForm');
      const bloodBtn = document.getElementById('bloodBtn');
      const organBtn = document.getElementById('organBtn');

      if (type === 'blood') {
        bloodForm.classList.add('active');
        organForm.classList.remove('active');
        bloodBtn.classList.add('active');
        organBtn.classList.remove('active');
      } else {
        organForm.classList.add('active');
        bloodForm.classList.remove('active');
        organBtn.classList.add('active');
        bloodBtn.classList.remove('active');
      }
    }
    function toggleButtonLoading(button, isLoading) {
  if (isLoading) {
    button.disabled = true;
    if (!button.querySelector('.spinner')) {
      const spinner = document.createElement('span');
      spinner.className = 'spinner';
      button.appendChild(spinner);
    }
  } else {
    button.disabled = false;
    const spinner = button.querySelector('.spinner');
    if (spinner) spinner.remove();
  }
}

	//aadhaar
    document.getElementById("aadhar1").addEventListener("input",function(e)
	{
		let value=e.target.value.replace(/\D/g,"");
		value=value.substring(0,12);
		let format=value.match(/.{1,4}/g)?.join("-")||"";
		e.target.value=format;
	});
	 document.getElementById("aadhar2").addEventListener("input",function(e)
	{
		let value=e.target.value.replace(/\D/g,"");
		value=value.substring(0,12);
		let format=value.match(/.{1,4}/g)?.join("-")||"";
		e.target.value=format;
	});
	
	
	function load()
   {
       var xhr=new XMLHttpRequest();
	   xhr.open("GET","donar_get_marquee.php",true);
	   xhr.onload=function(){
	       if(xhr.status===200)
		   {
              document.getElementById("newsdata").innerHTML=xhr.responseText;		   
		   }
	   };
	   xhr.send();
   }
   setInterval(load,5000);
   window.onload=load;


  function loadRequests() {
  fetch('donar_get_requests.php', { method: 'POST' })
    .then(response => response.text()) // read as text first
    .then(text => {
      console.log("Raw response:", text); // 🔍 log to browser console

      let data;
      try {
        data = JSON.parse(text);
      } catch (e) {
        throw new Error("Invalid JSON: " + text);
      }

      if (!Array.isArray(data)) {
        throw new Error("Expected array, got something else.");
      }

      const tbody = document.querySelector('#requestTable tbody');
      tbody.innerHTML = '';
      data.forEach(req => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${req.uname}</td>
          <td>${req.phone}</td>
          <td>${req.dob}</td>
          <td>${req.blood}</td>
          <td>${req.organ || '-'}</td>
          <td>${req.status}</td>
          <td><button id="available" value="${req.phone}" onclick="available(this)">Unavailable</button></td>
        `;
        tbody.appendChild(row);
      });
    })
    .catch(error => {
      alert('Error loading requests: ' + error.message);
    });
}
  function available(button)
  {
    const formData = button.value;

    fetch('update_donar_available.php', {
      method: 'POST',
      body: new URLSearchParams({number:formData})
    })
    .then(response => response.text())
    .then(result => {
      alert(result);
      button.disabled=true;
	  button.innerText="Marked Unavailable";
    })
    .catch(error => {
      alert('Error submitting blood donor: ' + error);
    }); 
  }
  // Get age from DOB
  function getAgeFromDOB(dobStr) {
    const dob = new Date(dobStr);
    const today = new Date();
    let age = today.getFullYear() - dob.getFullYear();
    if (
      today.getMonth() < dob.getMonth() ||
      (today.getMonth() === dob.getMonth() && today.getDate() < dob.getDate())
    ) {
      age--;
    }
    return age;
  }
  
 document.getElementById('bloodForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const submitBtn = this.querySelector('button[type="submit"]');
  toggleButtonLoading(submitBtn, true);

  const formData = new FormData(this);
  const age = getAgeFromDOB(formData.get('dob'));

  if (age < 18) {
    alert('You must be at least 18 years old to register as a blood donor.');
    toggleButtonLoading(submitBtn, false);
    return;
  }

  fetch('donar_register.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(result => {
    alert(result);
    this.reset();
    toggleButtonLoading(submitBtn, false);
  })
  .catch(error => {
    alert('Error submitting blood donor: ' + error);
    toggleButtonLoading(submitBtn, false);
  });
});


  document.getElementById('organForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const submitBtn = this.querySelector('button[type="submit"]');
  toggleButtonLoading(submitBtn, true);

  const formData = new FormData(this);
  const age = getAgeFromDOB(formData.get('dob'));

  if (age < 18) {
    alert('You must be at least 18 years old to register as an organ donor.');
    toggleButtonLoading(submitBtn, false);
    return;
  }

  fetch('donar_register.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(result => {
    alert(result);
    this.reset();
    toggleButtonLoading(submitBtn, false);
  })
  .catch(error => {
    alert('Error submitting organ donor: ' + error);
    toggleButtonLoading(submitBtn, false);
  });
});

 
  
function logout() {
    if(confirm('Are you sure you want to logout?')) {
        window.location.href = 'logout.php';
    }
}

  
  // Set max DOB date on load
  window.onload = () => {
    const today = new Date();
    const maxDOB = `${today.getFullYear() - 18}-${String(today.getMonth() + 1).padStart(2, '0')}-${String(today.getDate()).padStart(2, '0')}`;
    document.getElementById('dob1').max = maxDOB;
    document.getElementById('dob2').max = maxDOB;
  };
  </script>
</body>
</html>
