<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link
    href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="cdnjs.cloudflare.com/ajax/libs/font-awesome/5.1.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
<div class="header">
      <div class="headerContainerL">
        <div class="headerList">
          <div class="headerListItem active">
            <i class="fa fa-search"></i>
            <span>Stays</span>
          </div>
          <div class="headerListItem">
            <i class="fa fa-search"></i>
            <span>Flights</span>
          </div>
          <div class="headerListItem">
            <i class="fa fa-search"></i>
            <span>Car rentals</span>
          </div>
          <div class="headerListItem">
            <i class="fa fa-search"></i>
            <span>Attractions</span>
          </div>
          <div class="headerListItem">
            <i class="fa fa-search"></i>
            <span>Airport taxis</span>
          </div>
        </div>
            <h1 class="headerTitle">
              A lifetime of discounts? It's Genius.
            </h1>
            <p class="headerDesc">
              Get rewarded for your travels – unlock instant savings of 10% or
              more with a free Lamabooking account
            </p>
            <button class="headerBtn">Sign in / Register</button>
            <div class="headerSearch">
              <div class="headerSearchItem">
                <input
                  type="text"
                  placeholder="Where are you going?"
                  class="headerSearchInput"
                />
              </div>
              <div class="headerSearchItem">
              </div>
              <div class="headerSearchItem">
                  <div class="options">
                    <div class="optionItem">
                      <span class="optionText">Adult</span>
                      <div class="optionCounter">
                        <button
                        
                          class="optionCounterButton"
                        >
                          -
                        </button>
                        <span class="optionCounterNumber">
                        </span>
                        <button
                          class="optionCounterButton"
                        >
                          +
                        </button>
                      </div>
                    </div>
                    <div class="optionItem">
                      <span class="optionText">Children</span>
                      <div class="optionCounter">
                        <button
                          class="optionCounterButton"
                        >
                          -
                        </button>
                        <span class="optionCounterNumber">
                        </span>
                        <button
                          class="optionCounterButton"
                        >
                          +
                        </button>
                      </div>
                    </div>
                    <div class="optionItem">
                      <span class="optionText">Room</span>
                      <div class="optionCounter">
                        <button
                          class="optionCounterButton"
                        >
                          -
                        </button>
                        <span class="optionCounterNumber">
                        </span>
                        <button
                          class="optionCounterButton"
                        >
                          +
                        </button>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="headerSearchItem">
                <button class="headerBtn" onClick={handleSearch}>
                  Search
                </button>
              </div>
            </div>
          </>
      </div>
    </div>
</body>
</html>