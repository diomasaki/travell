<?php
use Illuminate\Support\Facades\Auth;

$user = Auth::check();
$users = Auth::user();

if (!$user || ($user && !$users->isAdmin)) {
    header("Location: /login");
    exit;
}
?>

<?php
function formatCurrency($value) {
  // Format the value as a currency with thousands separators
  return number_format($value, 0, ',', '.');
}?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link
  href="https://fonts.googleapis.com/css2?family=Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
  rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css>
  <link rel="icon" href="https://d1csarkz8obe9u.cloudfront.net/posterpreviews/travel-agency-logo%2C-travel-company-logo-%281%29-design-template-bc9dcb1ca0e92d6394dea26418a87c8e_screen.jpg?ts=1667975913">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
</head>
<body>
<div style="margin-top: 100px;">
        @auth
        @include('components.navbar')
      <div class="detailwisata-container">
          <div id="sliders" class="slider-detail-wisata" style="display: none;">
              <i class="fa fa-close" style="top: 20px; right: 20px; position: absolute; font-size: 30px; color: lightgray; cursor: pointer;" onclick="closeSlider()"></i>
              <div class="sliderWrapperDetailWisata">
                  <img src="{{ asset('uploads/img/' . $detailData->img_paketwisata) }}" id="sliderImg" alt="" class="sliderImgWisata"/>
              </div>
          </div>
        <a href="{{ url()->previous() }}" style="text-decoration: none; color: white;"> <button class="bookNow-kembali">Kembali</button></a>
        <div class="detail-wisata-info">
          <h1 class="detail-nama-paket" id="editable-heading-paket" contenteditable><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>{{$detailData->paket_wisata}}</h1><button id="edit-submit-btn-paket" style="display: none;">Save Changes</button>
          <span class="jarak-paket-wisata" id="editable-heading-kota" contenteditable><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>
            {{ $detailData->kota }}
          </span><button id="edit-submit-btn-kota" style="display: none;">Save Changes</button>
          <span class="harga-paket-wisata-detail">
          <small><i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i>Kategori:     </small><small id="editable-heading-kategori" contenteditable>{{ $detailData->kategori }}</small><button id="edit-submit-btn-kategori" style="display: none; margin-top: 15px;">Save Changes</button>
          </span>
          <div class="fpRating">
          <i class="fa fa-pencil" aria-hidden="true" style="margin: 0px 10px;"></i><button id="editable-heading-ratings" contenteditable>{{ $detailData->ratings }}</button>
          </div>
          <button id="edit-submit-btn-ratings" style="display: none;">Save Changes</button>
          <form action="{{ route('update.img.pktwisata', ['id' => $detailData->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
          <div class="gambar-detail-macam-paket">
              <div class="gambar-detail-wrapper">
                <img
                  src="{{ asset('uploads/img/' . $detailData->img_paketwisata) }}"
                  alt=""
                  class="paket-wisata-detailImg"
                  onclick="toogleMenu()"
                />
                <input
                    type="file"
                    style="margin-top:15px;"
                    name="img_paketwisata"
                />
              </div>
            </div></br><button type="submit" style="width: 100px; margin-top: 20px;">Save Image</button>
            </form>
              <?php $count = 1?>
            <div class="deskripsi-paket-wrapper" style="margin-top: 20px;">
              <h1 class="detail-nama-paket">Rencana Perjalanan</h1>
              <i class="fa fa-pencil" aria-hidden="true"></i>
              <p class="desc-pkt-wisata" id="editable-heading-itinerary" contenteditable>
                <?php
                $itineraryLines = explode('.', $detailData->itinerary);
                foreach ($itineraryLines as $line) {
                    if (!empty(trim($line))) {
                        // Trim any existing spaces and add a period
                        $line = rtrim($line, " \t\n\r\0\x0B") . '.';
                        echo "{$line}<br>";
                    }
                }
                ?>
              </p><button id="edit-submit-btn-itinerary" style="display: none;">Save Changes</button>
            </div>
            <div class="deskripsi-paket-wrapper">
              <h1 class="detail-nama-paket">Keterangan Paket Wisata</h1>
              <i class="fa fa-pencil" aria-hidden="true"></i>
              <p class="desc-pkt-wisata" id="editable-heading-keterangan" contenteditable>
                {{ $detailData->keterangan }}
              </p><button id="edit-submit-btn-keterangan" style="display: none;">Save Changes</button>
            </div>
            <div class="deskripsi-paket-wrapper">
              <h1 class="detail-nama-paket">Harga</h1>
              <p class="desc-pkt-wisata" id="editable-heading-harga" contenteditable>
                 Rp. {{ formatCurrency($detailData->budget) }}
              </p><button id="edit-submit-btn-harga" style="display: none;">Save Changes</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('components.footer')
    @endauth
</body>
</html>

