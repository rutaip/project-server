<h1>Presence Project Server</h1>
<hr>
<br>
<h4>Welcome {{ $user->name . ' ' . $user->last  }}:</h4>

<br>

These are the credentials to access
<br>
<br>
Username: {{ $user->email  }}<br>
Password: {{ $password }}<br>
Region: {{ $user->region->region }}<br>
Role: {{ $user->role->label }}<br>

<br>

Access now <a href="http://project.presenceco.com">Project Server</a>
<br>
<br>
<hr>
