<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registration Form</title>
	<link rel="stylesheet" href="/css/register_style.css">
</head>
<body>

<div class="wrapper">
    <div class="title">
      Registration Form
    </div>
    <div class="form">
       <div class="inputfield">
          <label>Full Name</label>
          <input type="text" class="input">
       </div>
       <div class="inputfield">
        <label>Gender</label>
        <div class="custom_select">
          <select>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
     </div>
        <div class="inputfield">
          <label>Date Of Birth</label>
          <input type="date" class="input">
       </div>
       <div class="inputfield">
          <label>Phone Number</label>
          <input type="text" class="input">
       </div>
      <div class="inputfield">
          <label>Email</label>
          <input type="email" class="input">
       </div>
        <div class="inputfield">
          <label>Password</label>
          <input type="password" class="input">
       </div>
      <div class="inputfield">
          <label>Address</label>
          <textarea class="textarea"></textarea>
       </div>
       <div class="inputfield">
        <label>Province</label>
        <input type="text" class="input">
     </div>
     <div class="inputfield">
        <label>City</label>
        <input type="text" class="input">
     </div>
     <div class="inputfield">
        <label>District</label>
        <input type="text" class="input">
     </div>
     <div class="inputfield">
          <label>Postal Code</label>
          <input type="text" class="input">
       </div>
      <div class="inputfield">
        <input type="submit" value="Register" class="btn">
      </div>
    </div>
</div>

</body>
</html>
