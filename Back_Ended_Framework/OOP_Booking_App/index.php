<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/d6c47f4f0c.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/styles.css">
  <title>Properties App</title>
</head>
<body>
  <header  class="container">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">Booking App</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">List Properties<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Menu
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="modules/sign_in.php">Sign In</a>
              <a class="dropdown-item" href="modules/sign_up.php">Sign Up</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Suggestion</a>
            </div>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>

  <div class="container">
    <h5>Explore South Africa</h5>
    <div id="box">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="imgs/rsa/img1.jpg" alt="First slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Moses Mabida</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imgs/rsa/img2.jpg" alt="Second slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Cape Town</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imgs/rsa/img3.jpg" alt="Third slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Mountain Velleys</h5>
            </div>
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="imgs/rsa/img4.jpg" alt="Forth slide">
            <div class="carousel-caption d-none d-md-block">
              <h5>Johannesburg</h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    
    <div class="room-finding">
      <div class="find-room">
        <div class="search-room">
          <h3>Search A Room</h3>
          <form action='search.php' method='get'>
            <div>
              <label>
                <select name='type'>
                  <option>Select Room Type</option>
                  <option value='Single Room'>Single</option>
                  <option value='Double Room'>Double</option>
                  <option value='First Room'>First class</option>
                </select>
                <i class="fa fa-building-o"></i>
              </label>
            </div>
              
            
            <div>
              <label>
                <select name='adult'>
                  <option>Adults</option>
                  <option value='1'>1</option>
                  <option value='2'>2</option>
                  <option value='3'>3</option>
                </select>
                <i class="fa fa-angle-down"></i>
              </label>
            </div>
            <div>
              <label>
                <select name='child'>
                  <option>Child</option>
                  <option  value='1'>1</option>
                  <option  value='2'>2</option>
                  <option  value='3'>3</option>
                </select>
                <i class="fa fa-angle-down	"></i>
              </label>
            </div>
            <div class="other-options">
              <input type="submit" name='search' class="searching" value="Search Now" />
            </div>
          </form>
        </div>
      </div><!--find-room end-->
    </div><!--room-finding end-->
  </div> <!--end of container div -->

  

  
  <script src="js/scripts.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>