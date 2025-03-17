<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>
<style>
  .ride {
    color: white;
    font-weight: 600;
  }

  .with {
    color: white;
    font-weight: 600;

  }

  .me {
    color: white;
    font-weight: 600;


  }

  /* .logo{
    background-color: white;
    border-radius: 7px;
    padding: 3px;
    /* line-height: 15px; */

  /* .navbar{
    background-color: grey;
    border-radius: 5px;
  } */

  .home {
    color: white;
  }

  .vm .a {
    color: white;
  }

  .logo {
    color: blue;
    background-color: white;
    border-radius: 5px;
    padding: 5px;
    font-weight: 600;
  }
</style>

<body>
    <nav class="navbar">
        <div class="logo">RideWithMe</div>
        <ul class="nav-links">
            <li><a href="info.php">Request</a></li>
            <li><a href="ride.php">MyRides</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="land.php">Chatbot</a></li>
            <li><a href="#contact"  id="logout-link">logout</a></li>
            
        </ul>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
<style>

   * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            padding-top: 60px; /* To prevent content from hiding behind the fixed navbar */
        }

        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background-color: #333;
            position: fixed; /* Fix the navbar at the top */
            width: 100%; /* Make the navbar full width */
            top: 0; /* Stick it to the top */
            left: 0;
            z-index: 1000; /* Ensure it stays on top of other content */
        }

        .logo {
            color: blue;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-left: 20px;
        }

        .nav-links a {
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            padding: 8px 16px;
            transition: background-color 0.3s ease;
        }

        .nav-links a:hover {
            background-color: #555;
            border-radius: 4px;
        }

        /* Hamburger menu for mobile */
        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
        }

        .hamburger span {
            width: 25px;
            height: 3px;
            background-color: #fff;
            margin: 4px;
            transition: transform 0.3s ease;
        }

        /* Responsive styles */
        @media (max-width: 768px) {
            .nav-links {
                position: absolute;
                right: 0;
                top: 60px; /* Adjust based on the height of the navbar */
                height: 40vh; /* Set to 50% of the viewport height */
                width: 100%;
                background-color: #333;
                flex-direction: column;
                justify-content: center;
                align-items: center;
                transition: transform 0.3s ease-in-out;
                transform: translateX(100%);
            }

            .nav-links li {
                margin: 20px 0;
            }

            .nav-links.active {
                transform: translateX(0);
            }

            .hamburger {
                display: flex;
            }

            .hamburger.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            .hamburger.active span:nth-child(2) {
                opacity: 0;
            }

            .hamburger.active span:nth-child(3) {
                transform: rotate(-45deg) translate(5px, -5px);
            }
        }
.modal {
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0,0,0,0.4);
  display: none;
  
  
}

.modal-content {
  background-color: lightgray;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
  height: 30%;
  text-align: center;
}
#confirm-logout-btn{
  color: #fff;
  border-radius: 10px;
  margin-bottom: 10px;
   /*border: 1px solid grey;*/
    background-color:red;
    height:40px;
 
}
#cancel-logout-btn{
  color:#fff;
  border-radius: 10px;
  /*border: 1px ##0487E2;*/
  background-color:#0487E2;
  height:40px;
}

@media screen and (min-width: 768px) {
  .modal-content {
    max-width: 400px; 
  }
}


</style>
<!-- Modal popup -->
<div class="modal" id="logout-modal">
  <div class="modal-content">
    <h4>Are you sure you want to logout?</h4>
    <button id="confirm-logout-btn">Yes</button>
    <button id="cancel-logout-btn">Cancel</button>
  </div>
</div>

        
<script>
const logoutLink = document.getElementById('logout-link');
const logoutModal = document.getElementById('logout-modal');


const confirmLogoutBtn = document.getElementById('confirm-logout-btn');
const cancelLogoutBtn = document.getElementById('cancel-logout-btn');


logoutLink.addEventListener('click', function(event) {
 
  event.preventDefault();


  logoutModal.style.display = "block";
});


confirmLogoutBtn.addEventListener('click', function() {
  // Redirect to the logout page
  window.location.href = "logout.php";
});


cancelLogoutBtn.addEventListener('click', function() {
  // Hide the modal popup
  logoutModal.style.display = "none";
});


function positionModal() {
  const modalContent = logoutModal.querySelector('.modal-content');
  modalContent.style.marginTop = `${(window.innerHeight - modalContent.offsetHeight) / 2}px`;
}
window.addEventListener('resize', positionModal);
positionModal();
</script>
<script>
        // Get the hamburger and the navigation links
        const hamburger = document.querySelector('.hamburger');
        const navLinks = document.querySelector('.nav-links');
        
        // Toggle the menu on click
        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
            hamburger.classList.toggle('active');
        });
    </script>

      </ul>
      <form class="form-inline my-2 my-lg-0">

      </form>
    </div>
  </nav>




  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>