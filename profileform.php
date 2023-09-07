<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <!---<title> Responsive Registration Form | CodingLab </title>--->
    <link rel="stylesheet" href="profileform.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="profileform_php.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name='name' required data>
          </div>
          <div class="input-box">
            <span class="details">E-mail</span>
            <input type="email" placeholder="Enter your email" name='email' required data>
          </div>
          <div class="input-box">
            <span class="details">Age</span>
            <input type="number" placeholder="Enter your age" name='age' required data>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="tel" placeholder="Enter your number" name='phone_no' pattern="[0-9]{10}" required data>
          </div>
          
          <div class="input-box">
            <span class="details">Profession</span>
            <input type="text" placeholder="write your profession" name='profession' required data>
          </div>
          
        </div>
        <div class="input-box">
            <span class="details">Bio</span>
            <textarea id="detals" name="about" rows="3" cols="20" placeholder="Enter About Your Self" data></textarea>   
        </div>
        <div class="input-box">
            <span class="details">About Your Profession</span>
            <textarea id="details" name="additional" rows="3" cols="20" placeholder="Enter about your profession" data></textarea>   
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" id="dot-1">
          <input type="radio" name="gender" id="dot-2">
          <input type="radio" name="gender" id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>
  <script>
    inps = document.querySelectorAll('[data]');
    const infos=localStorage.getItem('info');

    //'shubham jha', '45', '123456789', 'chor@gamil.com',
    // 'I am a great teacher', 'I am future', '6.7', 'user.png', 'Teacher']
    if(infos!==null) {
      const data=JSON.parse(infos);
      console.log(data,inps);
      inps[0].value=data[0];
      inps[1].value=data[3];
      inps[2].value=data[1];
      inps[3].value=data[2];
      inps[4].value=data[8];
      inps[5].value=data[4];
      inps[6].value=data[5];
    }
  </script>
</body>
</html>
