<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head id="heads">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title> App Name </title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

  <!-- owl carousel -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <div id="app">
    <nav class="navbar fixed-top uxp-navbar navbar-dark navbar-expand">
      <div class="container-fluid">
        <button class="btn px-3 btn-uxp-black" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
          <svg width="20" height="12" viewBox="0 0 28 20" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 0H12C12.5304 0 13.0391 0.210714 13.4142 0.585787C13.7893 0.960859 14 1.46957 14 2C14 2.53043 13.7893 3.03914 13.4142 3.41421C13.0391 3.78929 12.5304 4 12 4H2C1.46957 4 0.960859 3.78929 0.585786 3.41421C0.210714 3.03914 0 2.53043 0 2C0 1.46957 0.210714 0.960859 0.585786 0.585787C0.960859 0.210714 1.46957 0 2 0ZM16 16H26C26.5304 16 27.0391 16.2107 27.4142 16.5858C27.7893 16.9609 28 17.4696 28 18C28 18.5304 27.7893 19.0391 27.4142 19.4142C27.0391 19.7893 26.5304 20 26 20H16C15.4696 20 14.9609 19.7893 14.5858 19.4142C14.2107 19.0391 14 18.5304 14 18C14 17.4696 14.2107 16.9609 14.5858 16.5858C14.9609 16.2107 15.4696 16 16 16ZM2 8H26C26.5304 8 27.0391 8.21072 27.4142 8.58579C27.7893 8.96086 28 9.46957 28 10C28 10.5304 27.7893 11.0391 27.4142 11.4142C27.0391 11.7893 26.5304 12 26 12H2C1.46957 12 0.960859 11.7893 0.585786 11.4142C0.210714 11.0391 0 10.5304 0 10C0 9.46957 0.210714 8.96086 0.585786 8.58579C0.960859 8.21072 1.46957 8 2 8Z" fill="white" />
          </svg>
          <span class="ms-2 fw-bold">
            XP
          </span>
        </button>
        <!-- <a class="ms-auto navbar-brand fw-bold" href="#">Divyadharshini J</a> -->
      </div>
    </nav>

    <div class="offcanvas uxp-menu offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
      <div class="offcanvas-body">
        <div class="text-end">
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
            <svg width="16" height="16" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M4.24234 1.41421L21.2129 18.3848C21.588 18.7598 21.7987 19.2686 21.7987 19.799C21.7987 20.3294 21.588 20.8381 21.2129 21.2132C20.8378 21.5883 20.3291 21.799 19.7987 21.799C19.2683 21.799 18.7595 21.5883 18.3845 21.2132L1.41391 4.24264C1.03884 3.86757 0.828125 3.35886 0.828125 2.82843C0.828125 2.29799 1.03884 1.78929 1.41391 1.41421C1.78898 1.03914 2.29769 0.828427 2.82812 0.828427C3.35856 0.828427 3.86727 1.03914 4.24234 1.41421Z" fill="white" />
              <path d="M18.9537 0.825596L14.8257 4.95358C14.6068 5.17254 14.5458 5.53153 14.6561 5.95158C14.7665 6.37162 15.0393 6.81832 15.4143 7.19339C15.7894 7.56846 16.2361 7.84119 16.6561 7.95158C17.0762 8.06196 17.4352 8.00097 17.6541 7.78201L21.7821 3.65402C22.0011 3.43506 22.0621 3.07607 21.9517 2.65603C21.8413 2.23598 21.5686 1.78929 21.1935 1.41421C20.8184 1.03914 20.3717 0.766412 19.9517 0.656025C19.5317 0.545638 19.1727 0.606635 18.9537 0.825596Z" fill="white" />
              <path d="M4.9537 14.8256L0.825718 18.9536C0.606756 19.1725 0.54576 19.5315 0.656147 19.9516C0.766534 20.3716 1.03926 20.8183 1.41434 21.1934C1.78941 21.5685 2.2361 21.8412 2.65615 21.9516C3.07619 22.062 3.43518 22.001 3.65415 21.782L7.78213 17.654C8.00109 17.4351 8.06209 17.0761 7.9517 16.656C7.84131 16.236 7.56858 15.7893 7.19351 15.4142C6.81844 15.0391 6.37174 14.7664 5.9517 14.656C5.53165 14.5456 5.17266 14.6066 4.9537 14.8256Z" fill="white" />
            </svg>
          </button>
        </div>
        <div>
          <h6 class="fw-bold mt-3">
            XP
          </h6>
          <ul class="uxp-nm links">
            <li class=""><a href="">Case Study</a></li>
            <li class=""><a href="">Mobile App</a></li>
            <li class=""><a href="">Research</a></li>
            <li class=""><a href="">Web Apps</a></li>
            <li class=""><a href="">UI + Dev</a></li>
            <li class=""><a href="">Graphic Design</a></li>
          </ul>
          <h6 class="fw-bold contacts mt-5">
            Contact
          </h6>
          <ul class="uxp-inline mt-3">
            <li class="mt-3 me-3">
              <a class="px-1" href="https://wa.me/919025074028">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <g fill="currentColor">
                    <path d="M17 12a5 5 0 1 0-4.478-2.774a.817.817 0 0 1 .067.574l-.298 1.113a.65.65 0 0 0 .796.796l1.113-.298a.817.817 0 0 1 .574.067A4.98 4.98 0 0 0 17 12Z" />
                    <path d="m8.038 7.316l.649 1.163c.585 1.05.35 2.426-.572 3.349c0 0-1.12 1.119.91 3.148c2.027 2.027 3.146.91 3.147.91c.923-.923 2.3-1.158 3.349-.573l1.163.65c1.585.884 1.772 3.106.379 4.5c-.837.836-1.863 1.488-2.996 1.53c-1.908.073-5.149-.41-8.4-3.66c-3.25-3.251-3.733-6.492-3.66-8.4c.043-1.133.694-2.159 1.53-2.996c1.394-1.393 3.616-1.206 4.5.38Z" opacity=".5" />
                  </g>
                </svg>
              </a>
            </li>
            <li class="mt-3 me-3">
              <a class="px-1" href="tel:+919025074028">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <g fill="currentColor">
                    <path fill-rule="evenodd" d="m16.1 13.359l.456-.453c.63-.626 1.611-.755 2.417-.317l1.91 1.039c1.227.667 1.498 2.302.539 3.255l-1.42 1.412c-.362.36-.81.622-1.326.67c-1.192.111-3.645.051-6.539-1.643l3.964-3.963Zm-5.91-5.876l.287-.286c.707-.702.774-1.83.157-2.654L9.374 2.86C8.61 1.84 7.135 1.705 6.26 2.575l-1.57 1.56c-.433.432-.723.99-.688 1.61c.065 1.14.453 3.22 2.149 5.776l4.039-4.038Z" clip-rule="evenodd" />
                    <path d="M12.063 11.497c-2.946-2.929-1.88-4.008-1.873-4.015l-4.039 4.04c.667 1.004 1.535 2.081 2.664 3.204c1.14 1.134 2.26 1.975 3.322 2.596L16.1 13.36s-1.082 1.076-4.037-1.862Z" opacity=".6" />
                  </g>
                </svg>
              </a>
            </li>
            <li class="mt-3 me-3">
              <a class="px-1" href="mailto:divyadjayabal@gmail.com">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 256 256">
                  <g fill="currentColor">
                    <path d="M224 128a96 96 0 1 1-96-96a96 96 0 0 1 96 96Z" opacity=".2" />
                    <path d="M128 24a104 104 0 0 0 0 208c21.51 0 44.1-6.48 60.43-17.33a8 8 0 0 0-8.86-13.33C166 210.38 146.21 216 128 216a88 88 0 1 1 88-88c0 26.45-10.88 32-20 32s-20-5.55-20-32V88a8 8 0 0 0-16 0v4.26a48 48 0 1 0 5.93 65.1c6 12 16.35 18.64 30.07 18.64c22.54 0 36-17.94 36-48A104.11 104.11 0 0 0 128 24Zm0 136a32 32 0 1 1 32-32a32 32 0 0 1-32 32Z" />
                  </g>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <main class="uxp-content" id="">
      @yield('content')
    </main>
    <div class="p-5 mt-5 footer gradient-here">
    </div>
  </div>

  <script>
    let html = document.querySelector('.gradient-here')
    let deg = 0
    let tick = () => {
      html.style.background = `background linear-gradient(${deg++}deg, #40C9FF, #E81CFF)`
      requestAnimationFrame(tick)
    }
    requestAnimationFrame(tick)
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel1').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      responsive: {
        0: {
          items: 1.25
        },
        600: {
          items: 3
        },
        1000: {
          items: 5
        }
      }
    })
  </script>

</body>

</html>