<!-- EDIT INPUT -->
<script>
 document.addEventListener('DOMContentLoaded', () => {
    // BORDERS
    const editableHeadingPaket = document.getElementById('editable-heading-paket');
    const editableHeadingKota = document.getElementById('editable-heading-kota');
    const editableHeadingKategori = document.getElementById('editable-heading-kategori');
    const editableHeadingRatings = document.getElementById('editable-heading-ratings');
    const editableHeadingItinerary = document.getElementById('editable-heading-itinerary');
    const editableHeadingKeterangan = document.getElementById('editable-heading-keterangan');
    const editableHeadingHarga = document.getElementById('editable-heading-harga');
    

    // BUTTON SUBMIT
    const editSubmitBtnPaket = document.getElementById('edit-submit-btn-paket');
    const editSubmitBtnKota = document.getElementById('edit-submit-btn-kota');
    const editSubmitBtnKategori = document.getElementById('edit-submit-btn-kategori');
    const editSubmitBtnRatings = document.getElementById('edit-submit-btn-ratings');
    const editSubmitBtnItinerary = document.getElementById('edit-submit-btn-itinerary');
    const editSubmitBtnKeterangan = document.getElementById('edit-submit-btn-keterangan');
    const editSubmitBtnHarga = document.getElementById('edit-submit-btn-harga');


    // IMAGES UPLOAD
    const editableImg = document.getElementById('editable-img');
    const imageInput = document.getElementById('image-input');
    const editSubmitBtnImage = document.getElementById('edit-submit-btn-image');



    // PAKET WISATA IMAGE HANDLE
    editableHeadingPaket.addEventListener('input', () => {
        editSubmitBtnPaket.style.display = 'block';
    });

    editSubmitBtnPaket.addEventListener('click', () => {
        const editedContent = editableHeadingPaket.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { paket_wisata: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnPaket.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA KOTA HANDLE
    editableHeadingKota.addEventListener('input', () => {
        editSubmitBtnKota.style.display = 'block';
    });

    editSubmitBtnKota.addEventListener('click', () => {
        const editedContent = editableHeadingKota.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { kota: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKota.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA KATEGORI HANDLE
    editableHeadingKategori.addEventListener('input', () => {
        editSubmitBtnKategori.style.display = 'block';
    });

    editSubmitBtnKategori.addEventListener('click', () => {
        const editedContent = editableHeadingKategori.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { kategori: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKategori.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });

    // PAKET WISATA RATINGS HANDLE
    editableHeadingRatings.addEventListener('input', () => {
        editSubmitBtnRatings.style.display = 'block';
    });

    editSubmitBtnRatings.addEventListener('click', () => {
        const editedContent = editableHeadingRatings.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { ratings: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnRatings.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA ITINERARY HANDLE
    editableHeadingItinerary.addEventListener('input', () => {
        editSubmitBtnItinerary.style.display = 'block';
    });

    editSubmitBtnItinerary.addEventListener('click', () => {
        const editedContent = editableHeadingItinerary.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { itinerary: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnItinerary.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA KETERANGAN HANDLE
    editableHeadingKeterangan.addEventListener('input', () => {
        editSubmitBtnKeterangan.style.display = 'block';
    });

    editSubmitBtnKeterangan.addEventListener('click', () => {
        const editedContent = editableHeadingKeterangan.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { keterangan: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnKeterangan.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });



    // PAKET WISATA HARGA HANDLE
    editableHeadingHarga.addEventListener('input', () => {
        editSubmitBtnHarga.style.display = 'block';
    });

    editSubmitBtnHarga.addEventListener('click', () => {
        const editedContent = editableHeadingHarga.innerText;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/update`;
        const data = { budget: editedContent };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnHarga.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });


    // PAKET WISATA IMAGE HANDLER
    editableImg.addEventListener('click', () => {
        imageInput.click();
    });

    imageInput.addEventListener('change', () => {
        const file = imageInput.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                editableImg.src = e.target.result;
                editSubmitBtnImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    editSubmitBtnImage.addEventListener('click', () => {
        const editedImage = editableImg.src;
        const paketId = {{$detailData->id}}; // Replace with the actual ID of the paketwisata
        const url = `/paketwisata/edit/${paketId}/updateimage`;
        const data = { img_paketwisata: editedImage };

        fetch(url, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF token
            },
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            // Handle response if needed
            editSubmitBtnImage.style.display = 'none';
        })
        .catch(error => {
            // Handle error if needed
        });
    });
});



</script>


<script>


function toogleMenu() {
    var menuContainer = document.getElementById('sliders');
    
    if (menuContainer.style.display === 'none') {
        menuContainer.style.display = 'block';
        menuContainer.style.display = 'flex';
    } else {
        menuContainer.style.display = 'none';
    }
}

const photos = {!! json_encode($detailData->wisata->pluck('img_paketwisata')) !!};
    let slideNumber = 0;
    let open = false;

    function openSlider(imageSource, index) {
        slideNumber = index;
        document.getElementById('sliderImg').src = imageSource;
        open = true;
        updateSlider();
    }

    function closeSlider() {
        open = false;
        updateSlider();
    }

    function updateSlider() {
        const sliders = document.getElementById('sliders');
        if (open) {
            sliders.style.display = 'block';
        } else {
            sliders.style.display = 'none';
        }
    }

    function handleMove(direction) {
    if (direction === 'l') {
        slideNumber = slideNumber === 0 ? photos.length - 1 : slideNumber - 1;
    } else {
        slideNumber = (slideNumber + 1) % photos.length;
    }
    document.getElementById('sliderImg').src = photos[slideNumber];
    updateSlider();
}

</script>



