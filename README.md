<h1 align="center">🏥 Hospital Management System</h1>
<h3 align="center">With WhatsApp Chatbot Assistance for Appointment Booking & Hospital Management</h3>

<p align="center">
  <img src="https://readme-typing-svg.herokuapp.com?font=Fira+Code&size=22&duration=3000&pause=1000&center=true&vCenter=true&multiline=true&width=750&height=100&lines=💻+Built+with+PHP,+MySQL,+HTML,+CSS,+JS;🤖+WhatsApp+Chatbot+Integration+via+Twilio+%26+Facebook;🏥+Multi-role+HMS+for+Admin,+Doctor,+Patient" alt="Typing SVG" />
</p>

---

<h2>🚀 Key Highlights</h2>
<ul>
  <li>📱 WhatsApp Chatbot for Appointment Booking</li>
  <li>👨‍⚕️ Role-based access (Admin / Doctor / Patient)</li>
  <li>🗓️ Online appointment scheduling</li>
  <li>👥 Staff & hospital resource management</li>
  <li>🗄️ Secure database-driven backend</li>
  <li>🌐 Public-facing & internal dashboards</li>
  <li>🔐 Authentication & session handling</li>
</ul>

<h2>🛠️ Tech Stack</h2>
<h3>Backend</h3>
<ul>
  <li>PHP (Core PHP)</li>
  <li>MySQL</li>
  <li>SQL-based relational schema</li>
</ul>

<h3>Frontend</h3>
<ul>
  <li>HTML5</li>
  <li>CSS3</li>
  <li>JavaScript (Vanilla JS)</li>
</ul>

<h3>Integrations</h3>
<ul>
  <li>WhatsApp Business API</li>
  <li>Twilio</li>
  <li>Facebook Developer Platform</li>
  <li>ngrok (for local webhook exposure)</li>
</ul>

<h3>Tools & Others</h3>
<ul>
  <li>Apache (XAMPP / WAMP)</li>
  <li>phpMyAdmin</li>
  <li>REST Webhooks</li>
  <li>Session-based authentication</li>
</ul>

<h2>📁 Project Structure</h2>
<pre>
hospital-management-system/
├── admin/              # Admin dashboard & management
├── doctor/             # Doctor dashboard & appointments
├── patient/            # Patient portal
├── include/            # DB config & shared files
├── img/                # Static assets
├── general Note/       # Documentation & notes
├── adminlogin.php
├── doctorlogin.php
├── patientlogin.php
├── patientaccount.php
├── apply.php           # Appointment booking
├── index.php           # Landing page
├── hms.sql             # Database schema
└── README.md
</pre>

<h2>👤 User Roles & Features</h2>
<h3>Admin 🔑</h3>
<ul>
  <li>Manage doctors, staff, and patients</li>
  <li>View all appointments</li>
  <li>Monitor hospital operations</li>
  <li>Control access & system configuration</li>
</ul>

<h3>Doctor 👨‍⚕️</h3>
<ul>
  <li>View assigned appointments</li>
  <li>Manage patient records</li>
  <li>Update availability</li>
  <li>Access doctor dashboard</li>
</ul>

<h3>Patient 🧑‍🤝‍🧑</h3>
<ul>
  <li>Register & login</li>
  <li>Book appointments</li>
  <li>View appointment history</li>
  <li>Interact via WhatsApp chatbot</li>
</ul>

<h2>🤖 WhatsApp Chatbot Features</h2>
<ul>
  <li>📅 Appointment booking</li>
  <li>🏥 Hospital information</li>
  <li>👨‍⚕️ Doctor availability queries</li>
  <li>🔁 Automated responses</li>
</ul>

<p>Workflow:</p>
<ol>
  <li>User sends a message on WhatsApp</li>
  <li>Message reaches Twilio</li>
  <li>Webhook exposed using ngrok</li>
  <li>PHP backend processes request</li>
  <li>Response sent back to WhatsApp</li>
</ol>

<h2>🔐 Authentication & Security</h2>
<ul>
  <li>Session-based login</li>
  <li>Role-based authorization</li>
  <li>Input validation</li>
  <li>Server-side verification</li>
  <li>Secure DB interactions</li>
</ul>

<h2>🧪 Database Design</h2>
<ul>
  <li>Patients</li>
  <li>Doctors</li>
  <li>Admins</li>
  <li>Appointments</li>
  <li>Chatbot logs</li>
</ul>
<p>Database file included: <code>hms.sql</code></p>

<h2>⚙️ Installation & Setup Guide</h2>
<ol>
  <li><strong>Clone the Repository:</strong><br>
    <code>git clone https://github.com/your-username/hospital-management-system.git</code>
  </li>
  <li><strong>Setup Server:</strong><br>
    Install XAMPP / WAMP and start Apache & MySQL
  </li>
  <li><strong>Import Database:</strong><br>
    Open phpMyAdmin → Create a database (e.g., hms) → Import <code>hms.sql</code>
  </li>
  <li><strong>Configure Database:</strong><br>
    Edit <code>include/db.php</code>:
    <pre>
$host = "localhost";
$user = "root";
$password = "";
$database = "hms";
    </pre>
  </li>
  <li><strong>WhatsApp Chatbot Setup:</strong>
    <ul>
      <li>Create a Twilio account & configure WhatsApp Sandbox</li>
      <li>Create Facebook Developer App</li>
      <li>Expose webhook using ngrok: <code>ngrok http 80</code></li>
      <li>Update webhook URL in Twilio settings</li>
    </ul>
  </li>
  <li><strong>Run the Project:</strong><br>
    Visit: <code>http://localhost/hospital-management-system/</code>
  </li>
</ol>

<h2>🖼️ Preview & Screenshots</h2>
<p>Place your screenshots in a <code>screenshots/</code> folder and reference them below:</p>

<img src="screenshots/home.png" alt="Home Page">
<img src="screenshots/admin.png" alt="Admin Dashboard">
<img src="screenshots/doctor.png" alt="Doctor Panel">
<img src="screenshots/whatsapp.png" alt="WhatsApp Chatbot">

<h2>🧩 Future Enhancements</h2>
<ul>
  <li>Payment gateway integration</li>
  <li>Email & SMS notifications</li>
  <li>AI-based symptom analysis</li>
  <li>Mobile app version</li>
  <li>Advanced chatbot NLP</li>
</ul>

<h2>📌 Why This Project Matters</h2>
<p>This project demonstrates:</p>
<ul>
  <li>Real-world backend system design</li>
  <li>API & webhook integration</li>
  <li>Multi-role access control</li>
  <li>Database-driven architecture</li>
  <li>Practical healthcare use case</li>
</ul>

<h2>🧑‍💻 Author</h2>
<p>
  <strong>GIRIDHARAN M</strong><br>
  Pre-final year B.Tech (AI & Data Science)<br>
  Interested in Backend Development & System Design
</p>
